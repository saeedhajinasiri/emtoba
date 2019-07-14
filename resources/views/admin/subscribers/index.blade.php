@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                    </div>
                    <div class="pull-left">
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
                                <th> {{ trans('admin.contacts.email') }} </th>
                                <th> {{ trans('admin.contacts.createTime') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="odd gradeX">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->email }}</td>
                                <td class="center">{{ $item->created_at }}</td>
                            </tr>
                        @empty
                            <tr class="odd gradeX">
                                <td colspan="8">
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