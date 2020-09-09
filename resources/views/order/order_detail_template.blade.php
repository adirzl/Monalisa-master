<div id="master-story-detail">
    <div class="input-field col s12 child">
        <div class="row">
            <div class="col s12 m6 l2 child-status">
                {{ Form::select('child[0][status]', [], null, ['class' => 'ajaxObj browser-default']) }}
            </div>
            <div class="col s12 m6 l3 child-task">
                {{ Form::text('child[0][task]',null, ['placeholder' => 'Task', 'class' => 'materialize-textarea ajaxObj']) }}
            </div>
            <div class="col s12 m12 l1 child-action center-align">
            </div>
        </div>
    </div>
</div>
