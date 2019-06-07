@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                    </div>
                    <div class="pull-left">
                        <a href="{{ route('admin.' . $section . '.create') }}" class="btn btn-labeled btn-success m-b-5" type="button">
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
                                <th> {{ trans('admin.' . $section . '.name') }} </th>
                                <th> {{ trans('admin.' . $section . '.username') }} </th>
                                <th> {{ trans('admin.' . $section . '.email') }} </th>
                                <th> {{ trans('admin.' . $section . '.created_at') }} </th>
                                <th> {{ trans('admin.' . $section . '.actions') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="odd gradeX">
                                <td>{{ $item->user->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td class="center">{{ $item->user->created_at }}</td>
                                <td class="center">
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['admin.' . $section . '.destroy', $item->id]]) }}
                                        <a href="{{ route('admin.' . $section . '.edit', $item->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        @if($section == 'customers')
                                            <a href="{{ route('admin.' . $section . '.loginAs', $item->id) }}" class="btn btn-purple btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Login"><i class="fa fa-key" aria-hidden="true"></i> ورود </a>
                                        @endif
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @empty
                            <tr class="odd gradeX">
                                <td colspan="10">
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