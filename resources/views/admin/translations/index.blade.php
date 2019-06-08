@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('admin.translations.create') }}" class="btn btn-labeled btn-success m-b-5" type="button">
                            <span class="btn-label">
                            <i class="fa fa-plus"></i>
                            </span>
                            @lang('admin.new')
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>فهرست</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs mg-20">
                        <?php foreach($translations as $key => $value) { ?>
                        <li @if($key == 'admin')class="active"@endif><a href="#{!! $key !!}" data-toggle="tab">{!! $key !!}</a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach($translations as $key => $value) { ?>
                        <div class="tab-pane fade @if($key == 'admin') in active @endif" id="{!! $key !!}">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="table_{!! $key !!}">
                                <thead>
                                <tr>
                                    <th> {{ trans('admin.translations.key') }} </th>
                                    <th> {{ trans('admin.translations.value') }} </th>
                                    <th> {{ trans('admin.translations.action') }} </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($value as $item)
                                    <tr class="odd gradeX">
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['admin.translations.destroy', $item->group . '.' . $item->code]]) }}
                                            <a href="{{ route('admin.translations.edit', $item->group . '.' . $item->code) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm deleteButton" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="odd gradeX">
                                        <td colspan="6">
                                            {{ trans('admin.noItemsFound') }}
                                        </td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('additional_css')
    <link href="/panel/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/panel/assets/plugins/sweetalert/sweetalert.css" media="screen,projection"/>
@stop

@section('additional_js')
    <script src="/panel/assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
    <script src="/panel/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {

            "use strict"; // Start of use strict
            <?php foreach($translations as $key => $value) { ?>
            $('#table_{!! $key !!}').DataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                "lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]],
                "iDisplayLength": 15,
                buttons: [
                    {extend: 'excel', title: 'ExampleFile', className: 'btn-sm btn-primary'},
                    {extend: 'print', className: 'btn-sm btn-primary'}
                ]
            });
            <?php } ?>

        });

        $('.deleteButton').click(function (e) {
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                    title: 'حذف',
                    text: 'آیا از حذف آیتم مورد نظر اطمینان دارید؟',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'حذف کن',
                    cancelButtonText: 'خیر',
                    closeOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) form.submit();
                });
        });
    </script>
@stop