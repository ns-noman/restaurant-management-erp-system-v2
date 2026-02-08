@extends('homepage.layouts.app')
@section('title','Register')
@section('content')
                <div class="content">
                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/11.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url({{ asset('home') }}/images/bg/11.jpg); transform: translateZ(0px) translateY(0%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h2>Register</h2>

                            </div>
                        </div>


                    </section>

                    <!--  section  -->
                    <section class="hidden-section big-padding con-sec" data-scrollax-parent="true" id="sec3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="section-title text-align_left">
                                        <h2>User Register</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>

                                    <div class="contactform-wrap">
                                         @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div>{{$error}}</div>
                                            @endforeach
                                        @endif

                                        <form class="custom-form" action="{{ route('register') }}" name="contactform" id="" method="POST">
                                            @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                                        <div class="text-warning">{{  $errors->first('name') }}</div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                                        <div class="text-warning">{{  $errors->first('email') }}</div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" value="{{ old('mobile') }}">
                                                        <div class="text-warning">{{  $errors->first('phone') }}</div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                                                        <div class="text-warning">{{  $errors->first('password') }}</div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                                        <div class="text-warning">{{  $errors->first('password_confirmation') }}</div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="text" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
                                                        <div class="text-warning">{{  $errors->first('address') }}</div>
                                                    </div>


                                                <div class="clearfix"></div>
                                                <button type="submit" class="btn float-btn flat-btn color-bg" id="submit_cnt">Register <i class="fal fa-long-arrow-right"></i></button>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="section-dec sec-dec_top"></div>
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
