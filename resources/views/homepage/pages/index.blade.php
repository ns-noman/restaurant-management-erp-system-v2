@extends('homepage.layouts.app')
@section('title','Homepage')
@section('content')

			@include('homepage.components.hero')


        <!-- content  -->
                <div class="content">
                    <section class="hidden-section big-padding" data-scrollax-parent="true" id="sec2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-title text-align_left">
                                        <h4>Our story</h4>
                                        <h2>Few words about us</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>
                                    <div class="text-block ">
                                         <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam aperiam. Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt.
                                            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
                                        </p>
                                        <p> Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
                                        <a href="{{ route('menu',['woodenspoon'])  }}" class="btn fl-btn">Explore Our Menu Wooden Spoon<i class="fal fa-long-arrow-right"></i></a>
                                        <a href="{{ route('menu',['deshibites'])  }}" class="btn fl-btn">Explore Our Menu Deshi Bites<i class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image-collge-wrap fl-wrap">
                                        <div class="main-iamge">
                                            <img src="{{ asset('home') }}/images/all/3.jpg"   alt="">
                                        </div>
                                        <div class="images-collage-item" style="width:65%" data-position-left="68" data-position-top="-15" data-zindex="2" data-opacity="1.0"><img src="{{ asset('home') }}/images/all/8.jpg" alt=""></div>
                                        <div class="images-collage-item col_par" style="width:120px" data-position-left="-23" data-position-top="-17" data-zindex="9" data-scrollax="properties: { translateY: '150px' }"><img src="{{ asset('home') }}/images/cube.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-dec sec-dec_top"></div>
                        <div class="wave-bg" data-scrollax="properties: { translateY: '-150px' }"></div>
                        </div>
                    </section>
                    <!--  section end  -->
                    <!-- section   -->
                    <section class="column-section no-padding hidden-section" data-scrollax-parent="true" id="sec4">
                        <div class="column-wrap-bg left-wrap">
                            <div class="bg par-elem "  data-bg="{{ asset('home') }}/images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                            <div class="overlay"></div>
                            <div class="quote-box">
                                <i class="fal fa-quote-right"></i>
                                <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi accusantium."</p>
                                <div class="signature"><img src="{{ asset('home') }}/images/signature.png" alt=""></div>
                                <h4>Kevin  Kowalsky - Restaurant’s cheaf</h4>
                            </div>
                        </div>
                        <div class="column-section-wrap dark-bg" >
                            <div class="container"  >
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
                                                    01:00 AM
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h3>Friday to Saturday</h3>
                                                <div class="hours">
                                                     02:00 PM<br>
                                                     01:00 AM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="bold-separator"><span></span></div>
                                    <div class="big-number"><a href="#">+8801847-091017</a></a></div>
                                </div>
                            </div>
                            <div class="illustration_bg">
                                <div class="bg"  data-bg="{{ asset('home') }}/images/bg/dec/7.png"></div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--  section    -->
                    <section data-scrollax-parent="true">
                        <div class="container">
                            <div class="section-title">
                                <h4>Why people choose us</h4>
                                <h2>Prepare for first-class service</h2>
                                <div class="dots-separator fl-wrap"><span></span></div>
                            </div>
                            <div class="cards-wrap fl-wrap">
                                <div class="row">
                                    <!--card item -->
                                    <div class="col-md-4">
                                        <div class="content-inner fl-wrap">
                                            <div class="content-front">
                                                <div class="cf-inner">
                                                    <div class="bg "  data-bg="{{ asset('home') }}/images/services/1.jpg"></div>
                                                    <div class="overlay"></div>
                                                    <div class="inner">
                                                        <h2>Daily New Fresh Menus</h2>
                                                        <h4>Start eating better</h4>
                                                    </div>
                                                    <div class="serv-num">01.</div>
                                                </div>
                                            </div>
                                            <div class="content-back">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <div class="dec-icon">
                                                            <i class="fal fa-fish"></i>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--card item end -->
                                    <!--card item -->
                                    <div class="col-md-4">
                                        <div class="content-inner fl-wrap">
                                            <div class="content-front">
                                                <div class="cf-inner">
                                                    <div class="bg "  data-bg="{{ asset('home') }}/images/services/2.jpg"></div>
                                                    <div class="overlay"></div>
                                                    <div class="inner">
                                                        <h2>Fresh Ingredient, Tasty Meals</h2>
                                                        <h4>Quality is the heart</h4>
                                                    </div>
                                                    <div class="serv-num">02.</div>
                                                </div>
                                            </div>
                                            <div class="content-back">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <div class="dec-icon">
                                                            <i class="fal fa-carrot"></i>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--card item end -->
                                    <!--card item -->
                                    <div class="col-md-4">
                                        <div class="content-inner fl-wrap">
                                            <div class="content-front">
                                                <div class="cf-inner">
                                                    <div class="bg "  data-bg="{{ asset('home') }}/images/services/3.jpg"></div>
                                                    <div class="overlay"></div>
                                                    <div class="inner">
                                                        <h2>Creative & Talented Chefs</h2>
                                                        <h4>Hot & ready to serve</h4>
                                                    </div>
                                                    <div class="serv-num">03.</div>
                                                </div>
                                            </div>
                                            <div class="content-back">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <div class="dec-icon">
                                                            <i class="fal fa-utensils-alt"></i>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--card item end -->
                                </div>
                                <div class="section-dec sec-dec_top"></div>
                                <div class="section-dec sec-dec_bottom"></div>
                            </div>
                            <a href="{{ route('about') }}" class="btn fl-btn border-btn">Read More About us <i class="fal fa-long-arrow-right"></i></a>
                            <div class="images-collage-item col_par" style="width:120px" data-position-left="83" data-position-top="87" data-zindex="1" data-scrollax="properties: { translateY: '150px' }"><img src="{{ asset('home') }}/images/cube.png" alt=""></div>
                        </div>
                        <div class="section-bg">
                            <div class="bg"  data-bg="{{ asset('home') }}/images/bg/dec/section-bg.png"></div>
                        </div>
                    </section>
                    <!--  section end  -->



                    <section class="small-top-padding">
                        <div class="brush-dec2 brush-dec_bottom"></div>
                        <div class="container">
                            <!--  hero-menu_header  end-->
                            <div class="hero-menu single-menu  tabs-act fl-wrap">
                                <div class="gallery_filter-button btn">Show Filters <i class="fal fa-long-arrow-down"></i></div>
                                <!--  hero-menu_header-->
                                <div class="hero-menu_header fl-wrap gth">
                                    <ul class="tabs-menu  no-list-style">

                                        @foreach ($categories  as $key => $category)
                                        <li class="{{ $key== '0' ? 'current' : '' }}"><a href="#tab-{{ $category->id }}">  {{ $category->name }}</a></li>
                                        @endforeach


                                    </ul>
                                </div>
                                <!--  hero-menu_header  end-->
                                <!--  hero-menu_content   -->
                                <div class="hero-menu_content fl-wrap">
                                    <div class="tabs-container">
                                         @foreach ($categories  as $key => $category)
                                        <div class="tab">


                                            <!--tab -->
                                            <div id="tab-{{ $category->id }}" class="tab-content {{ $key== '0' ? 'first-tab' : '' }} ">

                                                 @foreach ($category->food as $food)
                                                <!-- hero-menu-item-->
                                                <div class="hero-menu-item" style="height: 88px;">
                                                    <a href="{{ asset('images') }}/{{$food->image }}" class="hero-menu-item-img image-popup"><img src="{{ asset('images') }}/{{$food->image }}" alt=""></a>
                                                    <div class="hero-menu-item-title fl-wrap">
                                                        <h6> {{$food->name }} </h6>
                                                        <div class="hmi-dec" style="left: 157px;"></div>
                                                         <span class="hero-menu-item-price">TK {{$food->price }}</span>
                                                        <div class="add_cart add_to_cart" data-id="{{ $food->id }}">Add To Cart</div>
                                                    </div>
                                                    <div class="hero-menu-item-details">
                                                        <p> {{$food->description }} </p>
                                                    </div>
                                                </div>
                                                <!-- hero-menu-item end-->
                                                 @endforeach
                                                <!-- hero-menu-item end-->
                                            </div>
                                            <!--tab end -->
                                            </div>
                                        @endforeach
                                            <!--tab 2-->

                                            <!--tab end -->

                                        <!--tabs end -->
                                    </div>
                                </div>
                                <!--  hero-menu_content end  -->
                            </div>
                            <!--  hero-menu  end-->
                            <div class="clearfix"></div>
                            <div class="bold-separator bold-separator_dark"><span></span></div>

                        </div>
                        <div class="section-bg">
                            <div class="bg" data-bg="images/bg/dec/section-bg.png" style="background-image: url(&quot;images/bg/dec/section-bg.png&quot;);"></div>
                        </div>
                    </section>
                    <!-- section end  -->
                </div>
                <!-- content end  -->
@endsection
