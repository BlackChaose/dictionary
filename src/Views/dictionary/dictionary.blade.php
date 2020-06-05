@extends('vendor.dictionary.layouts.module')

@section('title')
    Словарик
@endsection
@section('content')
    <p><a class="btn btn-link" href="{{route('home')}}">Главная:</a> Словарик: <span class="btn btn-link" id="btn_add_dic" title="добавить новый термин"><i
                class="far fa-plus-square"></i></span><span title="режим обзора" class="btn btn-link text-success"
                                                            id="btn_view_slides"><i
                class="fab fa-sticker-mule"></i></span> <span id="dic_spinner" class="d-inline"><i class="fas fa-cog fa-spin text-primary"></i></span></p>

    <table id="dictionary_list" class="d-none">
        <thead>
        <tr>
            <th>Термин</th>
            <th>Описание</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($arr??'' as $item)
            <tr>
                <td><b>{{$item->entity}}</b></td>
                <td><i>{{$item->value}}</i></td>
                <td><a
                        class="btn btn-link {{(count($item->attached_file)===0)?"disabled":null}}"
                        href="{{(count($item->attached_file)>0)?$item->attached_file->where('dic_entity_id','=',$item->id)->first()->file_path:"#"}}"
                        title="{{$item->get_attached_file()?$item->get_attached_file()->file_name:null}}">
                        <i
                            class="fas fa-eye"></i></a></td>
                <td> <a class="btn btn-link text-danger" href="{{route('dictionary.edit',[$item->id])}}"><i
                            class="far fa-edit"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>
        (function () {
            window.addEventListener('load', function () {
                document.getElementById('btn_add_dic').addEventListener('click', function () {
                    window.location.href = "{{route('dictionary.create')}}";
                });
                document.getElementById('btn_view_slides').addEventListener('click', function () {
                    console.log('!')
                    window.location.href = "{{route('dictionary.slideshow')}}";
                });
                $('#dictionary_list').DataTable();
                $('#dic_spinner').attr('class','d-none');
                $('#dictionary_list').attr('class','d-block');
            });
        })();
    </script>
@endsection
