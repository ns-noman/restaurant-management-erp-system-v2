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
                        <div style="display:flex; gap:20px; margin-bottom:20px; flex-wrap:wrap;">
                            {{-- Company Select --}}
                            <div style="flex:1; min-width:250px;">
                                <label style="display:block; font-weight:600; margin-bottom:8px; font-size:16px; color:#333;">
                                    Select Company *
                                </label>

                                <select name="company_code" id="company_code" 
                                        style="width:100%; padding:12px 14px; border:2px solid #d1d5db; border-radius:8px; 
                                            font-size:16px; color:#374151; background-color:#fff; transition:border-color 0.2s ease;
                                            cursor:pointer;" 
                                        required>
                                    <option value="">-- Select Company --</option>
                                    @foreach ($data['companies'] as $company)
                                        <option value="{{ $company->company_code }}"
                                            {{ $data['company_code'] == $company->company_code ? 'selected' : '' }}>
                                            {{ $company->com_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Table Select --}}
                            <div style="flex:1; min-width:250px;">
                                <label style="display:block; font-weight:600; margin-bottom:8px; font-size:16px; color:#333;">
                                    Select Table *
                                </label>
                                <select name="table_code" id="table_code" 
                                        style="width:100%; padding:12px 14px; border:2px solid #d1d5db; border-radius:8px; 
                                            font-size:16px; color:#374151; background-color:#fff; transition:border-color 0.2s ease;
                                            cursor:pointer;" 
                                        required>
                                    <option value="">-- Select Table --</option>
                                </select>
                            </div>
                        </div>

                        <h4 class="cart-title">Your cart <span>{{ Cart::count() }} items</span></h4>
                            <table class="table table-border checkout-table">
                                <tbody>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Count</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                    @foreach (Cart::content() as $cartproduct)
                                    <tr>
                                        <td>
                                            <a href="#"><img src="{{ $cartproduct->options['image']  }}" alt="" class="respimg"></a>
                                        </td>
                                        <td>
                                            <h5 class="product-name">{{ $cartproduct->name  }}</h5>
                                        </td>
                                        <td>
                                            <h5 class="order-money">{{ $cartproduct->price }} tk</h5>
                                        </td>
                                        <td>
                                            <input type="number" name="cartin1" value="{{ $cartproduct->qty }}" max="50" min="1" class="order-count">
                                        </td>
                                        <td class="quentity-product">
                                            <button class="incrementCart" data-id="{{$cartproduct->rowId}}"><i class="fa fa-plus"></i></button>
                                            <span  class=""> {{ $cartproduct->qty }} </span>
                                            <button class="decrementCart" data-id="{{$cartproduct->rowId}}"><i class="fa fa-minus"></i></button>
                                        </td>
                                        <td>
                                            <h5 class="order-money">{{ $cartproduct->total() }} tk </h5>
                                        </td>
                                        <td class="pr-remove">
                                            <a href="" title="Remove" class="removecart" data-id="{{ $cartproduct->rowId }}"><i class="fal fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- COUPON -->
                            <div class="coupon-holder hidden" >
                                <input type="text" name="cartcoupon" placeholder="Coupon code">
                                <button type="submit" class="btn-a">Apply</button>
                                <button type="submit" class="pull-right btn-uc">Update Cart</button>
                            </div>
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
