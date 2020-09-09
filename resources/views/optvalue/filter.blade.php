{{ Form::model($data, ['route' => 'optvalue.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @foreach($fieldOnGrid as $item)
                <div class="input-field col s4">
                    {{ Form::text($item, null,['id' => 'filter_'.$item]) }}
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
    <button type="submit" class="btn btn-warning">Find</button>
    <a href="{{ route('optvalue.index') }}" class="btn btn-danger">Clear</a>
{{ Form::close() }}
