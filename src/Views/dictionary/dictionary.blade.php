@extends('vendor.dictionary.layouts.module')

@section('title')
    Словарик
@endsection
@section('content')
    <p>Словарик: <span class="btn btn-link" id="btn_add_dic" title="добавить новый термин"><i
                class="far fa-plus-square"></i></span><span title="режим обзора" class="btn btn-link text-success" id="btn_view_slides"><i class="fab fa-sticker-mule"></i></span></p>

    <div class="">
        @foreach($arr??'' as $item)
            <div class="d-flex w-75 bg-dark">
                <div class="d-flex w-25 justify-content-center m-1 p-1 text-nowrap bg-light"><b>{{$item->entity}}</b></div>
                <div class="d-flex w-75 justify-content-center m-1 p-1 bg-white"><i>{{$item->value}}</i></div>
                <div class="d-flex justify-content-end m-1 p-1 bg-white"><a class="btn btn-link {{(count($item->attached_file)===0)?"disabled":null}}"
                                                                            href="{{(count($item->attached_file)>0)?$item->attached_file->where('dic_entity_id','=',$item->id)->first()->file_path:"#"}}"
                                                                            title="{{$item->get_attached_file()?$item->get_attached_file()->file_name:null}}">
                        <i
                            class="fas fa-eye"></i></a></div>
{{--                <div><i class="fas fa-trash-alt"></i></div>--}}
                <div class="d-flex justify-content-end m-1 p-1 bg-white ">
                    <a class="btn btn-link text-danger" href="{{route('dictionary.edit',[$item->id])}}"><i class="far fa-edit"></i></a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
@section('scripts')
    <script>
        (function () {
            window.addEventListener('load', function () {
                document.getElementById('btn_add_dic').addEventListener('click', function () {
                    window.location.href = "{{route('dictionary.create')}}";
                });
            });
        })();
    </script>
@endsection
