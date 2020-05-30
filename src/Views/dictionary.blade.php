@extends('vendor.dictionary.layouts.module')

@section('title')
    Словарик
@endsection
@section('content')
    <p>list:</p>
    <p>
    <ul>
        @foreach($arr??'' as $key=>$val)
            <li><b>{{$key}}</b> : <i>{{$val}}</i></li>
        @endforeach
    </ul>
    </p>
@endsection
