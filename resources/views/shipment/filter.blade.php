{{ Form::model($data, ['route' => 'shipment.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @php
                $tempFOG = $fieldOnGrid;
                unset($tempFOG[array_search('status', $tempFOG)]);
                $dropdownObj = ['order_id', 'ekspedisi_id'];
            @endphp
            @foreach($tempFOG as $item)
                <div class="input-field col s12 m6 l6">
                    @if(in_array($item, $dropdownObj))
                        {{ Form::select($item, ${$item}, null,['id' => 'filter_'.$item]) }}
                    @else
                        {{ Form::text($item, null,['id' => 'filter_'.$item, 'class' => ($item == 'shipment_date' ? 'datepicker' : '')]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_search', [ 'backLink' => 'shipment.index'])
{{ Form::close() }}
