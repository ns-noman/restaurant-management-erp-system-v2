@extends('homepage.layouts.app')
@section('title','About Us')
@section('content')

                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/10.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;{{ asset('home') }}/images/bg/10.jpg&quot;); transform: translateZ(0px) translateY(29.9368%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>Enjoy your time in our restaurant with pleasure.</h4>
                                <h2>About our Restaurant</h2>
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
                    <section class="hidden-section big-padding" data-scrollax-parent="true">
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
                                        <a href="{{ route('menu') }}" class="btn fl-btn">Explore Our Menu<i class="fal fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image-collge-wrap fl-wrap">
                                        <div class="single-slider-wrap">
                                            <div class="single-slider fl-wrap">
                                                <div class="swiper-container swiper-container-horizontal swiper-container-autoheight" style="cursor: grab;">
                                                    <div class="swiper-wrapper lightgallery" style="transition-duration: 0ms; transform: translate3d(-597px, 0px, 0px); height: 418px;"><div class="swiper-slide hov_zoom swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="2" style="width: 597px;"><img src="{{ asset('home') }}/images/all/2.jpg" alt=""><a href="{{ asset('home') }}/images/all/2.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                        <div class="swiper-slide hov_zoom swiper-slide-active" data-swiper-slide-index="0" style="width: 597px;"><img src="{{ asset('home') }}/images/all/4.jpg" alt=""><a href="{{ asset('home') }}/images/all/4.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                        <div class="swiper-slide hov_zoom swiper-slide-next" data-swiper-slide-index="1" style="width: 597px;"><img src="{{ asset('home') }}/images/all/1.jpg" alt=""><a href="{{ asset('home') }}/images/all/1.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                        <div class="swiper-slide hov_zoom swiper-slide-duplicate-prev" data-swiper-slide-index="2" style="width: 597px;"><img src="{{ asset('home') }}/images/all/2.jpg" alt=""><a href="{{ asset('home') }}/images/all/2.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div>
                                                    <div class="swiper-slide hov_zoom swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 597px;"><img src="{{ asset('home') }}/images/all/4.jpg" alt=""><a href="{{ asset('home') }}/images/all/4.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a></div></div>
                                                    <div class="ss-slider-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                                                    <div class="ss-slider-cont ss-slider-cont-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="fas fa-caret-left"></i></div>
                                                    <div class="ss-slider-cont ss-slider-cont-next" tabindex="0" role="button" aria-label="Next slide"><i class="fas fa-caret-right"></i></div>
                                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                            </div>
                                        </div>
                                        <div class="images-collage-item col_par" style="width: 120px; top: -17%; z-index: 9; left: -23%; transform: translateZ(0px) translateY(2.5788px);" data-position-left="-23" data-position-top="-17" data-zindex="9" data-scrollax="properties: { translateY: '150px' }"><img src="{{ asset('home') }}/images/cube.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-dec sec-dec_top"></div>
							<div class="wave-bg" data-scrollax="properties: { translateY: '-150px' }" style="transform: translateZ(0px) translateY(-2.5788px);"></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="parallax-section dark-bg hidden-section" data-scrollax-parent="true">
                        <div class="brush-dec2"></div>
                        <div class="brush-dec"></div>
                        <div class="bg par-elem bg_tabs" data-bg="{{ asset('home') }}/images/bg/14.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;{{ asset('home') }}/images/bg/14.jpg&quot;);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="254">154</div>
                                        </div>
                                    </div>
                                    <h6>New Visiters Every Week</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="12168">12168</div>
                                        </div>
                                    </div>
                                    <h6>Happy Customers Every Year</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="172">172</div>
                                        </div>
                                    </div>
                                    <h6>Won Awards</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts  -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="732">732</div>
                                        </div>
                                    </div>
                                    <h6>Weekly Deliveries</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                        </div>
                    </section>
                    <!--  section  end-->


                    <!--  section  -->
                    <section>
                        <div class="brush-dec2 brush-dec_bottom"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>What said about us</h4>
                                <h2>Feedback</h2>
                                <div class="dots-separator fl-wrap"><span></span></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="testimonilas-carousel-wrap fl-wrap">
                            <div class="tc-button tc-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="fas fa-caret-right"></i></div>
                            <div class="tc-button tc-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="fas fa-caret-left"></i></div>
                            <div class="testimonilas-carousel">
                                <div class="swiper-container swiper-container-horizontal" style="cursor: grab;">
                                    <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1288.67px, 0px, 0px);"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/3.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Frank Dellov</h3>
                                                    <div class="star-rating" data-starrating="4"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">02.</span>
                                                </div>
                                            </div>
                                        </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/4.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Centa Simpson</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">03.</span>
                                                </div>
                                            </div>
                                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/5.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Nicolo Svensky</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">04.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item-->
                                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/2.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Andy Dimasky</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">01.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/3.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Frank Dellov</h3>
                                                    <div class="star-rating" data-starrating="4"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">02.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide" data-swiper-slide-index="2" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/4.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Centa Simpson</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">03.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                        <!--testi-item-->
                                        <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/5.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Nicolo Svensky</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">04.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--testi-item end-->
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/2.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Andy Dimasky</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">01.</span>
                                                </div>
                                            </div>
                                        </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/3.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Frank Dellov</h3>
                                                    <div class="star-rating" data-starrating="4"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">02.</span>
                                                </div>
                                            </div>
                                        </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 614.333px; margin-right: 30px;">
                                            <div class="testi-item fl-wrap">
                                                <div class="testi-avatar"><img src="{{ asset('home') }}/images/avatar/4.jpg" alt=""></div>
                                                <div class="testimonilas-text fl-wrap">
                                                    <h3>Centa Simpson</h3>
                                                    <div class="star-rating" data-starrating="5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </div>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <span class="testi-number">03.</span>
                                                </div>
                                            </div>
                                        </div></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            </div>
                            <div class="tc-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="brush-dec2 brush-dec_bottom"></div>
                </div>





@endsection
