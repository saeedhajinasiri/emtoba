@extends('admin.master')

@section('content')

    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-left">
                        {!! form_row($form->SaveAndReload) !!}
                        <div class="btn-group m-b-5">
                            <a class="btn btn-primary btn-labeled" href="javascript:void(0);" data-toggle="dropdown">
                                <span class="btn-label"> <i class="fa fa-save"></i> </span>
                                <span class="hidden-xs"> @lang('admin.save') </span>
                            </a>
                            <button class="btn dropdown-toggle btn-primary" type="button" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">primary</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>{!! form_row($form->SaveAndClose) !!}</li>
                            </ul>
                        </div>
                        <a href="{!! route('admin.contacts.index') !!}" class="btn btn-labeled btn-danger m-b-5">
                            <span class="btn-label"> <i class="fa fa-times"></i> </span>
                            <span class="hidden-xs"> @lang('admin.cancel') </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.contacts.info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->department_title) !!}
                    {!! form_row($form->subject) !!}
                    {!! form_row($form->content) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.contacts.user_info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->user_name) !!}
                    {!! form_row($form->user_email) !!}
                    {!! form_row($form->user_ip) !!}
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.contacts.reply') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->reply) !!}
                </div>
            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>

@stop

@section('additional_css')
    <link href="/panel/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
@stop
@section('additional_js')
    <script src="/panel/assets/plugins/summernote/summernote.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null
            });
        });
    </script>
@stop