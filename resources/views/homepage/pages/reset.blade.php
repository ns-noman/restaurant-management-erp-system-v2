@extends('homepage.layouts.app')
@section('title','Password Reset')
@section('content')
                <div class="content">
                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/11.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url({{ asset('home') }}/images/bg/11.jpg); transform: translateZ(0px) translateY(0%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h2>Login</h2>
                            </div>
                        </div>
                    </section>

                    <!--  section  -->
                    <section class="hidden-section big-padding con-sec" data-scrollax-parent="true" id="sec3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="section-title text-align_left">
                                        <h2>User Login</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>
                                    <div class="contactform-wrap">
                                        <form class="custom-form" action="{{ route('login') }}" name="contactform" id="" method="POST">
                                            @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="email" id="email" placeholder="Email Or Moble Number" value="{{ old('email') }}">
                                                        <div class="text-warning">{{  $errors->first('email') }}</div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                                                        <div class="text-warning">{{  $errors->first('password') }}</div>
                                                    </div>
                                                <button type="submit" class="btn float-btn flat-btn color-bg" id="submit_cnt">Proccess to Login <i class="fal fa-long-arrow-right"></i></button>
                                                <p>Haven't Account  <a class="" href="{{ route('user.register') }}" >Register</a></p>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="section-dec sec-dec_top"></div>
                                </div>

                            </div>
                        </div>
                        <div class="section-bg">
                            <div class="bg" data-bg="{{ asset('home') }}/images/bg/dec/section-bg.png" style="background-image: url({{ asset('home') }}/images/bg/dec/section-bg.png);"></div>
                        </div>
                    </section>
                    <!--  section end  -->
                    <div class="brush-dec2 brush-dec_bottom"></div>
                </div>

@endsection()
