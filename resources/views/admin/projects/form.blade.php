@extends('admin.master')

@section('content')

    <div class="row">

        {!! form_start($form) !!}

        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="pull-right">
                        {!! form_widget($form->state) !!}
                    </div>
                    <div class="pull-left">
                        {!! form_row($form->SaveAndReload) !!}
                        <div class="btn-group m-b-5">
                            <a class="btn btn-primary btn-labeled" href="javascript:void(0);" data-toggle="dropdown">
                                <span class="btn-label"> <i class="fa fa-save"></i> </span>
                                <span class="hidden-xs"> @lang('admin.save') </span>
                            </a>
                            <button class="btn dropdown-toggle btn-primary" type="button" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">primary</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>{!! form_row($form->SaveAndClose) !!}</li>
                                <li>{!! form_row($form->SaveAndShow) !!}</li>
                                <li>{!! form_row($form->SaveAndNew) !!}</li>
                            </ul>
                        </div>
                        <a href="{!! route('admin.projects.index') !!}" class="btn btn-labeled btn-danger m-b-5">
                            <span class="btn-label"> <i class="fa fa-times"></i> </span>
                            <span class="hidden-xs"> @lang('admin.cancel') </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_projects" data-toggle="tab">{{ trans('admin.projects.info') }}</a></li>
                @if(isset($item))
                    <li><a href="#tab_gallery_info" data-toggle="tab">{{ trans('admin.projects.gallery_info') }}</a></li>
                @endif
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab_projects">
                    <div class="panel-body">

                        <div class="col-sm-12 col-md-8">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ trans('admin.projects.info') }}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {!! form_row($form->title) !!}
                                    {!! form_row($form->page_title) !!}
                                    {!! form_row($form->slug) !!}
                                    {!! form_row($form->content) !!}
                                    {!! form_row($form->abstract) !!}
                                    {!! form_row($form->video_description) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ trans('admin.page.image') }}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {!! form_row($form->image) !!}
                                    @if(isset($item))
                                        <img src="/images/project/{{ $item->image }}" alt="{{ $item->image }}" width="100%">
                                    @endif
                                </div>
                            </div>
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ trans('admin.page.video_cover') }}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {!! form_row($form->video_url) !!}
                                    {!! form_widget($form->video_cover) !!}
                                    @if(isset($item))
                                        <img src="/images/project/{{ $item->video_cover }}" alt="{{ $item->video_cover }}" width="100%">
                                    @endif
                                </div>
                            </div>
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ trans('admin.posts.other') }}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        {!! form_label($form->featured) !!}
                                        {!! form_widget($form->featured) !!}
                                    </div>
                                    {!! form_row($form->published_at) !!}
                                    {!! form_row($form->category_list) !!}
                                </div>
                            </div>
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ trans('admin.projects.info') }}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {!! form_row($form->architects) !!}
                                    {!! form_row($form->architects_url) !!}
                                    {!! form_row($form->location) !!}
                                    {!! form_row($form->location_url) !!}
                                    {!! form_row($form->employer) !!}
                                    {!! form_row($form->project_year) !!}
                                    {!! form_row($form->dimension) !!}
                                    {!! form_row($form->length) !!}
                                </div>
                            </div>
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ trans('admin.projects.seo') }}</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    {!! form_row($form->meta_keywords) !!}
                                    {!! form_row($form->meta_description) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($item))
                    <div class="tab-pane fade" id="tab_gallery_info">
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <input id="file-explorer" name="galleries[]" type="file" multiple>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {!! form_end($form, false) !!}
    </div>

@stop

@section('additional_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <link href="/panel/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/bootstrap-datetime-picker/css/jquery.Bootstrap-PersianDateTimePicker.css" rel="stylesheet"/>
    <link href="/panel/assets/plugins/fileinputs/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/fileinputs/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
@stop
@section('additional_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="/panel/assets/plugins/summernote/summernote.min.js" type="text/javascript"></script>
    <script src="/panel/assets/plugins/bootstrap-datetime-picker/js/jalali.js"></script>
    <script src="/panel/assets/plugins/bootstrap-datetime-picker/js/jquery.Bootstrap-PersianDateTimePicker.js"></script>

    <script type="text/javascript">
        $('#category_list').select2({
            tags: true
        });

        $(document).ready(function () {
            $(['#content']).summernote({
                height: 200,
                minHeight: null,
                maxHeight: null
            });
        });
    </script>

    @if(isset($item))
        <script src="/panel/assets/plugins/fileinputs/js/plugins/sortable.js" type="text/javascript"></script>
        <script src="/panel/assets/plugins/fileinputs/js/fileinput.js" type="text/javascript"></script>
        <script src="/panel/assets/plugins/fileinputs/themes/explorer-fa/theme.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#file-explorer").fileinput({
                    'theme': 'explorer',
                    'uploadUrl': '{{ route('admin.projects.uploadPhoto', $item->id) }}',
                    'uploadExtraData': {
                        '_token': '{{ csrf_token() }}'
                    },
                    overwriteInitial: false,
                    initialPreviewAsData: true,
                    initialPreview: [
                        @foreach($item->media as $media)
                            '{{ $media->url }}',
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach($item->media as $key => $media)
                        {
                            caption: "{!! $media->name !!}", size: '{!! Illuminate\Support\Facades\File::isFile($media->path . $media->name) ? fileSize($media->path . $media->name) : '' !!}', width: "120px", url: "{!! route('admin.projects.removePhoto', [$item, $media])  !!}", key: {!! $key+1 !!}, extra: {_token: '{!! csrf_token() !!}'}
                        },
                        @endforeach
                    ]
                });
            });
        </script>
    @endif
@stop