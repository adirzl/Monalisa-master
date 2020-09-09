{{ Form::model($data, ['route' => 'le.filter', 'method' => 'post', 'class' => 'form', 'autocomplete' => 'off']) }}
<div class="row">
    <div class="form-group">
        {{ Form::label('username', ucwords('username')) }}
        {{ Form::text('username', null,['id' => 'filter_username', 'class' => 'form-control', 'placeholder' => 'Username']) }}
    </div>
    <div class="form-group" style="margin-left: 2%;">
        {{ Form::label('kabkot_id', ucwords('Kab/Kota')) }}
        {{ Form::select('kabkot_id', $area, null,['id' => 'filter_kabkot_id', 'class' => 'form-control']) }}
    </div>
    <div class="form-group" style="margin-left: 2%;">
        {{ Form::label('status', ucwords('status')) }}
        {{ Form::select('status', $status, null,['id' => 'filter_status', 'class' => 'form-control']) }}
    </div>
</div>
@include('...layouts.partials.admin.button_search', [ 'backLink' => 'le.index'])
{{ Form::close() }}