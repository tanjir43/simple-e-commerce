@extends('frontend.master')

@section('title')
        contact_us
@endsection


@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Contact us <span>Pages</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('homes')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact us 2</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div id="map" class="mb-5"></div><!-- End #map -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-box text-center">
                            <h3>Office</h3>

                            <address>{{get_setting('address')}}</address>
                        </div><!-- End .contact-box -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="contact-box text-center">
                            <h3>Start a Conversation</h3>

                            <div><a href="mailto:#">{{get_setting('email')}}</a></div>
                            <div><a href="tel:#">{{get_setting('phone')}}</a></div>
                        </div><!-- End .contact-box -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="contact-box text-center">
                            <h3>Social</h3>

                            <div class="social-icons social-icons-color justify-content-center">
                                <a href="#"  class="social-icon social-facebook" title="Facebook" target=""><i class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div><!-- End .soial-icons -->
                        </div><!-- End .contact-box -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->

                <hr class="mt-3 mb-5 mt-md-1">
                <div class="touch-container row justify-content-center">
                    <div class="col-md-9 col-lg-7">
                        <div class="text-center">
                            <h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                            <p class="lead text-primary">
                                We collaborate with ambitious brands and people; we’d love to build something great together.
                            </p><!-- End .lead text-primary -->
                            <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                        </div><!-- End .text-center -->

                        <form action="{{route('contact.submit')}}" method="POST" class="contact-form mb-2">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="cname" class="sr-only">Name</label>
                                    <input type="text" class="form-control" name="name" id="cname" placeholder="Name *" value="{{old('name')}}" required>
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div><!-- End .col-sm-4 -->

                                <div class="col-sm-4">
                                    <label for="cemail" class="sr-only">Name</label>
                                    <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *" value="{{old('email')}}" required>
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div><!-- End .col-sm-4 -->

                                <div class="col-sm-4">
                                    <label for="cphone" class="sr-only">Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="cphone" value="{{old('phone')}}" placeholder="Phone">
                                    @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                            <label for="csubject" class="sr-only">Subject</label>
                            <input type="text" class="form-control" name="subject" value="{{old('subject')}}" id="csubject" placeholder="Subject">
                            @error('subject')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <label for="cmessage" class="sr-only">Message</label>
                            <textarea class="form-control" name="message" cols="30" rows="4" id="cmessage" required value="{{old('message')}}" placeholder="Message *"></textarea>
                            @error('message')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>SUBMIT</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </div><!-- End .text-center -->
                        </form><!-- End .contact-form -->
                    </div><!-- End .col-md-9 col-lg-7 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection


@section('scripts')


@endsection
