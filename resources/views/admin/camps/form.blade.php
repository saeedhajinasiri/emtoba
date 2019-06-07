@extends('admin.master')

@section('content')

    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-left">
                        <a href="{!! route('admin.camps.index') !!}" class="btn btn-labeled btn-danger m-b-5">
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
                    {!! form_row($form->first_name) !!}
                    {!! form_row($form->last_name) !!}
                    {!! form_row($form->father_name) !!}
                    {!! form_row($form->national_code) !!}
                    {!! form_row($form->gender) !!}
                    {!! form_row($form->address) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.pages.national_code_image') }}</h4>
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
                        <h4>{{ trans('admin.contacts.user_info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->tel) !!}
                    {!! form_row($form->mobile) !!}
                    {!! form_row($form->email) !!}
                    {!! form_row($form->postal_code) !!}
                    {!! form_row($form->birth_date) !!}
                </div>
            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>

@stop