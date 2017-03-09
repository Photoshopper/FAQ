@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('faq::questions.title.questions') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('faq::questions.title.questions') }}</li>
    </ol>
@stop

@section('styles')
    <style>
        .ui-sortable-placeholder {height:50px; }
        .handle {cursor: pointer; }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.faq.question.updateSort'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.faq.question.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('faq::questions.button.create question') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if ($questions->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="questions table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>{{ trans('faq::questions.table.question') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($questions)): ?>
                            <?php foreach ($questions as $question): ?>
                            <tr>
                                <td width="30">
                                    <a class="handle"><span class="glyphicon glyphicon-move"></span></a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.faq.question.edit', [$question->id]) }}">
                                        {{ $question->question }}
                                    </a>
                                    <input class="weight form-control hidden" name="weight[{{ $question->id }}]" type="text" value="{{ $question->weight }}">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.faq.question.edit', [$question->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.faq.question.destroy', [$question->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                    <?php else: ?>
                        {{ trans('faq::questions.table.no questions') }}
                    <?php endif; ?>
                </div>
                <!-- /.box -->
            </div>
            <?php if ($questions->count() > 0): ?>
            <div class="box-footer">
                {{ Form::submit(trans('faq::questions.button.save order'), ['class' => 'btn btn-primary btn-flat']) }}
            </div>
            <?php endif; ?>
        </div>
    </div>
    {!! Form::close() !!}
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('faq::questions.title.create question') }}</dd>
    </dl>
@stop

@section('scripts')
    {!! Theme::script('js/vendor/jquery-ui-1.10.3.min.js') !!}

    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.faq.question.create') ?>" }
                ]
            });
        });
    </script>

    <script>
        function questionsSortable($element) {
            var fixHelper = function(e, ui) {
                ui.children().each(function() {
                    $(this).width($(this).width());
                });
                return ui;
            };
            $element.sortable({helper: fixHelper}).disableSelection();
            $element.on("sortupdate", function (event, ui) {
                $('.weight').each(function (e) {
                    $(this).val($('.weight').index(this));
                });
            });
        }

        questionsSortable($('.questions tbody'));
    </script>
@stop
