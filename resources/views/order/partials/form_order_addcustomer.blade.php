{{ Form::model(new App\Models\Customer(), ['route' => 'customer.store', 'method' => 'post', 'id' => 'form-add-customer', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
<div id="modal-add-customer" class="modal">
    <div class="modal-content">
            <h4 class="modal-title">Tambah Customer</h4>
            @php
                $dropdownObj = ['province_id'];
                $customer = new App\Models\Customer();
                $fieldOnForm = $customer->getFieldOnForm();
            @endphp
            <div class="row">
                @foreach($fieldOnForm as $item)
                    <div class="input-field col s12 l6">
                        @if(in_array($item, $dropdownObj))
                            {{ Form::select($item, ${$item}, $data->$item,['id' => $item]) }}
                        @else
                            {{ Form::text($item,$data->$item,['id' => $item]) }}
                        @endif
                        {{ Form::label($item, ucwords($item)) }}
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col s12 l6">
                </div>
                <div class="col s12 l6">
                    <button type="button" class="right col s12 l6 mb-1 ml-1 btn btn-small waves-effect waves-green pink modal-close"><i class="material-icons left">clear</i>Tutup</button>
                    <button type="button" class="right col s12 l6 btn btn-small waves-effect waves-green light-green" id="btn-save-customer"><i class="material-icons right">save</i>Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{ Form::close() }}
