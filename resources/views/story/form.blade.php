@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'story.store';
    if ($segment !== 'create' ) { $title = 'edit'; $method = 'PUT'; $action = ['story.update', $data->{$data->getKeyName()}]; }
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('story'))
@section('subtitle', 'Form')

@section('subcontent')
    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            {{ Form::hidden('_token', csrf_token() ,['id'=>'_token', 'class' => 'ajaxObj']) }}
            {{ Form::hidden('_method', $method ,['id'=>'_method', 'class' => 'ajaxObj']) }}
            @foreach($fieldOnForm as $item)
                <div class="input-field col s6">
                    @if($item == 'date_story')
                        {{ Form::text($item, $data->$item ? date('d/M/Y',strtotime($data->$item)) : date('d/M/Y',strtotime(\Carbon\Carbon::now())),['id' => $item, 'class' => 'datepicker ajaxObj','readonly' => true]) }}
                    @elseif(in_array($item, ['check_in', 'check_out']))
                        {{ Form::text($item, $data->$item ? date('H:i:s',strtotime($data->$item)) : $data->item,['id' => $item, 'class' => 'timepicker ajaxObj', 'readonly'=> true]) }}
                    @elseif(in_array($item, ['location']))
                        {{ Form::select($item, ${$item}, $data->$item,['id' => $item, 'class' => 'ajaxObj']) }}
                    @else
                        {{ Form::text($item,$data->$item,['id' => $item, 'class' => 'ajaxObj']) }}
                    @endif

                    {{ Form::label($item, ucwords($item)) }}
                </div>
                {{-- @if(in_array($item, ['check_in', 'check_out']))
                    <div class="input-field col s6">
                        {{ Form::text($item.'_second',  null,['id' => $item.'_second', 'class' => 'timepicker ajaxObj', 'type' => 'time', 'step' => '1']) }}
                        {{ Form::label($item.'_second', ucwords($item.'_second')) }}
                    </div>
                @endif --}}
            @endforeach
        </div>
        <div class="row card gradient-45deg-light-blue-teal">
            <div class="input-field col s12 show-on-medium-and-down center-align">
                <p>DETAIL TASK</p>
            </div>
            <div class="input-field col s12 hide-on-med-and-down">
                <div class="col s3">
                    {{ strtoupper('task') }}
                </div>
                <div class="col s2">
                    {{ strtoupper('status') }}
                </div>
                <div class="col s3">
                    {{ strtoupper('description') }}
                </div>
                <div class="col s3">
                    {{ strtoupper('obstacle') }}
                </div>
                <div class="col s1">
                    {{ strtoupper('action') }}
                </div>
            </div>
            <div id="story-detail-holder">
                <div class="row first-add-button-holder">
                    <div class="input-field col s12 center">
                        <button type="button" class="waves-effect btn gradient-45deg-light-blue-cyan btn-add-story-detail first-add-button"> <i class="material-icons">add</i></button>
                    </div>
                </div>
                @if ($segment !== 'create')
                    @php($x = 0)
                    @foreach($data->story_detail as $item)
                        <div class="input-field col s12 child">
                            <div class="row">
                                {{ Form::hidden('child['.$x.'][id]', $item->id ,['class' => 'ajaxObj']) }}
                                <div class="col col s12 m6 l3 child-task">
                                    {{ Form::textarea('child['.$x.'][task]',$item->task, ['placeholder' => 'Task', 'class' => 'materialize-textarea ajaxObj']) }}
                                </div>
                                <div class="col col s12 m6 l2 child-status">
                                    {{ Form::select('child['.$x.'][status]', to_dropdown($task_status, 'key', 'value'), $item->status, ['class' => 'ajaxObj browser-default']) }}
                                </div>
                                <div class="col col s12 m6 l3 child-description">
                                    {{ Form::textarea('child['.$x.'][description]',$item->description, ['placeholder' => 'Description', 'class' => 'materialize-textarea ajaxObj']) }}
                                </div>
                                <div class="col col s12 m6 l3 child-obstacle">
                                    {{ Form::textarea('child['.$x.'][obstacle]',$item->obstacle, ['placeholder' => 'Obstacle', 'class' => 'materialize-textarea ajaxObj']) }}
                                </div>
                                <div class="col s12 m12 l1 child-action center-align">
                                </div>
                            </div>
                        </div>
                        @php($x++)
                    @endforeach
                @endif
            </div>
        </div>
        <button type="button" class="btn btn-warning saveAjax">Save</button>
        <a href="{{ route('story.index') }}" class="btn btn-danger">Back</a>
    {{ Form::close() }}
    <div hidden>
        @include('story.story_detail_template')
    </div>
@endsection
