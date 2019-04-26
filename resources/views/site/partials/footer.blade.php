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
</footer>