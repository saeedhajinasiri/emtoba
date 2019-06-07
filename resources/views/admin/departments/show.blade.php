@extends('admin.master')

@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.departments.show') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.departments.title') }} : </strong> {{ $item->title }}</p>
                    </div>

                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.departments.content') }} : </strong> {!! $item->content !!}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
