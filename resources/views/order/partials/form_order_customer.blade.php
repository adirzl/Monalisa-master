<div id="modal-select-customer" class="modal">
    <div class="modal-content">
        <h4 class="modal-title">Cari Customer</h4>
        <div class="row">
            <div class="input-field col s12 l12">
                {{ Form::text('search_customer_id', null, ['id' => 'search_customer_id', 'placeholder' => 'Nama Customer']) }}
                {{ Form::label('search_customer_id', ucwords('Nama Customer')) }}
            </div>
        </div>
        <div class="row mt-5">
            <div class="col s12 l6">
                <button class="btn btn-small col s12 l6 mb-3 cyan waves-effect waves-light" type="button" id="btn-add-customer">
                    <i class="material-icons left">add</i>Tambah
                </button>
            </div>
            <div class="col s12 l6">
                <button type="button" class="right col s12 l6 mb-1 ml-1 btn btn-small waves-effect waves-green pink modal-close" id="btn-clear-cart"><i class="material-icons left">clear</i>Tutup</button>
                <button type="button" class="right col s12 l6 btn btn-small waves-effect waves-green light-green" id="btn-find-customer"><i class="material-icons right">search</i>Cari</button>
            </div>
        </div>
        <div class="row">
            <div class="col s12 l12">
                <table id="customer-table" class="responsive-table striped mt-5">
                    <thead>
                        <tr>
                            <th style="width: 5%"><i class="material-icons left">add_circle_outline</i></th>
                            <th style="width: 45%">Nama</th>
                            <th style="width: 30%">Alamat</th>
                            <th style="width: 25%">No tlp</th>
                        </tr>
                    </thead>
                    <tbody id="customer-list">
                        <tr>
                            <td colspan="4">No. Record(s) Found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
