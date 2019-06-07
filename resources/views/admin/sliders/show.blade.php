@extends('admin.master')

@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.sliders.show') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.sliders.title') }} : </strong> {{ $item->title }}</p>
                    </div>

                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.sliders.content') }} : </strong> {!! $item->content !!}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
