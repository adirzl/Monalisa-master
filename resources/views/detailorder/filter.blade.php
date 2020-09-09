{{ Form::model($data, ['route' => 'detailorder.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @php
                $tempFOG = $fieldOnGrid;
                unset($tempFOG[array_search('description', $tempFOG)]);
            @endphp
            @foreach($tempFOG as $item)
                <div class="input-field col s4">
                    {{ Form::text($item, null,['id' => 'filter_'.$item]) }}
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
    <!--<button type="submit" class="btn btn-warning">Find</button>
    <a href="{{ route('detailorder.index') }}" class="btn btn-danger">Clear</a>-->
    @include('...layouts.partials.admin.button_search', [ 'backLink' => 'detailorder.index'])
{{ Form::close() }}
