{{ Form::model($data, ['route' => 'outlet.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @foreach($fieldOnGrid as $item)
                <div class="input-field col s4">
                    @if($item == 'status')
                        {{ Form::select($item, to_dropdown(${$item}), null, [ 'id' => 'filter_'.$item]) }}
                    @else
                        {{ Form::text($item, null,['id' => 'filter_'.$item]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_search', [ 'backLink' => 'outlet.index'])
{{ Form::close() }}
