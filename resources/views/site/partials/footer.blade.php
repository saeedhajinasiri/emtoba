<footer id="sp-footer">
    <div class="container">
        <div class="row">
            <div id="sp-footer1" class="col-sm-12 col-md-12">
                <div class="sp-column ">
                    <div class="sp-copyright">
                        <marquee direction="right" width="auto" height="25"
                                 scrollamount="5" behavior="scroll">اَللّهُمَّ كُنْ لِوَلِيِّكَ الْحُجَّةِ بْنِ الْحَسَنِ صَلَواتُكَ عَلَيْهِ وَعَلى آبائِهِ في هذِهِ السّاعَةِ وَفي كُلِّ ساعَةٍ وَلِيّاً وَحافِظاً وَقائِداً وَناصِراً وَدَليلاً وَعَيْناً حَتّى تُسْكِنَهُ أَرْضَكَ طَوْعاً وَتُمَتِّعَهُ فيها طَويلا
                        </marquee>

                        @if(count($footerLinks) > 0)
                            <div style=" display:block; ">
                                @foreach($footerLinks as $link)
                                    <div style=" float:left;">
                                        <a href="{{ $link->url }}">
                                            <img style="float:left" src="{{ $link->image_link }}" alt="{{ $link->title }}"/>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<footer class="site-footer text-uppercase">
    <div class="footer-top bg-primary">
        <div class="container wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s ; animation-name: fadeIn;">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 footer-col-4 ">
                    <div class="widget">
                        <h5 class="m-b30 text-white">ثبت نام در خبر نامه</h5>
                        <p class="text-capitalize m-b20">برای آگاهی از آخرین اخبار ما، عضو شوید.</p>
                        <div class="subscribe-form m-b20">
                            <form class="dzSubscribe" action="script/mailchamp.php" method="post">
                                <div class="dzSubscribeMsg"></div>
                                <div class="input-group">
                                    <input name="dzEmail" required="required" class="form-control" placeholder="آدرس ایمیل شما" type="email">
                                    <span class="input-group-btn">
                                        <button value="Submit" type="submit" class="site-button btn btn-success">ثبت نام</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <ul class="list-inline m-a0">
                            @if(getSetting('facebook_url'))
                                <li><a target="_blank" href="{{ getSetting('facebook_url') }}" class="site-button facebook circle "><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if(getSetting('telegram_url'))
                                <li><a target="_blank" href="{{ getSetting('telegram_url') }}" class="site-button twitter circle "><i class="fa fa-paper-plane"></i></a></li>
                            @endif
                            @if(getSetting('instagram_url'))
                                <li><a target="_blank" href="{{ getSetting('instagram_url') }}" class="site-button instagram circle"><i class="fa fa-instagram"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @if(count($rightFooter))
                    <div class="col-5 col-lg-3 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_services border-0">
                            <h5 class="m-b30 text-white">@lang('site.footer.rightLinks')</h5>
                            <ul>
                                @foreach($rightFooter as $link)
                                    <li><a href="{{ $link->link }}">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if(count($centerFooter))
                    <div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_services border-0">
                            <h5 class="m-b30 text-white">@lang('site.footer.centerLinks')</h5>
                            <ul>
                                @foreach($centerFooter as $link)
                                    <li><a href="{{ $link->link }}">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if(count($leftFooter))
                    <div class="col-3 col-lg-2 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_services border-0">
                            <h5 class="m-b30 text-white">@lang('site.footer.leftLinks')</h5>
                            <ul>
                                @foreach($leftFooter as $link)
                                    <li><a href="{{ $link->link }}">{{ $link->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom bg-primary">
        <div class="container">
            <div class="row-buttom">
                <div>
                    <span>@lang('site.copyright')</span>
                </div>

            </div>
        </div>
    </div>
</footer>
{{--
<div class="height-emulator fl-wrap"></div>
<footer class="main-footer fixed-footer">
    <div class="pr-bg"></div>
    <div class="container">
        <div class="fl-wrap footer-inner">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="images/logo.png" alt="">
                    </div>
                    <div class="footer_text  footer-box fl-wrap">
                        <p>{!! $settings['footer_text'] !!}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-header fl-wrap"><span>01.</span> Contacts</div>
                    <!-- footer-contacts-->
                    <div class="footer-contacts footer-box fl-wrap">
                        <ul>
                            <li><span>Call:</span><a href="tel:{{ $settings['mobile'] }}">{{ $settings['mobile'] }}</a></li>
                            <li><span>Write  :</span><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></li>
                            <li><span>Find us : </span><a href="{{ $settings['map_address'] }}">Tehran, Iran</a></li>
                        </ul>
                    </div>
                    <!-- footer contacts end -->
                    <a href="{{ route('site.contacts.create') }}" class="ajax fc_button">Get In Touch <i class="fal fa-envelope"></i></a>
                </div>
                <div class="col-md-4">
                    <div class="footer-header fl-wrap"><span>02.</span> Subscribe</div>
                    <div class="footer-box fl-wrap">
                        <p>{!! $settings['subscribe_text'] !!}</p>
                        <div class="subcribe-form fl-wrap">
                            <form id="subscribe" class="fl-wrap">
                                <input class="enteremail" name="email" id="subscribe-email" placeholder="Your Email" spellcheck="false" type="text">
                                <button type="submit" id="subscribe-button" class="subscribe-button"> Send <i class="fal fa-long-arrow-right"></i></button>
                                <label for="subscribe-email" class="subscribe-message"></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subfooter fl-wrap">
            <!-- policy-box-->
            <div class="policy-box">
                <span>&#169; Nasiri ArchVIZ Studio 2019  /  All rights reserved. </span>
            </div>
            <!-- policy-box end-->
            <a href="#" class="to-top-btn to-top">Back to top <i class="fal fa-long-arrow-up"></i></a>
        </div>
    </div>
    <div class="footer-canvas">
        <div class="dots gallery__dots" data-dots=""></div>
    </div>
</footer>--}}
