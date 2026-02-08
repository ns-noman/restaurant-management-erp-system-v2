@extends('homepage.layouts.app')
@section('title','User Dashboard')
@section('content')
    <div class="content">
        <section class="parallax-section hero-section hidden-section" data-scrollax-parent="true">
            <div class="bg par-elem " data-bg="{{ asset('home') }}/images/bg/11.jpg" data-scrollax="properties: { translateY: '30%' }" style="background-image: url({{ asset('home') }}/images/bg/11.jpg); transform: translateZ(0px) translateY(0%);"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title">
                    <h2>User Dashboard</h2>

                </div>
            </div>
        </section>

          <!--  section  -->
                    <section class="hidden-section big-padding con-sec" data-scrollax-parent="true" id="sec3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-align_left">
                                        <h2>Order List</h2>
                                        <div class="dots-separator fl-wrap"><span></span></div>
                                    </div>

                                    <div class="contactform-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hovered table-bordered checkout-table">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Detail</th>
                                                        <th>Sub Total</th>
                                                        <th>VAT</th>
                                                        <th>Delivery Charge</th>
                                                        <th>Total</th>
                                                        <th>Payment Status</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <table class="table table-hovered table-bordered checkout-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>SL</th>
                                                                        <th>Food Name</th>
                                                                        <th>Price</th>
                                                                        <th>Qty</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($order->orderdetail as $orderdetail)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $orderdetail->food?$orderdetail->food->name:'' }}</td>
                                                                        <td>{{ $orderdetail->price  }}</td>
                                                                        <td>{{ $orderdetail->qty  }}</td>
                                                                        <td>{{ $orderdetail->total  }}</td>
                                                                     </tr>
                                                                @endforeach
                                                                </tbody>

                                                            </table>
                                                        </td>
                                                        <td>
                                                             {{ $order->subtotal }}
                                                        </td>
                                                        <td>
                                                            {{  $order->vat }}
                                                        </td>
                                                        <td>
                                                            {{ $order->shipping }}
                                                        </td>
                                                        <td>
                                                            {{ $order->total }}
                                                        </td>

                                                        <td>
                                                            @if($order->payment_status==1)
                                                             Due
                                                            @elseif($order->payment_status==2)
                                                             Paid

                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($order->status == 0)
                                                                <span class="btn btn-danger status-btn ">Cancel</span>
                                                            @elseif($order->status == 1)
                                                            <span class="btn btn-success status-btn">Confirmed</span>
                                                            @elseif($order->status == 2)
                                                            <span class="btn btn-warning status-btn">Pending</span>
                                                            @elseif($order->status == 3)
                                                            <span class="btn btn-info status-btn">Processing</span>
                                                            @elseif($order->status == 4)
                                                            <span class="btn btn-primary status-btn">Out Of Delivery</span>
                                                            @elseif($order->status == 5)
                                                            <span class="btn btn-warning status-btn">Delivered</span>
                                                            @elseif($order->status == 6)
                                                            <span class="btn btn-secondary status-btn">Returned</span>
                                                            @elseif($order->status == 7)
                                                            <span class="btn btn-dark status-btn">Failed</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
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
