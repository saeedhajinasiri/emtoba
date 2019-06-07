@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Roles - {{ $role->title }} </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $role->title }}
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    {{ $role->description }}
                </div>

            </div>

            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-danger">Delete</a>

        </div>
    </div>

@stop