 <h3>Cart totals</h3>
<table class="total-table">
    <tbody>
        <tr>
            <th>Cart Subtotal:</th>
            <td>{{ Cart::subtotal() }} Tk</td>
        </tr>
        <tr>
            <th>VAT:</th>
            <td>{{ Cart::tax() }} Tk</td>
        </tr>
        <tr>
            <th>Delivery Charge:</th>
            <td>{{ 40 }} Tk</td>
        </tr>
        <tr>
            <th>Total:</th>
            <td> {{ Cart::total() + 40  }} Tk</td>
        </tr>
    </tbody>
</table>
<button type="submit" class="cart-totals_btn color-bg">Proceed to Checkout</button>
