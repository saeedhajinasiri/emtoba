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
                        <a href="{!! route('admin.' . $section . '.index') !!}" class="btn btn-labeled btn-danger m-b-5">
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
                        <h4>{{ trans('admin.' . $section . '.info') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        {!! form_row($form->username) !!}
                        {!! form_row($form->password) !!}
                        {!! form_row($form->password_confirmation) !!}
                    </div>

                    <div class="col-md-6">
                        {!! form_row($form->name) !!}
                        {!! form_row($form->email) !!}
                        {!! form_row($form->mobile) !!}
                    </div>

                    <div class="col-md-12">
                        {!! form_row($form->location_id) !!}
                        {!! form_row($form->address) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.' . $section . '.roles') }}</h4>
                    </div>
                </div>
                <div class="panel-body">
                    {!! form_widget($form->role_list) !!}
                </div>
            </div>
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>{{ trans('admin.' . $section . '.avatar') }}</h4>
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

        {!! form_end($form) !!}
    </div>

@stop

@section('additional_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="/admins/vendor/bootstrap-datetime-picker/css/jquery.Bootstrap-PersianDateTimePicker.css" rel="stylesheet" />
    <link href="/panel/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
@stop

@section('additional_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
      $('#tag_list').select2();
      $('#category_list').select2();
      $('#blog_list').select2();
    </script>

    <script src="/admins/vendor/bootstrap-datetime-picker/js/jalali.js"></script>
    <script src="/admins/vendor/bootstrap-datetime-picker/js/jquery.Bootstrap-PersianDateTimePicker.js"></script>

    <script type="text/javascript">
        $('#published_at').MdPersianDateTimePicker({
            EnglishNumber: true,
            Format: "yyyy-MM-dd HH:mm",
            Placement: 'top',
            EnableTimePicker: true,
            TargetSelector: '#published_at',
            GroupId: '',
            ToDate: false,
            FromDate: false
        });
    </script>

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
