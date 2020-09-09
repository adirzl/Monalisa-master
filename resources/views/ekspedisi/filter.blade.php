{{ Form::model($data, ['route' => 'ekspedisi.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @php
                $tempFOG = $fieldOnGrid;
                unset($tempFOG[array_search('description', $tempFOG)]);
            @endphp
            @foreach($tempFOG as $item)
                <div class="input-field col s6">
                    @if($item == 'status')
                        {{ Form::select($item, to_dropdown(getOptionGroup('status'), 'key', 'value'), null,['id' => 'filter_'.$item]) }}
                    @else
                        {{ Form::text($item, null,['id' => 'filter_'.$item]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_search', [ 'backLink' => 'ekspedisi.index'])
{{ Form::close() }}
