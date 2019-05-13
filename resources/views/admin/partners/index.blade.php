@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('admin.partners.create') }}" class="btn btn-labeled btn-success m-b-5" type="button">
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
                            <th> {{ trans('admin.partners.title') }} </th>
                            <th> {{ trans('admin.partners.createTime') }} </th>
                            <th> {{ trans('admin.partners.actions') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="odd gradeX">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td class="center">{{ $item->created_at }}</td>
                                <td class="center">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['admin.partners.destroy', $item->id]]) }}
                                    <a href="{{ route('admin.partners.edit', $item->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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