@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-bd">
                <div class="panel-heading ui-sortable-handle">
                    <div class="panel-title" style="max-width: calc(100% - 180px);">
                        <h4>{{ trans('admin.database.export') }}</h4>
                    </div>
                </div>
                <div class="panel-body" style="min-height: 200px">
                    <small id="fileHelp" class="text-muted">برای خروجی گرفتن از دیتابیس کافی است لینک زیر را برای دانلود آخرین نسخه از محتوای دیتابیس کلیک کنید. برای import از فایلی که از اینجا خروجی گرفته اید، استفاده کنید.</small>
                    <br><br><br><br>
                    <p><a href="{{ route('admin.databases.export') }}" class="btn btn-success">Export</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-bd">
                <div class="panel-heading ui-sortable-handle">
                    <div class="panel-title" style="max-width: calc(100% - 180px);">
                        <h4>{{ trans('admin.database.import') }}</h4>
                    </div>
                </div>
                <div class="panel-body" style="min-height: 200px">
                    <form action="{{ route('admin.databases.import') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="importFile" class="form-label">{{ trans('admin.database.importFile') }}</label>
                            <div class="form-control" style="height: 42px;">
                                <input type="file" name="file" id="importFile" aria-describedby="fileHelp">
                            </div>
                            <small id="fileHelp" class="text-muted">در این قسمت می بایست یکی از فایل‌هایی را که قبلا از طریق اکسپورت دیتابیس دریافت کرده اید، آپلود نمایید. بهتر است این فایل،‌ بروز ترین فایل شما باشد.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop