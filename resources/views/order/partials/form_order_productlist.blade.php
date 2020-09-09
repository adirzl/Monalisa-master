<div id="modal-product-list" class="modal">
    <div class="modal-content">
    <div class="row">
        <div class="col s12 m12 l12">
            <h4 class="modal-title">PRODUCT LIST</h4>
            {{ form::text('filter_product', null, ['id' => 'filter_product', 'placeholder' => 'Search'])}}
            <table id="tbl-productlist" class="responsive-table">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Harga Online</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productList as $item)
                        <tr>
                            <td>{{ $item->detailcart->where('product_id', $item->id)->sum('qty') }}x</td>
                            <td>{{ $item->name }}<br />({{ $product_category[$item->category_id] }})</td>
                            <td>Rp.{{ number_format($item->price->first()->price) }}</td>
                            <td>Rp.{{ number_format($item->price->first()->vendor_price) }}</td>
                            <td>{{ ($item->is_unlimited == true ? '~' : $item->stock->sum('qty') - $item->detailcart->sum('qty').' '. getOptionGroup('product_unit')->where('key', $item->unit_id)->first()->value) }}</td>
                            <td style="width: 10%">
                                <button data-itemid="{{ $item->id }}" data-itemname="{{ $item->name }}" type="button" class="btn btn-small waves-effect waves-light cyan btn-add-to-cart mb-3"><i class="material-icons">exposure_plus_1</i></button>
                                <button data-itemid="{{ $item->id }}" data-itemname="{{ $item->name }}" type="button" class="btn btn-small waves-effect waves-light pink btn-rem-from-cart"><i class="material-icons">exposure_neg_1</i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col s12 l6 center mt-5">
            {{ $productList->links() }}
        </div>
        <div class="col s12 l6">
            <button type="button" class="right btn btn-small waves-effect waves-green pink modal-close"><i class="material-icons left">clear</i>Tutup</button>
        </div>
    </div>
    </div>
</div>

{{-- <div class="col s12 m12 l7">
    <div class="card card card-default scrollspy">
        <div class="card-content">

        </div>
    </div>
</div> --}}
