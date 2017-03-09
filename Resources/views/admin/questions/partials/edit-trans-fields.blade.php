<div class='form-group{{ $errors->has("$lang.question") ? ' has-error' : '' }}'>
    <?php $old = isset($question->translate($lang)->question) ? $question->translate($lang)->question : ''; ?>
    {!! Form::label("{$lang}[question]", trans('faq::questions.form.question') . ' *') !!}
    {!! Form::text("{$lang}[question]", old("$lang.question", $old), ['class' => 'form-control']) !!}
    {!! $errors->first("$lang.question", '<span class="help-block">:message</span>') !!}
</div>

<div class='form-group{{ $errors->has("$lang.answer") ? ' has-error' : '' }}'>
    <?php $old = isset($question->translate($lang)->answer) ? $question->translate($lang)->answer : ''; ?>
    {!! Form::label("{$lang}[answer]", trans('faq::questions.form.answer') . ' *') !!}
    {!! Form::textarea("{$lang}[answer]", old("$lang.answer", $old), ['class' => 'form-control ckeditor']) !!}
    {!! $errors->first("$lang.answer", '<span class="help-block">:message</span>') !!}
</div>