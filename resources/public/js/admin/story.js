$(document).ready(function () {

    $('.timepicker').timepicker({
        showClearBtn: true,
        twelveHour: false,
        vibrate: true,
    });

    $('.timepicker').on('change', function(){console.log('te');
        let value = $(this).val();
        let d = new Date();
        let n = d.getSeconds();
        if(n < 10){
            n = '0'+String(n);
        }
        $(this).val(value ? value +':'+n: value);
    });

    let story_detail = $('#story-detail-holder .child')
    if(story_detail.length > 0){
        $('.first-add-button-holder').attr('hidden', true);
        appendAddButton();
    }
});

$('.btn-add-story-detail').on('click', function(){
   duplicateMasterStoryDetail();
   appendAddButton();
});

$('.first-add-button').on('click', function(){
    $('.first-add-button-holder').attr('hidden', true);
});

function appendAddButton(){
    $('#story-detail-holder .child-action').html(
        '<button type="button" class="waves-effect btn-flat btn-rem-story-detail"> <i class="material-icons">close</i></button>'
    );

    $('#story-detail-holder .child-action:last').append(
        '<button type="button" class="waves-effect btn-flat btn-add-story-detail"> <i class="material-icons">add</i></button>'
    );

    $('#story-detail-holder .child-action:last .btn-add-story-detail').on('click', function(){
        duplicateMasterStoryDetail();
        appendAddButton();
    });

    $('#story-detail-holder .child-action .btn-rem-story-detail').on('click', function(){
        $(this).parent().parent().parent().remove();

        let newID = $('#story-detail-holder .child').length;
        if(newID === 0){
            $('.first-add-button-holder').removeAttr('hidden');
        }else{
            if($('#story-detail-holder .child-action:last .btn-add-story-detail').length == 0){
                $('#story-detail-holder .child-action:last').html('');
                appendAddButton();
            }
        }
    });

    $('textarea').on('keypress', function(event){
        if (event.which == '13') {
            event.preventDefault();
        }
    });
}

function duplicateMasterStoryDetail(){
    $('#master-story-detail').children().clone().appendTo('#story-detail-holder');
    $('#story-detail-holder .child-action').html('');

    let newID = $('#story-detail-holder .child').length;
    $('#master-story-detail .child-task textarea').attr('name','child['+newID+'][task]');
    $('#master-story-detail .child-status select').attr('name','child['+newID+'][status]');
    $('#master-story-detail .child-description textarea').attr('name','child['+newID+'][description]');
    $('#master-story-detail .child-obstacle textarea').attr('name','child['+newID+'][obstacle]');
}


