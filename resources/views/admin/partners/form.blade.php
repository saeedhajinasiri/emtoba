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
                                <li>{!! form_row($form->SaveAndNew) !!}</li>
                            </ul>
                        </div>
                        <a href="{!! route('admin.partners.index') !!}" class="btn btn-labeled btn-danger m-b-5">
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
                    {!! form_row($form->scientific_records) !!}
                    {!! form_row($form->social_records) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.page.image') }}</h4>
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
                        <h4>{{ trans('admin.blogs.other') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->job_list) !!}
                    <div class="form-group">
                        {!! form_label($form->single) !!}
                        {!! form_widget($form->single) !!}
                    </div>
                    {!! form_row($form->row) !!}
                    {!! form_row($form->column) !!}
                </div>
            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>

@stop

@section('additional_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@stop

@section('additional_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('#job_list').select2({
            tags: true
        });
    </script>
@stop