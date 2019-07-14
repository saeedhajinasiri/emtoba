@extends('admin.master')

@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="GaugeMeter" data-percent="{{ $cpuUsage ?: 0 }}" data-size="350" data-append="%"
                         data-theme="DarkRed-LightRed" data-back="RGBa(0,0,0,.1)" data-animate_gauge_colors="1"
                         data-animate_text_colors="1" data-width="25" data-label="درصد استفاده شده از پردازنده"
                         data-style="Arch" data-label_color="#000"></div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="GaugeMeter" data-percent="{{ $memoryUsed ?: 0 }}" data-size="350" data-append="%"
                         data-theme="DarkBlue-LightBlue" data-back="RGBa(0,0,0,.1)" data-animate_gauge_colors="1"
                         data-animate_text_colors="1" data-width="25" data-label="درصد استفاده شده از مموری"
                         data-style="Arch" data-label_color="#000"></div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="GaugeMeter" data-percent="{{ $hardUsage ?: 0 }}" data-size="350" data-append="%"
                         data-theme="DarkGreen-LightGreen" data-back="RGBa(0,0,0,.1)" data-animate_gauge_colors="1"
                         data-animate_text_colors="1" data-width="25" data-label="درصد استفاده شده از دیسک"
                         data-style="Arch" data-label_color="#000"></div>
                </div>
            </div>
            <div class="panel panel-primary lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>نظرات جدید</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> {{ trans('admin.comments.content') }} </th>
                            <th> {{ trans('admin.comments.commentable_section') }} </th>
                            <th> {{ trans('admin.comments.commentable') }} </th>
                            <th> {{ trans('admin.comments.status') }} </th>
                            <th> {{ trans('admin.comments.author') }} </th>
                            <th> {{ trans('admin.comments.createTime') }} </th>
                            <th> {{ trans('admin.comments.actions') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($comments as $comment)
                            <tr class="odd gradeX">
                                <td>{{ $comment->id }}</td>
                                <td>{!! str_limit($comment->content, 100) !!}</td>
                                <td>{{ $comment->commentable_section }}</td>
                                <td>
                                    <a href="{{ $comment->commentable_link }}">{{ $comment->commentable_title }}</a>
                                </td>
                                <td>{{ $comment->status_name }}</td>
                                <td>{{ $comment->user_name }}</td>
                                <td class="center">{{ $comment->created_at }}</td>
                                <td class="center">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['admin.comments.destroy', $comment->id]]) }}
                                    <a href="{{ route('admin.comments.edit', $comment->id) }}" target="_blank"
                                       class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm deleteButton"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Delete "><i class="fa fa-trash-o"
                                                                             aria-hidden="true"></i></button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @empty
                            <tr class="odd gradeX">
                                <td colspan="6">
                                    {{ trans('admin.noUsersOnlineFound') }}
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@stop

@section('additional_css')
    <link href="/panel/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/bootstrap-datetime-picker/css/jquery.Bootstrap-PersianDateTimePicker.css"
          rel="stylesheet"/>
    <link href="/panel/assets/plugins/gauge/gaugemeter.css" rel="stylesheet" type="text/css"/>
@stop

@section('additional_js')
    <script src="/panel/assets/plugins/gauge/gaugemeter.js"></script>
    <script>
        $(document).ready(function () {
            $(".GaugeMeter").gaugeMeter();
        });
    </script>
@stop
