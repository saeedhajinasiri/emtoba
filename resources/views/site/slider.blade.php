<section class="main-slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach($sliders as $slider)
                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1000" data-thumb="{{ $slider->image_link }}" data-saveperformance="off" data-title="{{ $slider->title }}">
                        <img src="{{ $slider->image_link }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">

                        <div class="tp-caption lfb tp-resizeme"
                             data-x="center" data-hoffset="-15"
                             data-y="center" data-voffset="-65"
                             data-speed="1500"
                             data-start="500"
                             data-easing="easeOutExpo"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.3"
                             data-endspeed="1200"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div class="slider-title1 curvy-bg text-center">
                                <h2 class="color-white title">{{ $slider->title }}</h2>
                            </div>
                        </div>

                        @if($slider->subtitle)
                            <div class="tp-caption lfb tp-resizeme"
                                 data-x="center" data-hoffset="-15"
                                 data-y="center" data-voffset="0"
                                 data-speed="1500"
                                 data-start="1000"
                                 data-easing="easeOutExpo"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.3"
                                 data-endspeed="1200"
                                 data-endeasing="Power4.easeIn"
                                 style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                                <div class="slider-title2 curvy-bg curvy-white text-center">
                                    <h2 class="title">{{ $slider->subtitle }}</h2>
                                </div>
                            </div>
                        @endif

                        @if($slider->content)
                            <div class="tp-caption lfb tp-resizeme"
                                 data-x="center" data-hoffset="-15"
                                 data-y="center" data-voffset="75"
                                 data-speed="1500"
                                 data-start="1000"
                                 data-easing="easeOutExpo"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.3"
                                 data-endspeed="1200"
                                 data-endeasing="Power4.easeIn"
                                 style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                                <div class="slider-text text-center">
                                    <p class="color-theme">{!! $slider->content !!}</p>
                                </div>
                            </div>
                        @endif

                        <div class="tp-caption lfb tp-resizeme"
                             data-x="center" data-hoffset="-15"
                             data-y="center" data-voffset="140"
                             data-speed="1500"
                             data-start="1500"
                             data-easing="easeOutExpo"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.3"
                             data-endspeed="1200"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div class="link-btn text-center">
                                <a href="{{ $slider->link }}" class="btn-thm btn-lg">{{ $slider->link_title ?: 'مشاهده' }}<i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>

                    </li>
                @endforeach

            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</section>