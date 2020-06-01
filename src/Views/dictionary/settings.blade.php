@extends('vendor.dictionary.layouts.module')
@section('title')
    Словарик / Настройки
@endsection
@section('content')
    <p><a href="{{route('dictionary.index')}}">Словарик</a> / Настройки: </p>

    @if($form_type === 'create')
        {{ Form::model($dictionary, ['url' => route('dictionary.store'),'method'=>'POST', 'class'=>'needs-validation', 'validate'=>'validate','files'=>true]) }}
        @csrf
        @include('vendor.dictionary.form')
        <div class="form-group">
            {{ Form::submit('Создать',['class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    @endif
    @if($form_type === 'show')

    @endif
    @if($form_type === 'edit')
        {{ Form::model($dictionary, ['url' => route('dictionary.update',[$dictionary, $dictionary->id]),'method'=>'PUT', 'class'=>'needs-validation', 'validate'=>'validate','files'=>true]) }}
        @csrf
        @include('vendor.dictionary.form')
        <div class="form-group">
            {{ Form::submit('Сохранить',['class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    @endif
    @if($form_type === 'operation_result')
        @include('vendor.dictionary.message')
    @endif

@endsection

