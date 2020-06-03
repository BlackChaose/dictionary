<?php

namespace BlackChaose\Dictionary\Controllers;

use BlackChaose\Dictionary\Models\AttachedFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use BlackChaose\Dictionary\Models\Dictionary;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DictionaryController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected $guardName = 'user';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr = Dictionary::with('attached_file')->get();

        return view('vendor.dictionary.dictionary', ['arr' => $arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_type = 'create';
        $dictionary = new Dictionary();
        return view('vendor.dictionary.settings', ['form_type' => $form_type, 'dictionary' => $dictionary]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'entity' => 'string|min:1|max:255|required',
                'value' => 'string|min:1|max:255|required',
                'lang' => 'string|min:6|max:6|required',
                'group_id' => 'integer|min:1|required',
            ]);
            if (empty($data)) {
                throw(new \Exception('Error! invalid form data!'));
            }
            $filter = Dictionary::all()->where('entity', $data['entity']);

            if (count($filter) > 0) {
                throw(new \Exception('Error! duplicate entity!'));
            }
            $entity = new Dictionary($data);
            $res = $entity->save();

            $result_code = 'ok';

            if (!empty($request->file_img)) {
                $destinationPathFolder = 'uploads/dictionary' . Carbon::now('Europe/Moscow')->isoFormat('Y_M_D__HH_mm');
                $destinationPath = $destinationPathFolder . '_' . $entity->id;
                $request->file_img->move($destinationPath, $request->file_img->getClientOriginalName());
                $ff = new AttachedFile();
                $ff->dic_entity_id = $entity->id;
                $ff->file_path = $destinationPath . '/' . $request->file_img->getClientOriginalName();
                $ff->file_name = $request->file_img->getClientOriginalname();
                $ff->save();

            }

        } catch (\Exception $e) {
            $res = $e->getMessage();
            $result_code = 'error';
        }
        $form_type = 'operation_result';
        return view('vendor.dictionary.settings', ['form_type' => $form_type, 'result' => $res, 'result_code' => $result_code]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dictionary = Dictionary::with('attached_file')->get()->find($id);
        $form_type = 'edit';

        return view('vendor.dictionary.settings', ['form_type' => $form_type, 'dictionary' => $dictionary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'entity' => 'string|min:1|max:255|required',
                'value' => 'string|min:1|max:255|required',
                'lang' => 'string|min:6|max:6|required',
                'group_id' => 'integer|min:1|required',
            ]);
            if (empty($data)) {
                throw(new \Exception('Error! invalid form data!'));
            }

            $entity = Dictionary::with('attached_file')->get()->find($id);
            $res = $entity->save();

            $result_code = 'ok';

            if (!empty($request->file_img)) {

                $destinationPathFolder = 'uploads/dictionary' . Carbon::now('Europe/Moscow')->isoFormat('Y_M_D__HH_mm');
                $destinationPath = $destinationPathFolder . '_' . $entity->id;
                $request->file_img->move($destinationPath, $request->file_img->getClientOriginalName());
                $ff = new AttachedFile();
                $ff->dic_entity_id = $entity->id;
                $ff->file_path = $destinationPath . '/' . $request->file_img->getClientOriginalName();
                $ff->file_name = $request->file_img->getClientOriginalname();

                $attached_file = $entity->getRelation('attached_file')->first();
                if(!empty($attached_file)){
                    $old_file = AttachedFile::find($attached_file->id);
                    $old_file->delete();
                }
                $ff->save();

            }

        } catch (\Exception $e) {
            $res = $e->getMessage();
            $result_code = 'error';
        }
        $form_type = 'operation_result';
        return view('vendor.dictionary.settings', ['form_type' => $form_type, 'result' => $res, 'result_code' => $result_code]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $entity = Dictionary::with('attached_file')->get()->find($id);
            $attached_file = AttachedFile::find($entity->getRelation('attached_file')->first()->id);
            $attached_file->delete();
            $entity->delete();
            $result_code = 'ok';
        }catch(\Exception $e){
            $res = $e->getMessage();
            $result_code = 'error';
        }
        $form_type= 'operationa_result';
        return view('vendor.dictionary.settings', ['form_type' => $form_type, 'result' => $res, 'result_code' => $result_code]);
    }

    public function slideshow(){
    return redirect(route('dictionary.slideshow_group',['id'=>1]),'301');
}

    public function slideshow_group($id){
        $dictionaries = Dictionary::with('attached_file')->get();
        $groups = $dictionaries->unique('group_id')->map(function($el){
            return $el->group_id;
        });
        $current_group = $id;
        return view('vendor.dictionary.slideshow',[
            'dictionaries'=>$dictionaries->where('group_id','=',$id),
            'groups'=>$groups,
            'current_group'=>$current_group,
        ]);
    }
}
