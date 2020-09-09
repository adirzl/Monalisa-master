{{ Form::model($data, ['route' => 'province.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            @foreach($fieldOnGrid as $item)
                <div class="input-field col s12">
                    {{ Form::text($item, null,['id' => 'filter_'.$item]) }}
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            @endforeach
        </div>
        @include('...layouts.partials.admin.button_search', [ 'backLink' => 'province.index'])
{{ Form::close() }}
