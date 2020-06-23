@extends('vendor.dictionary.layouts.module')

@section('title')
    Словарик/Карточки
@endsection
@section('content')
<p><a class="btn btn-link" href="{{route('home')}}">Главная:</a> <a class="btn btn-link" href="{{route('dictionary')}}">Словарик:</a> Карточки </p>
@endsection
