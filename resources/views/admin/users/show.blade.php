@extends('admin.master')

@section('content')

    <div class="row">

        <div class="col-sm-12 col-md-8">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.users.show') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <p><strong>{{ trans('admin.users.name') }} : </strong> {{ $item->name }}</p>
                        <p><strong>{{ trans('admin.users.email') }} : </strong> {{ $item->email }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>{{ trans('admin.users.username') }} : </strong> {{ $item->username }}</p>
                        <p><strong>{{ trans('admin.users.mobile') }} : </strong> {{ $item->mobile }}</p>
                    </div>

                    <div class="col-md-12">
                        <p><strong>{{ trans('admin.users.address') }} : </strong> {{ $item->address }}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.users.roles') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <p><strong>{{ trans('admin.users.role_list') }} : </strong> {!! $item->show_roles !!}</p>
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.users.avatar') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    @if(isset($item))
                        <img src="/images/user/{{ $item->avatar }}" alt="{{ $item->avatar }}" width="100%">
                    @endif
                </div>

            </div>
        </div>

    </div>

@stop
