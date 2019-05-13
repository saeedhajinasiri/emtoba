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
                        @forelse($items as $item)
                            <tr class="odd gradeX">
                                <td>{{ $item->id }}</td>
                                <td>{!! str_limit($item->content, 100) !!}</td>
                                <td>{{ $item->commentable_section }}</td>
                                <td>
                                    <a href="{{ $item->commentable_link }}">{{ $item->commentable_title }}</a>
                                </td>
                                <td>{{ $item->status_name }}</td>
                                <td>{{ $item->user_name }}</td>
                                <td class="center">{{ $item->created_at }}</td>
                                <td class="center">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['admin.comments.destroy', $item->id]]) }}
                                    <a href="{{ route('admin.comments.edit', $item->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    {{ Form::close() }}
                                </td>
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