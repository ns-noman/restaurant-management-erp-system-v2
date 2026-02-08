@extends('homepage.layouts.app')
@section('title','Cart')
@section('content')

<div class="content">
                    <!--  section  -->
                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/17.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url({{ asset('home') }}/images/bg/17.jpg); transform: translateZ(0px) translateY(0%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>Order food with home delivery</h4>
                                <h2>Your Cart</h2>
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
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="hidden-section">
                        <form action="{{ route('user.order.store') }}" method="POST">
                            @csrf
                         <div class="container">
                            <!-- CHECKOUT TABLE -->
                            <div class="row">
                                <div class="col-md-8 carttable">

                                    <!-- /COUPON -->
                                </div>
                                <div class="col-md-4">
                                    <!-- CART TOTALS  -->
                                    <div class="cart-totals dark-bg fl-wrap">

                                    </div>
                                    <!-- /CART TOTALS  -->
                                </div>
                            </div>
                            <!-- /CHECKOUT TABLE -->
                        </div>
                         </form>
                        <div class="section-bg">
                            <div class="bg" data-bg="{{ asset('home') }}/images/bg/dec/section-bg.png" style="background-image: url({{ asset('home') }}/images/bg/dec/section-bg.png);"></div>
                        </div>
                    </section>
                    <!--  section end  -->
                    <div class="brush-dec2 brush-dec_bottom"></div>
                </div>

@endsection
