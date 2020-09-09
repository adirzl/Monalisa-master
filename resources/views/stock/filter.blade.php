{{ Form::model($data, ['route' => 'stock.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
    <div class="row">
        @php
            $tempFOG = $fieldOnGrid;
            unset($tempFOG[array_search('purchase_price', $tempFOG)]);
            unset($tempFOG[array_search('qty', $tempFOG)]);
            unset($tempFOG[array_search('created_at', $tempFOG)]);
        @endphp
        @foreach($tempFOG as $item)
            <div class="input-field col s12 m6 l6">
                {{ Form::select($item, ${$item}, null,['id' => 'filter_'.$item]) }}
                {{ Form::label($item, ucwords($item)) }}
            </div>
        @endforeach
    </div>
    @include('...layouts.partials.admin.button_search', [ 'backLink' => 'stock.index'])
{{ Form::close() }}
