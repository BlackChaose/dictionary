@if($form_type==='create')
    <div class="form-group">
        {{ Form::label('добавить термин', 'термин',['class'=>'form-label']) }}
        {{ Form::textArea('entity',null,['class'=>'form-control is-invalid','rows'=>'2','required'=>'required','placeholder'=>'Новый термин']) }}
        <div class="invalid-feedback">
            Добавьте термин
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::textArea('value',null,['class'=>'form-control is-invalid', 'rows'=>'3', 'required'=>'required','placeholder'=>'перевод']) }}
        <div class="invalid-feedback">
            Добавьте перевод
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::text('lang',null,['class'=>'form-control is-invalid', 'required'=>'required', 'placeholder'=>'ES->RU', 'value'=>'ES-RU']) }}
        <div class="invalid-feedback">
            Добавьте язык, например испанско-русский - "ES->RU"
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::text('group_id',null,['class'=>'form-control is-invalid', 'required'=>'required', 'placeholder'=>'1', 'value'=>'1']) }}
        <div class="invalid-feedback">
            Добавьте номер группы терминов
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::file('file_img',null,['class'=>'form-control'])}}
        <div class="invalid-feedback">
            Добавьте картинку
        </div>
        <div class="valid-feedback">
            ok!
        </div>
    </div>
@endif
@if($form_type==='edit')
    <div class="form-group">
        {{ Form::label('добавить термин', 'термин',['class'=>'form-label']) }}
        {{ Form::textArea('entity',null,['class'=>'form-control is-invalid','rows'=>'2','required'=>'required','placeholder'=>'Новый термин']) }}
        <div class="invalid-feedback">
            Добавьте термин
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::textArea('value',null,['class'=>'form-control is-invalid', 'rows'=>'3', 'required'=>'required','placeholder'=>'перевод']) }}
        <div class="invalid-feedback">
            Добавьте перевод
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::text('lang',null,['class'=>'form-control is-invalid', 'required'=>'required', 'placeholder'=>'ES->RU']) }}
        <div class="invalid-feedback">
            Добавьте язык, например испанско-русский - "ES->RU"
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::text('group_id',null,['class'=>'form-control is-invalid', 'required'=>'required', 'placeholder'=>'1', 'value'=>'1']) }}
        <div class="invalid-feedback">
            Добавьте номер группы терминов
        </div>
        <div class="valid-feedback">
            ok!
        </div>
        {{ Form::file('file_img',null,['class'=>'form-control'])}}
        <div class="invalid-feedback">
            Добавьте картинку
        </div>
        <div class="valid-feedback">
            ok!
        </div>
    </div>
@endif
