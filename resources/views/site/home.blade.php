@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.home.title')  }} | {{ getSetting('site_title') }}</title>
@stop

@section('content')

    <div class="content full-height dark-bg hidden-item">
        @if(count($sliders) > 0)
            <div class="media-container">
                <div class="fs-slider-wrap full-height fl-wrap">
                    <div class="fs-slider lightgallery" data-mousecontrol2="true">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide-->
                                @foreach($sliders as $slider)
                                    <div class="swiper-slide hov_zoom">
                                        <div class="fs-slider-item fl-wrap">
                                            <div class="bg" data-bg="{{ $slider->image_link }}"></div>
                                            <div class="overlay"></div>
                                            <div class="sec-lines"></div>
                                            <div class="hero-title fl-wrap">
                                                <div class="container">
                                                    <div class="section-title fl-wrap">
                                                        <div class="pr-bg"></div>
                                                        <h2>{{ $slider->title }} <span><br> {{ $slider->subtitle }} </span></h2>
                                                        <p>{!! $slider->content !!}</p>
                                                        <a href="{{ $slider->link }}" class="half-hero-wrap_link ajax">View Project <i class="fal fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                @if(count($sliders) > 1)
                    <div class="hero-slider_control-wrap bot-element">
                        <div class="hero-slider_control hero-slider-button-next"><span>Next<i class="fal fa-angle-right"></i></span></div>
                        <div class="hero-slider_control hero-slider-button-prev"><span><i class="fal fa-angle-left"></i>Prev </span></div>
                    </div>
                @endif
                <div class="hero-slider-wrap_pagination hlaf-slider-pag"></div>
            </div>
        @endif
        <a href="{{ route('site.projects.index') }}" class="custom-scroll-link start-btn color-bg hero-start bot-element"> Start explore <i class="fal fa-long-arrow-right"></i></a>
    </div>

@endsection

@section('stylesheets')
@stop

@section('scripts')
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script>
        $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%D روز %H:%M:%S'));
            });
        });
    </script>
@stop