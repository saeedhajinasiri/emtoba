@extends('site.main')@section('meta_tags')    <title>{{ $item->title }} | {{ getSetting('site_title') }}</title>    <link rel="canonical" href="{{ $item->link }}">    <meta name="keywords" content="{{ $item->meta_keywords }}">    <meta name="description" content="{{ $item->meta_description }}">    <meta property="og:title" content="{{ $item->title }}"/>    <meta property="og:description" content="{{ $item->meta_description }}"/>    <meta property="og:image" content="{{ $item->imageLink }}"/>@stop@section('breadcrumbs')    {!! Breadcrumbs::render('site.blog.show', $item) !!}@stop@section('content')    <section id="sp-main-body">        <div class="container">            <div class="row">                <div class="col-sm-12 col-md-8">                    <div class="sp-column">                        <div id="system-message-container">                        </div>                        <article class="item item-page" itemscope itemtype="http://schema.org/Article">                            <meta itemprop="inLanguage" content="fa-IR"/>                            <div class="page-header">                                <h1>{{ $item->title }}</h1>                                <div class="post-meta m-b20">                                    <ul class="d-flex align-items-center">                                        <li class="post-date"><i class="fa fa-calendar"></i> <span> {{ $item->jalali_published_at->format('d F Y') }}</span></li>                                        <li class="post-author"><i class="fa fa-user"></i>توسط <a href="#">{{ $item->author_name }}</a></li>                                        <li class="post-comment"><i class="fa fa-eye"></i> <a href="#">{{ $item->hits }} @lang('site.hits')</a></li>                                    </ul>                                </div>                            </div>                            <div itemprop="articleBody">                                <p>{!! $item->content !!}</p>                                @if(count($item->media) > 0)                                    <div class="image-gallery">                                        @foreach($item->media as $media)                                            <div class="col-sm-4 col-xs-4 thumb">                                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"                                                   data-image="{{ $media->url }}"                                                   data-target="#image-gallery">                                                    <img class="img-thumbnail" src="{{ $media->url }}" alt="{{ $item->title }}">                                                </a>                                            </div>                                            @if ($loop->iteration % 3 == 0)                                                <div class='clearfix'></div>                                            @endif                                        @endforeach                                    </div>                                    <div class='clearfix'></div>                                    <hr>                                @endif                            </div>                        </article>                        @include('site.partials.comments', compact('comments'))                    </div>                </div>                <div class="col-md-4 col-sm-12 margin-top-50">                    <aside class="side-bar">                        @if(count($latest))                            <div class="widget recent-posts-entry">                                <h5 class="widget-title style-1">آخرین بلاگ ها</h5>                                <div class="widget-post-bx">                                    @foreach($latest as $list)                                        <div class="widget-post clearfix">                                            <div class="dlab-post-media">                                                <img src="{{ $list->image_link }}" width="200" height="143" alt="">                                            </div>                                            <div class="dlab-post-info">                                                <div class="dlab-post-header">                                                    <span class="post-title"><a href="{{ $list->link }}">{{ $list->title }}</a></span>                                                </div>                                                <div class="dlab-post-meta">                                                    <ul>                                                        <li class="post-author">{{ $list->author_name }}</li>                                                        <li class="post-comment"><i class="fa fa-eye"></i> {{ $list->hits }} {{ @trans('site.hits') }}</li>                                                    </ul>                                                </div>                                            </div>                                        </div>                                    @endforeach                                </div>                            </div>                        @endif                        @if(count($item->categories) > 0)                            <div class="widget widget_archive">                                <h5 class="widget-title style-1">{{ trans('site.categories') }}</h5>                                <ul>                                    @foreach($item->categories as $category)                                        <li><a href="{{ route('site.blog.index', ['category' => $category->slug]) }}">{{ $category->title }}</a></li>                                    @endforeach                                </ul>                            </div>                        @endif                        @if(count($item->tags) > 0)                            <div class="widget widget_tag_cloud radius">                                <h5 class="widget-title style-1">{{ trans('site.tags') }}</h5>                                <div class="tagcloud">                                    @foreach($item->tags as $tag)                                        <a href="{{ route('site.blog.index', ['tag' => $tag->slug]) }}"><i class="fa fa-tag"></i>{{ $tag->title }}</a>                                    @endforeach                                </div>                            </div>                        @endif                    </aside>                </div>            </div>        </div>        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">            <div class="modal-dialog modal-lg">                <div class="modal-content">                    <div class="modal-header">                        <h4 class="modal-title" id="image-gallery-title"></h4>                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>                        </button>                    </div>                    <div class="modal-body" style="overflow: hidden;padding: 0">                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">                    </div>                    <div class="modal-footer">                        <button type="button" class="btn btn-secondary pull-left" id="show-next-image"><i class="fa fa-arrow-left"></i>                        </button>                        <button type="button" id="show-previous-image" class="btn btn-secondary pull-right"><i class="fa fa-arrow-right"></i>                        </button>                    </div>                </div>            </div>        </div>    </section>@stop@section('stylesheets')@stop@section('scripts')    <script>        var modalId = $('#image-gallery');        $(document)            .ready(function () {                loadGallery(true, 'a.thumbnail');                //This function disables buttons when needed                function disableButtons(counter_max, counter_current) {                    $('#show-previous-image, #show-next-image')                        .show();                    if (counter_max === counter_current) {                        $('#show-next-image')                            .hide();                    } else if (counter_current === 1) {                        $('#show-previous-image')                            .hide();                    }                }                /**                 *                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.                 * @param setClickAttr  Sets the attribute for the click handler.                 */                function loadGallery(setIDs, setClickAttr) {                    let current_image,                        selector,                        counter = 0;                    $('#show-next-image, #show-previous-image')                        .click(function () {                            if ($(this)                                    .attr('id') === 'show-previous-image') {                                current_image--;                            } else {                                current_image++;                            }                            selector = $('[data-image-id="' + current_image + '"]');                            updateGallery(selector);                        });                    function updateGallery(selector) {                        let $sel = selector;                        current_image = $sel.data('image-id');                        $('#image-gallery-title')                            .text($sel.data('title'));                        $('#image-gallery-image')                            .attr('src', $sel.data('image'));                        disableButtons(counter, $sel.data('image-id'));                    }                    if (setIDs == true) {                        $('[data-image-id]')                            .each(function () {                                counter++;                                $(this)                                    .attr('data-image-id', counter);                            });                    }                    $(setClickAttr)                        .on('click', function () {                            updateGallery($(this));                        });                }            });        // build key actions        $(document)            .keydown(function (e) {                switch (e.which) {                    case 37: // left                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {                            $('#show-previous-image')                                .click();                        }                        break;                    case 39: // right                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {                            $('#show-next-image')                                .click();                        }                        break;                    default:                        return; // exit this handler for other keys                }                e.preventDefault(); // prevent the default action (scroll / move caret)            });    </script>@stop