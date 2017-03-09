<div class='form-group{{ $errors->has("$lang.question") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[question]", trans('faq::questions.form.question') . ' *') !!}
    {!! Form::text("{$lang}[question]", old("$lang.question"), ['class' => 'form-control']) !!}
    {!! $errors->first("$lang.question", '<span class="help-block">:message</span>') !!}
</div>

<div class='form-group{{ $errors->has("$lang.answer") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[answer]", trans('faq::questions.form.answer') . ' *') !!}
    {!! Form::textarea("{$lang}[answer]", old("$lang.answer"), ['class' => 'form-control ckeditor']) !!}
    {!! $errors->first("$lang.answer", '<span class="help-block">:message</span>') !!}
</div>