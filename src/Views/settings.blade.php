@extends('vendor.dictionary.layouts.module')
@extends('vendor.dictionary.layouts.module')

@section('title')
    Словарик/Настройки
@endsection
@section('content')
    <p>Словарик/Настройки: </p>

    <div class="form-group">
        {{ Form::model($dictionary, ['url' => route('dictionary.create'),'method'=>'POST', 'class'=>'needs-validation', 'validate'=>'validate','files'=>true]) }}
        @csrf
        @include('vendor.dictionary.form')
        <div class="form-group">
            {{ Form::submit('Создать',['class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>

@endsection

