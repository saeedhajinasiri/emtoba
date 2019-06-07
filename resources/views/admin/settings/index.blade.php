@extends('admin.master')

@section('content')

    <div class="row">
        <form method="POST" action="{{ route('admin.translations.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-lg-12">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="pull-right">
                        </div>
                        <div class="pull-left">
                            <button class="btn btn-default btn-success" type="submit">ثبت</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>{{ trans('admin.translations.info') }}</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="code" class="control-label">Code</label>
                            <input class="form-control" name="code" type="text" value="" id="code">
                        </div>
                        <div class="form-group">
                            <label for="value" class="control-label">Value</label>
                            <input class="form-control" name="value" type="text" value="" id="value">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop