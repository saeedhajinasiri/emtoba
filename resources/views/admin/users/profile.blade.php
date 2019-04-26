@extends('admin.master')

@section('content')

    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                    </div>
                    <div class="pull-left">
                        {!! form_row($form->SaveAndReload) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.users.info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        {!! form_row($form->first_name) !!}
                        {!! form_row($form->last_name) !!}
                        {!! form_row($form->email) !!}
                    </div>

                    <div class="col-md-6">
                        {!! form_row($form->username) !!}
                        {!! form_row($form->password) !!}
                        {!! form_row($form->password_confirmation) !!}
                    </div>

                    <div class="col-md-12">
                        {!! form_row($form->mobile) !!}
                        {!! form_row($form->address) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.users.avatar') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->avatar) !!}

                    @if(isset($user))
                        <img src="/images/user/{{ $user->avatar }}" alt="{{ $user->avatar }}" width="100%">
                    @endif
                </div>

            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>
@stop
