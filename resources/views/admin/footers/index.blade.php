@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('admin.footers.create') }}" class="btn btn-labeled btn-success m-b-5" type="button">
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> {{ trans('admin.links.title') }} </th>
                            <th> {{ trans('admin.links.url') }} </th>
                            <th> {{ trans('admin.links.type') }} </th>
                            <th> {{ trans('admin.links.createTime') }} </th>
                            <th> {{ trans('admin.links.actions') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="odd gradeX">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{!! $item->url !!}</td>
                                <td>{!! $item->type_name !!}</td>
                                <td class="center">{{ $item->created_at }}</td>
                                <td class="center">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['admin.footers.destroy', $item->id]]) }}
                                    <a href="{{ route('admin.footers.edit', $item->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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

                    {{ $items->links() }}

                </div>
            </div>
        </div>
    </div>

@stop

@section('additional_css')
    <link rel="stylesheet" href="/panel/assets/plugins/sweetalert/sweetalert.css" media="screen,projection"/>
@stop

@section('additional_js')
    <script src="/panel/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
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