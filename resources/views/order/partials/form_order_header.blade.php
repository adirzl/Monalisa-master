<h4 class="card-title mb-5">Detail Order</h4>
<div class="row">
    <div class="input-field col s12 l12">
        {{ Form::select('ordertype', $ordertype, null, ['id' => 'ordertype']) }}
        {{ Form::label('ordertype', ucwords('Jenis Order')) }}
    </div>
    <div class="input-field col s12 l12">
        {{ Form::text('note', null, ['id' => 'note', 'placeholder' => 'No.meja/Nama Pemesan/catatan lain']) }}
        {{ Form::label('note', ucwords('Catatan')) }}
    </div>
    <div class="input-field col s12 l12 mb-0">
        {{ Form::text('order_customer_id',  null, ['id' => 'order_customer_id', 'disabled', 'placeholder' => 'Wajib diisi untuk type order delivery']) }}
        {{ Form::label('order_customer_id', ucwords('Customer')) }}
        {{ Form::hidden('customer_id', null, [ 'id' => 'customer_id' ]) }}
    </div>
    <div class="input-field col s12 m12 l12 mt-0 right-align">
        <button class="btn cyan waves-effect waves-light" type="button" id="btn-select-customer">
            <i class="material-icons left">account_circle</i>Cari
        </button>
    </div>
</div>
<div class="row mt-5">
    <div class="col s12 l12">
        <button type="button" class="col s12 mb-1 btn btn-small waves-effect waves-green pink" id="btn-clear-cart"><i class="material-icons left">clear</i>Reset</button>
        <button type="button" class="col s12 mb-1 btn btn-small waves-effect waves-green cyan" id="btn-save-order"><i class="material-icons right">save</i>Simpan</button>
        <a href="{{ route('order.index') }}" class="col s12 btn btn-small waves-effect waves-green light-green"><i class="material-icons left">arrow_back</i>Kembali</a>
        {{-- <button type="button" class="col s12 btn btn-small waves-effect waves-green light-green" id="btn-order-back"><i class="material-icons right">arrow_forward</i>Check Out</button> --}}
        {{-- <button type="button" class="col s12 btn btn-small waves-effect waves-green light-green" id="btn-commit-cart"><i class="material-icons right">arrow_forward</i>Check Out</button> --}}
    </div>
</div>
