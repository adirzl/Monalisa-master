<div id="modal_payment" class="modal" style="overflow: auto">
    {{ Form::model($data, ['route' => $action, 'method' => $method, 'id' => 'form-order', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div id="order_payment_tab">
            <div class="modal-content">
                <h4>Payment</h4>
                <div class="row">
                    <div class="input-field col s12" id="plh-grandtotal" style="font-size: xx-large; text-align: right">
                    </div>

                    <div class="input-field col s12">
                        {{ Form::select('paymenttype', $paymenttype , null, ['id' => 'paymenttype']) }}
                        {{ Form::label('paymenttype', ucwords('paymenttype')) }}
                    </div>

                    <div class="input-field col s12">
                        {{ Form::text('amount_received', null, ['id' => 'amount_received', 'style' => 'font-size: large', 'placeholder' => 'Jml Uang dibayarkan']) }}
                        {{ Form::label('amount_received', ucwords('amount_received')) }}
                    </div>

                    <div class="input-field col s12 hide">
                        {{ Form::text('payment_number', null, ['id' => 'payment_number', 'placeholder' => 'No Transaksi/ No. Bukti Pembayaran']) }}
                        {{ Form::label('payment_number', ucwords('payment_number')) }}
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="input-field col s12 m8 l4 right">
                        <button type="button" class="right col s12 l12 mb-2 mr-1 modal-action modal-close waves-effect waves-red btn-small pink lighten-1 align-left"><i class="material-icons left">clear</i>Tutup</button>
                        <button type="button" class="right col s12 l12 mb-2 mr-1 modal-action modal-close waves-effect waves-green btn-small green" id="btn-payment"><i class="material-icons left">money</i>Bayar</button>
                        {{-- <button type="button" class="right col s12 l12 mb-2 mr-1 modal-action waves-effect waves-blue btn-small teal" id="btn-show_profile_order"><i class="material-icons left">payment</i>Kembali</button> --}}
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
