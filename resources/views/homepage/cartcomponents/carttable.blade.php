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
                    {{-- <a href="#"><img src="{{ asset('images') }}/{{ $cartproduct->options['image']  }}" alt="" class="respimg"></a> --}}
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
