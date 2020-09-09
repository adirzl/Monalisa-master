<h4 class="card-title">CART</h4>
{{ form::hidden('cart_count', count($cart), ['id' => 'cart_count']) }}
<div class="row right-align">
    <div class="col s12">
        <button class="btn cyan waves-effect waves-light" type="button" id="btn-add-product">
            <i class="material-icons left">add</i>Tambah
        </button>
    </div>
</div>
<table id="table-cart" class="responsive-table striped">
    <thead>
        <tr>
            <th style="width: 45%">Product</th>
            <th style="width: 5%">qty</th>
            <th style="width: 25%">price</th>
            <th style="width: 25%">subtotal</th>
        </tr>
    </thead>
    <tbody id="table-cart-tbody">
        @if(isset($cart))
            @php($total = 0)
            @foreach($cart as $item)
                <tr class="list-product-cart">
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp.{{ number_format($item->price) }}</td>
                    <td>Rp.{{ number_format($item->price * $item->qty) }}</td>
                </tr>
                @php($total = $total + ($item->price * $item->qty))
            @endforeach
        @endif
        <tr class="teal-text lighten-2">
            <td colspan="3">Total</td>
            <td id="cart-total">Rp.{{ number_format($total) }}</td>
        </tr>
        @php($disc = isset($discount) || $discount != null ? ($discount->percentage/100)*$total : 0)
        <tr class="teal-text lighten-2">
            <td colspan="2">Discount</td>
            <td id="cart-disc-percentage">{{ isset($discount) || $discount != null ? $discount->percentage : '0' }}%</td>
            <td id="cart-disc-amount" class="text-weigh">Rp.{{ number_format($disc) }}</td>
        </tr>
        @php($tax = (10/100)*($total-$disc))
        <tr class="teal-text lighten-2">
            <td colspan="3">Tax</td>
            <td id="cart-tax">Rp.{{ number_format($tax) }}</td>
        </tr>
        <tr class="teal-text lighten-2">
            <td colspan="3"><h5>Grand Total</h5></td>
            <td id="cart-grandtotal"><h5>Rp.{{ number_format($total-$disc+$tax) }}</h5></td>
        </tr>
    </tbody>
</table>
