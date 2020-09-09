{{ Form::model($data, ['route' => 'userpemda.filter', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="input-field col s4">
                {{ Form::text('username', null,['id' => 'filter_username']) }}
                {{ Form::label('username', ucwords('username')) }}
            </div>
            <div class="input-field col s4">
                {{ Form::select('kabkot_id', $area, null,['id' => 'filter_kabkot_id']) }}
                {{ Form::label('kabkot_id', ucwords('Kab/Kota')) }}
            </div>
            <div class="input-field col s4">
                {{ Form::select('status', $status, null,['id' => 'filter_status']) }}
                {{ Form::label('status', ucwords('status')) }}
            </div>
        </div>
    @include('...layouts.partials.admin.button_search', [ 'backLink' => 'userpemda.index'])
{{ Form::close() }}
