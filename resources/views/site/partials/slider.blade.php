<section class="sppb-section" style="margin:0px;padding:0px;">
    <div class="sppb-row">
        <div class="sppb-col-sm-12">
            <div class="sppb-addon-container " style="padding:0px;">
                <div class="sppb-addon sppb-addon-module ">
                    <div class="sppb-addon-content">
                        <div id="ap-smart-layerslider-mod_91"
                             class="slider-pro style4 ">
                            <!-- Slides -->
                            <div class="sp-slides row-fluid">

                                @foreach($sliders as $slider)
                                    <div class="sp-slide">
                                        <img class="sp-image"
                                             data-src="{{ $slider->imageLink }}"
                                             alt="{{ $slider->title }}"/>
                                        <!-- Description (layers) -->
                                        <div class="ap-layer">
                                            <div class="sp-layer"
                                                 data-position="topLeft"
                                                 data-width="40%"
                                                 data-horizontal="250"
                                                 data-vertical="150"
                                                 data-show-transition="left"
                                                 data-show-duration="1000"
                                                 data-show-delay="700">
                                                <h1>
                                                    <a style="font-size:150%;color:#fff;text-shadow:2px 3px 10px #222;" href="{{ $slider->link }}">{!! $slider->title !!}</a>
                                                </h1>
                                            </div>
                                            @if($slider->subtitle)
                                                <div class="sp-layer"
                                                     data-position="topLeft"
                                                     data-width="40%"
                                                     data-horizontal="250"
                                                     data-vertical="230"
                                                     data-show-transition="right"
                                                     data-show-duration="2200"
                                                     data-show-delay="1000">
                                                    <h2 style="font-size:300%;line-height:1.5;color:#fff;text-shadow:2px 3px 15px #222;">{!! $slider->subtitle !!}</h2>
                                                    <hr/>
                                                </div>
                                            @endif
                                            @if($slider->content)
                                                <div class="sp-layer"
                                                     data-position="bottomLeft"
                                                     data-width="40%"
                                                     data-horizontal="260"
                                                     data-vertical="220"
                                                     data-show-transition="left"
                                                     data-show-duration="1300"
                                                     data-show-delay="1300">
                                                    <div style="font-size:36px;line-height:1.7;color:#fff;text-shadow:1px 2px 5px #222;direction: rtl;text-align: justify;">{!! $slider->content !!}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
