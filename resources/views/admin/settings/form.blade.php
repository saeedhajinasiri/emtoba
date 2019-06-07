@extends('admin.master')

@section('content')
    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-left">
                        {!! form_row($form->SaveAndReload) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.settings.info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-7">
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>

        {!! form_end($form) !!}
    </div>
@stop
