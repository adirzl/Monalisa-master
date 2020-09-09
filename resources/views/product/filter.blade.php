{{ Form::model($data, ['route' => 'product.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @foreach($fieldOnGrid as $item)
                <div class="input-field col s4">
                    @if($item == 'category_id' || $item == 'unit_id')
                        {{ Form::select($item, to_dropdown(getOptionGroup('product_'.substr($item,0,strlen($item)-3)), 'key', 'value'), null,['id' => 'filter_'.$item]) }}
                    @else
                        {{ Form::text($item, null,['id' => 'filter_'.$item]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_search', [ 'backLink' => 'product.index'])
{{ Form::close() }}
