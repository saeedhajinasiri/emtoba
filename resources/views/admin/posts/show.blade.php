@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Blogs - {{ $blog->title }} </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $blog->title }}
                </div>

                <div class="panel-body">
                    {{ $blog->content }}
                </div>

            </div>

            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('blogs.destroy', $blog->id) }}" class="btn btn-danger">Delete</a>
            
            @unless(!$blog->tags->toArray())
            <h3>Tags</h3>
            <ul>
                @foreach($blog->tags as $tag)
                <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
            @endunless

        </div>
    </div>

@stop