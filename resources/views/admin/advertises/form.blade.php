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
                        <a href="{!! route('admin.advertises.index') !!}" class="btn btn-labeled btn-danger m-b-5">
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
                        <h4>{{ trans('admin.advertises.info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->trade_type) !!}
                    {!! form_row($form->payment_method) !!}
                    {!! form_row($form->currency_type) !!}
                    {!! form_row($form->min_amount) !!}
                    {!! form_row($form->max_amount) !!}
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.advertises.otherInfo') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->meeting_point) !!}
                    {!! form_row($form->other_info) !!}
                    {!! form_row($form->account_info) !!}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.page.personal_info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->status) !!}
                    <div class="form-group">
                        <label for="" class="control-label col-sm-6">{{ trans('admin.advertises.user') }}</label>
                        <a href="{{ route('admin.customers.edit', $item->user->id) }}" class="color-red col-sm-6">{{ $item->userName }}</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.page.base_info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_row($form->location_id) !!}
                    {!! form_row($form->floating_price) !!}
                    {!! form_row($form->margin) !!}
                    {!! form_row($form->price_equation) !!}
                    {!! form_row($form->limit_to_fiat_amounts) !!}
                    {!! form_row($form->phone_number) !!}
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.page.display_hours') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    @forelse($displays as $key => $display)
                        <div class="form-group">
                            <label for="" class="control-label col-sm-6">{{ trans('site.advertise.' . \App\Enums\EWeekDays::search($key)) }}</label>
                            <div class="form-control col-sm-3">
                                <span class="start">{{ $display->where('type', 'start')->first()->hour_filter }}</span>
                            </div>
                            <div class="form-control col-sm-3">
                                <span class="end">{{ $display->where('type', 'end')->first()->hour_filter }}</span>
                            </div>
                        </div>
                    @empty
                        @lang('admin.advertise.no_display_hours')
                    @endforelse
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.page.settings') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! form_label($form->track_max_amount) !!}
                        {!! form_widget($form->track_max_amount) !!}
                    </div>
                    <div class="form-group">
                        {!! form_label($form->require_identification) !!}
                        {!! form_widget($form->require_identification) !!}
                    </div>
                    <div class="form-group">
                        {!! form_label($form->real_name_required) !!}
                        {!! form_widget($form->real_name_required) !!}
                    </div>
                    <div class="form-group">
                        {!! form_label($form->sms_verification_required) !!}
                        {!! form_widget($form->sms_verification_required) !!}
                    </div>
                    <div class="form-group">
                        {!! form_label($form->trusted_people_only) !!}
                        {!! form_widget($form->trusted_people_only) !!}
                    </div>
                </div>
            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>

@stop

@section('additional_css')
    <link href="{{ URL::to('/') }}/panel/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
    <style>
        .select2-results {
            direction: rtl !important;
        }
    </style>
@stop
@section('additional_js')
    <script src="{{ URL::to('/') }}/panel/assets/plugins/select2/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@stop