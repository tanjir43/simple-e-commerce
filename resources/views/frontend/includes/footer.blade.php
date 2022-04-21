<footer class="footer">
    <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="cta-heading text-center">
                        <h3 class="cta-title text-white">Get The Latest Deals</h3><!-- End .cta-title -->
                        <p class="cta-desc text-white">and receive <span class="font-weight-normal">$20 coupon</span> for first shopping</p><!-- End .cta-desc -->
                    </div><!-- End .text-center -->

                    <form action="#">
                        <div class="input-group input-group-round">
                            <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="assets/images/demos/demo-4/logo-footer.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Got Question? Call us 24/7
                            <a href="tel:#">+0123 456 789</a>
                        </div><!-- End .widget-call -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                          <li><span>Address :</span>{{\App\Models\Settings::value('address')}}</li>
                          <li><span>Phone :</span>{{\App\Models\Settings::value('phone')}}</li>
                          <li><span>FAX :</span>{{\App\Models\Settings::value('fax')}}</li>
                          <li><span>Email :</span>{{\App\Models\Settings::value('email')}}</li>
                          <li><span></span></li>
                        </ul>
                        <div class="">
                            <label class="mr-3">Social Media</label>
                            <a href="{{\App\Models\Settings::value('facebook_url')}}" title="Facebook"><i class="icon-facebook-f"></i></a>
                            <a href="{{\App\Models\Settings::value('twitter_url')}}" title="Twitter"><i class="icon-twitter"></i></a>
                            <a href="{{\App\Models\Settings::value('linkedin_url')}}" title="Instagram"><i class="icon-instagram"></i></a>
                            <a href="{{\App\Models\Settings::value('pinterest_url')}}" title="Pinterest"><i class="icon-pinterest"></i></a>
                        </div>
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="cart.html">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2022 {{\App\Models\Settings::value('footer')}}. All Rights Reserved.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


{{--<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-10">--}}
{{--            <div class="row no-gutters bg-white newsletter-popup-content">--}}
{{--                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">--}}
{{--                    <div class="banner-content text-center">--}}
{{--                        <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">--}}
{{--                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>--}}
{{--                        <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>--}}
{{--                        <form action="#">--}}
{{--                            <div class="input-group input-group-round">--}}
{{--                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn" type="submit"><span>go</span></button>--}}
{{--                                </div><!-- .End .input-group-append -->--}}
{{--                            </div><!-- .End .input-group -->--}}
{{--                        </form>--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>--}}
{{--                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>--}}
{{--                        </div><!-- End .custom-checkbox -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-2-5col col-lg-5 ">--}}
{{--                    <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
