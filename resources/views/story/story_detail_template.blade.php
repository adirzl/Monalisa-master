<div id="master-story-detail">
    <div class="input-field col s12 child">
        <div class="row">
            <div class="col s12 m6 l3 child-task">
                {{ Form::textarea('child[0][task]',null, ['placeholder' => 'Task', 'class' => 'materialize-textarea ajaxObj']) }}
            </div>
            <div class="col s12 m6 l2 child-status">
                {{ Form::select('child[0][status]', to_dropdown($task_status, 'key', 'value'), null, ['class' => 'ajaxObj browser-default']) }}
            </div>
            <div class="col s12 m6 l3 child-description">
                {{ Form::textarea('child[0][description]',null, ['placeholder' => 'Description', 'class' => 'materialize-textarea ajaxObj']) }}
            </div>
            <div class="col s12 m6 l3 child-obstacle">
                {{ Form::textarea('child[0][obstacle]',null, ['placeholder' => 'Obstacle', 'class' => 'materialize-textarea ajaxObj']) }}
            </div>
            <div class="col s12 m12 l1 child-action center-align">
            </div>
        </div>
    </div>
</div>
