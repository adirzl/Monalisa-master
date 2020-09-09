{{ Form::model($data, ['route' => 'order.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @php
                $tempFOG = $fieldOnGrid;
                unset($tempFOG[array_search('status', $tempFOG)]);
                $dropdownObj = ['ordertype', 'paymenttype','user_id'];
            @endphp
            @foreach($tempFOG as $item)
                <div class="input-field col s12 m3 l3">
                    @if(in_array($item, $dropdownObj))
                        {{ Form::select($item, to_dropdown(${$item}, 'key', 'value'), null,['id' => 'filter_'.$item]) }}
                    @else
                        {{ Form::text($item, null,['id' => 'filter_'.$item, 'class' => ($item == 'created_at' ? 'datepicker' : '') ]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_search', [ 'backLink' => 'order.index'])
{{ Form::close() }}
