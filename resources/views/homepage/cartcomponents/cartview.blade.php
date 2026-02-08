
<div class="header-cart_title">Your Cart <span>{{ Cart::count()}} items</span></div>
    <div class="header-cart_wrap_container fl-wrap">
        <div class="box-widget-content">
            <div class="widget-posts fl-wrap">
                <ol>
                    @foreach (Cart::content() as $cartproduct)
                    <li class="clearfix">
                        <a href="#"  class="widget-posts-img"><img src="{{ $cartproduct->options['image'] }}" class="respimg" alt=""></a>
                        <div class="widget-posts-descr">
                            <a href="#" title="">{{$cartproduct->name }}</a>
                            <div class="widget-posts-descr_calc clearfix">1 <span>x</span> {{ $cartproduct->price }}</div>
                        </div>
                        <div class="clear-cart_button"><i class="fal fa-times"></i></div>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <div class="header-cart_wrap_total fl-wrap">
        <div class="header-cart_wrap_total_item">Subtotal : <span>{{ Cart::subtotal() }} TK</span></div>
    </div>
    <div class="header-cart_wrap_footer fl-wrap">
        <a href="{{ route('cart.page') }}"> View Cart</a>
        <a href="{{ route('cart.page') }}">  Checkout</a>
    </div>
