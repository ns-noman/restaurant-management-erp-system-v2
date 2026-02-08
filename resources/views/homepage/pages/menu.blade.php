@extends('homepage.layouts.app')
@section('title','Food Menu')
@section('content')

    <div class="content">
                    <!--  section  -->
                    <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
                        <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/10.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url({{ asset('home') }}/images/bg/10.jpg); transform: translateZ(0px) translateY(0%);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title">
                                <h4>Special menu offers.</h4>
                                <h2>Discover Our menu</h2>
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
                          <section class="hidden-section" data-scrollax-parent="true" id="sec2">
                        <div class="container">
                            <div class="gallery_filter-button btn">Show Filters <i class="fal fa-long-arrow-down"></i></div>
                            <!-- gallery-filters -->
                            <div class="gallery-filters gth">
                                @foreach ($categories  as $key => $category)
                                <a href="#" class="gallery-filter  {{ $key == '0' ? 'gallery-filter-active' : '' }}" data-filter=".{{ $category->id  }}"></span>{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <!-- gallery-filters end-->
                            <!-- gallery start -->
                            <div class="gallery-items grid-big-pad  lightgallery three-column fl-wrap" style="margin-bottom: 50px; position: relative; height: 1363.5px;">
                                @foreach ($categories  as $key => $category)
                                  @foreach ($category->food as $food)
                                    <!-- gallery-item-->
                                    <div class="gallery-item {{ $food->category_id  }}" style="position: absolute; left: 0px; top: 0px;display: {{ $key == '0' ? 'block' : '' }}">
                                        <div class="grid-item-holder hov_zoom">
                                            {{-- <a href="{{ asset('images') }}/{{$food->image }}" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                            <img src="{{ asset('images') }}/{{$food->image }}" alt=""> --}}
                                            <a href="{{ $food->image }}" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                            <img src="{{ $food->image }}" alt="">
                                        </div>
                                        <div class="grid-item-details">
                                            <h3>{{$food->name }}</h3>
                                            <p>{{$food->description }}</p>
                                            <div class="grid-item_price">
                                                <span>TK {{$food->price }}</span>
                                                <div class="add_cart add_to_cart" data-id="{{ $food->id }}">Add To Cart</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- gallery-item end-->
                                 @endforeach
                                @endforeach
                                <!-- gallery-item end-->
                            </div>
                            <!-- gallery end -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="section-bg">
                            <div class="bg" data-bg="images/bg/dec/section-bg.png" style="background-image: url(&quot;images/bg/dec/section-bg.png&quot;);"></div>
                        </div>
                    </section>
                    <!-- section   -->

                </div>

@endsection
