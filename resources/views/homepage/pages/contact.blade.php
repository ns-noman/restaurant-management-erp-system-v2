@extends('homepage.layouts.app')
@section('title','Contact')
@section('content')

                <div class="content">
                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/11.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url({{ asset('home') }}/images/bg/11.jpg); transform: translateZ(0px) translateY(0%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>Our Address</h4>
                                <h2>Contact Us</h2>
                                <div class="dots-separator fl-wrap"><span></span></div>
                            </div>
                        </div>
                        <div class="hero-section-scroll">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                        </div>
                        <div class="brush-dec"></div>
                    </section>

                    <!--  section  -->
                    <section class="hidden-section big-padding con-sec" data-scrollax-parent="true" id="sec3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="section-title text-align_left">
                                        <h2>Get in touch</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>
                                    <div class="text-block ">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam aperiam. Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
                                        </p>
                                    </div>
                                    <div class="contactform-wrap">
                                        <div id="message"></div>
                                        <form class="custom-form" action="{{ route('contact.store') }}" name="contactform" id="" method="POST">
                                            @csrf
                                            <fieldset>
                                            <div id="message2"></div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" id="name" placeholder="Your Name *" value="{{ old('name') }}" required>
                                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="email" id="email" placeholder="Email Address *" value="{{ old('email') }}">
                                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="mobile" id="mobile" placeholder="Phone *" value="{{ old('mobile') }}">
                                                        <div class="text-danger">{{ $errors->first('mobile') }}</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                         <input type="text" name="subject" id="subject" placeholder="Subject *" value="{{ old('subject') }}">
                                                         <div class="text-danger">{{ $errors->first('subject') }}</div>
                                                    </div>
                                                </div>
                                                <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Your Message:">{{ old('comments') }}</textarea>
                                                <div class="text-danger">{{ $errors->first('comments') }}</div>
                                                <div class="clearfix"></div>
                                                <button type="submit" class="btn float-btn flat-btn color-bg" id="">Send Message <i class="fal fa-long-arrow-right"></i></button>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="section-dec sec-dec_top"></div>
                                </div>
                                <div class="col-md-5">
                                    <div class="column-text_inside fl-wrap dark-bg">
                                        <div class="column-text">
                                            <div class="section-title">
                                                <h4>Call For Reservations</h4>
                                                <h2>Opening Hours</h2>
                                                <div class="dots-separator fl-wrap"><span></span></div>
                                            </div>
                                            <div class="work-time fl-wrap">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <h3>Sunday to Thursday</h3>
                                                    <div class="hours">
                                                        09:00 AM<br>
                                                        02:00 AM
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3>Friday to Saturday</h3>
                                                    <div class="hours">
                                                        09:00 AM<br>
                                                        02:00 AM
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="bold-separator"><span></span></div>
                                            <div class="big-number"><a href="#">+8801847-091017</a></div>
                                        </div>
                                        <div class="illustration_bg">
                                            <div class="bg" data-bg="{{ asset('home') }}/images/bg/dec/6.png" style="background-image: url(&quot;{{ asset('home') }}/images/bg/dec/6.png&quot;);"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-bg">
                            <div class="bg" data-bg="{{ asset('home') }}/images/bg/dec/section-bg.png" style="background-image: url(&quot;{{ asset('home') }}/images/bg/dec/section-bg.png&quot;);"></div>
                        </div>
                    </section>
                    <!--  section end  -->
                    <div class="brush-dec2 brush-dec_bottom"></div>
                </div>

@endsection()
