@extends('admin.master')

@section('content')

    <div class="row">

        <div class="col-sm-12">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.roles.show') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <p><strong>{{ trans('admin.roles.name') }} : </strong> {{ $item->name }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>{{ trans('admin.roles.display_name') }} : </strong> {{ $item->display_name }}</p>
                    </div>

                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.roles.description') }} : </strong> {{ $item->description }}</p>
                    </div>

                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.roles.permissions') }} : </strong> {{ $item->show_permissions }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
