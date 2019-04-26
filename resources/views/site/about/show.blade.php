@extends('site.main')

@section('meta_tags')
    <title>{{ $pages['about']['title'] }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ route('site.about.show') }}">
    <meta name="keywords" content="{{ $pages['about']['keywords'] }}">
    <meta name="description" content="{{ $pages['about']['description'] }}">

    <meta property="og:title" content="{{ $pages['about']['title'] }}"/>
    <meta property="og:description" content="{{ $pages['about']['description'] }}"/>
@stop

@section('content')
    <div class="content">
        <div class="fixed-column-wrap">
            <div class="pr-bg"></div>
            <div class="fixed-column-wrap-content">
                <div class="scroll-nav-wrap color-bg">
                    <div class="carnival">Scroll down</div>
                    <div class="snw-dec">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                </div>
                <div class="bg" data-bg="{!! $pages['about']['image_link'] !!}"></div>
                <div class="overlay"></div>
                <div class="progress-bar-wrap bot-element">
                    <div class="progress-bar"></div>
                </div>
                <div class="fixed-column-wrap_title first-tile_load">
                    <h2>{{ $pages['about']['title'] }}</h2>
                    <p>{!! $pages['about']['content'] !!}</p>
                </div>
                <div class="fixed-column-dec"></div>
            </div>
        </div>

        <div class="column-wrap">
            <div class="column-wrap-container fl-wrap">
                <div class="col-wc_dec">
                    <div class="pr-bg pr-bg-white"></div>
                </div>
                <div class="col-wc_dec col-wc_dec2">
                    <div class="pr-bg pr-bg-white"></div>
                </div>
                <section class="small-padding">
                    <div class="container">
                        <div class="split-sceen-content_title fl-wrap">
                            <div class="pr-bg pr-bg-white"></div>
                            <h3>{{ $pages['our_team']['title'] }}</h3>
                            <p>{!! $pages['our_team']['content'] !!}</p>
                        </div>

                        @foreach($teams as $team)
                            <div class="team-box">
                                <div class="pr-bg pr-bg-white"></div>
                                <div class="team-photo">
                                    <div class="overlay"></div>
                                    @if($team->image)
                                        <img src="{{ $team->image_link }}" alt="{{ $team->name }}" class="respimg">
                                    @endif
                                    <ul class="team-social">
                                        @if($team->facebook)
                                            <li><a href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-m"></i></a></li>
                                        @endif
                                        @if($team->instagram)
                                            <li><a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram-m"></i></a></li>
                                        @endif
                                        @if($team->twitter)
                                            <li><a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter-m"></i></a></li>
                                        @endif
                                        @if($team->linkedin)
                                            <li><a href="{{ $team->linkedin }}" target="_blank"><i class="fab fa-linkedin-m"></i></a></li>
                                        @endif
                                    </ul>
                                    @if($team->email)
                                        <a href="mailto:{{ $team->email }}" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>
                                    @endif
                                </div>
                                <div class="team-info">
                                    <h3>{{ $team->name }}</h3>
                                    <h4>{{ $team->job }}</h4>
                                    <p>{!! $team->content !!}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="section-number right_sn">
                            <div class="pr-bg pr-bg-white"></div>
                            <span>0</span>1.
                        </div>
                    </div>
                </section>
                <!--section end-->
                <div class="section-separator"></div>
                <!--section -->
                <section class="no-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inline-facts-container fl-wrap">
                                    <div class="pr-bg pr-bg-white"></div>
                                    <!-- inline-facts -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $settings['finished_projects'] }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Finished projects</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $settings['happy_customers'] }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Happy customers</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $settings['working_hours'] }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Working hours</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $settings['awards_won'] }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Awards won</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--section end-->
                <div class="section-separator"></div>
                <!--section-->
                <section class="small-padding">
                    <div class="container">
                        <div class="split-sceen-content_title fl-wrap">
                            <div class="pr-bg pr-bg-white"></div>
                            <h3>{{ $pages['testimonial_page']['title'] }}</h3>
                            <p>{!! $pages['testimonial_page']['content'] !!}</p>
                        </div>

                        <div class="column-wrap-content fl-wrap">
                            <div class="column-wrap-text">
                                <div class="testilider fl-wrap" data-effects="slide">
                                    <div class="pr-bg pr-bg-white"></div>
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($testimonials as $testimonial)
                                                <div class="swiper-slide">
                                                    <div class="testi-item fl-wrap">
                                                        @if($testimonial->image)
                                                            <div class="testi-avatar">
                                                                <img src="{{ $testimonial->image_link }}" alt="{{ $testimonial->name }}">
                                                            </div>
                                                        @endif
                                                        <h3>{{ $testimonial->name }}</h3>
                                                        <p>"{!! strip_tags($testimonial->content) !!}"</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="testilider-controls">
                                            <div class="tc-pagination"></div>
                                            <div class="ss-slider-btn ss-slider-prev color-bg"><i class="fal fa-long-arrow-left"></i></div>
                                            <div class="ss-slider-btn ss-slider-next color-bg"><i class="fal fa-long-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-number right_sn">
                            <div class="pr-bg pr-bg-white"></div>
                            <span>0</span>2.
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="limit-box fl-wrap"></div>
    </div>
@stop

@section('stylesheets')
@stop

@section('scripts')
@stop