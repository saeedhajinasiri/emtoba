@extends('admin.master')

@section('content')
    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                        {{--{!! form_widget($form->state) !!}--}}
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
                        <a href="{!! route('admin.roles.index') !!}" class="btn btn-labeled btn-danger m-b-5">
                            <span class="btn-label"> <i class="fa fa-times"></i> </span>
                            <span class="hidden-xs"> @lang('admin.cancel') </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#rolesInfo" data-toggle="tab">{{ trans('admin.roles.info') }}</a></li>
                @if (isset($item))
                    <li><a href="#rolePermission" data-toggle="tab">{{ trans('admin.roles.permission') }}</a></li>
                @endif
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="rolesInfo">
                    <div class="panel-body">
                        {!! form_row($form->name) !!}
                        {!! form_row($form->display_name) !!}
                        {!! form_row($form->description) !!}
                    </div>
                </div>
                @if (isset($item))
                    <div class="tab-pane fade" id="rolePermission">
                        <div class="panel-body">
                            <?php $j = 1; ?>
                            @foreach($permissionGroups as $i => $permissionGroup)
                                <div class="panel panel-default dd-list">
                                    <div class="panel-heading dd-item">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle accordion-toggle-styled collapsed dd-handle"
                                               data-toggle="collapse"
                                               data-parent="#accordion3"
                                               href="#collapse_{{ $j }}" aria-expanded="false">
                                                {{ trans($i . '.index') }} </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_{{ $j }}" class="panel-collapse {{ !array_intersect($permissionsIdArray, $permissionGroup->pluck('id')->toArray()) ? 'collapse' : '' }}" aria-expanded="false">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th width="1%">?</th>
                                                <th>Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permissionGroup as $permission)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="permissions[]" {{ (in_array($permission->id, $permissionsIdArray) || $permission->name == 'admin.dashboard.read') ? ' checked' : ' ' }} value="{{ $permission->id }}" {{ $permission->name == 'admin.dashboard.read' ? 'onclick=\'return false\'' : '' }} id="{{ $permission->id }}">
                                                    </td>
                                                    <td><label for="{{ $permission->id }}">{{ $permission->name }}</label></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $j++; ?>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>
@stop


@section('additional_css')
    <link href="/panel/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
@stop

@section('additional_js')
    <script src="/panel/assets/plugins/summernote/summernote.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                height: 300,
                minHeight: null,
                maxHeight: null
            });
        });
    </script>
@stop
