<div id="modal_add_product_to_cart" class="modal">
    {{ Form::model($dataCart, ['route' => 'detailcart.store', 'method' => 'post', 'id' => 'form-cart', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="modal-content">
            {{ form::hidden('product_id', null, ['id' => 'product-id'])}}
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h4 class="mb-0" id="product-name"></h4>
                        <p class="teal-text lighten-2 mt-0" id="product-category"></p>
                        <h5 id="product-price"></h5>
                        <h5 id="product-stock"></h5>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="col s12 m9 l9">
                            {{ form::text('qty', null, ['id' => 'qty', 'placeholder' => 'Masukan jumlah produk yang akan dibeli'])}}
                            {{ Form::label('qty', ucwords('Qty')) }}
                        </div>
                        <div class="col s12 m3 l3">
                            <td><button id="btn-qty-inc" type="button" class="btn btn-small btn-small waves-effect waves-light mb-5"><i class="material-icons">expand_less</i></button></td>
                            <td><button id="btn-qty-dec" type="button" class="btn btn-small waves-effect waves-light mb-5"><i class="material-icons">expand_more</i></button></td>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-action modal-close waves-effect waves-red btn blue ">Tutup</button>
            <button type="button" class="modal-action modal-close waves-effect waves-green btn green" id="btn-save-to-cart">Simpan</button>
        </div>
    {{ Form::close() }}
</div>
