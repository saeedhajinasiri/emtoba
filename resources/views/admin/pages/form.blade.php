@extends('admin.master')

@section('content')

    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                        {!! form_widget($form->state) !!}
                    </div>
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
                                <li>{!! form_row($form->SaveAndShow) !!}</li>
                                <li>{!! form_row($form->SaveAndNew) !!}</li>
                            </ul>
                        </div>
                        <a href="{!! route('admin.pages.index') !!}" class="btn btn-labeled btn-danger m-b-5">
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
                        <h4>{{ trans('admin.pages.info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->title) !!}
                    {!! form_row($form->slug) !!}
                    {!! form_row($form->content) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.pages.image') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->image) !!}

                    @if(isset($item))
                        <img src="{{ $item->imageLink }}" alt="{{ $item->image }}" width="100%">
                    @endif
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.page.meta_info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->keywords) !!}
                    {!! form_row($form->description) !!}
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