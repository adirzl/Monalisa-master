@extends('layouts.templates.default')
@section('title', ucwords('story'))
@section('subtitle', 'Show')

@section('subcontent')
    <div class="row">
        @foreach($fieldOnForm as $item)
            <div class="input-field col s6">
                @if($item == 'date_story')
                    {{ Form::text($item,date('d/M/Y',strtotime($data->$item)),['id' => $item, 'class' => 'datepicker ajaxObj', 'disabled' => true]) }}
                @elseif(in_array($item, ['check_in', 'check_out']))
                    {{ Form::text($item,$data->$item,['id' => $item, 'class' => 'timepicker ajaxObj', 'disabled' => true]) }}
                @elseif(in_array($item, ['location']))
                    {{ Form::select($item, ${$item}, $data->$item,['id' => $item, 'class' => 'ajaxObj', 'disabled' => true]) }}
                @else
                    {{ Form::text($item,$data->$item,['id' => $item, 'class' => 'ajaxObj', 'disabled' => true]) }}
                @endif

                {{ Form::label($item, ucwords($item)) }}
            </div>
        @endforeach
    </div>
    <div class="row card gradient-45deg-light-blue-teal">
        <div class="input-field col s12 show-on-medium-and-down center-align">
            <p>DETAIL TASK</p>
        </div>
        <div class="input-field col s12 hide-on-med-and-down">
            <div class="col s4">
                {{ strtoupper('task') }}
            </div>
            <div class="col s2">
                {{ strtoupper('status') }}
            </div>
            <div class="col s3">
                {{ strtoupper('description') }}
            </div>
            <div class="col s3">
                {{ strtoupper('description') }}
            </div>
        </div>
        <div id="story-detail-holder">
            @foreach($data->story_detail as $item)
                <div class="input-field col s12 child">
                    <div class="row">
                        <div class="col col s12 m6 l4 child-task">
                            {{ Form::textarea('child[0][task]',$item->task, ['placeholder' => 'Task', 'class' => 'materialize-textarea ajaxObj', 'disabled' => true]) }}
                        </div>
                        <div class="col col s12 m6 l2 child-status">
                            {{ Form::text('child[0][status]',$task_status[$item->status], ['class' => 'ajaxObj', 'disabled' => true]) }}
                        </div>
                        <div class="col col s12 m6 l3 child-description">
                            {{ Form::textarea('child[0][description]',$item->description, ['placeholder' => 'Description', 'class' => 'materialize-textarea ajaxObj', 'disabled' => true]) }}
                        </div>
                        <div class="col col s12 m6 l3 child-obstacle">
                            {{ Form::textarea('child[0][obstacle]',$item->obstacle, ['placeholder' => 'Obstacle', 'class' => 'materialize-textarea ajaxObj', 'disabled' => true]) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <a href="{{ route('story.index') }}" class="btn btn-danger">Back</a>
@endsection
