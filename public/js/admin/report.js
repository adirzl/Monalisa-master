$(document).ready(function(){
    $('#plh_story_date').attr('hidden', true);
    $('#plh_user_id').attr('hidden', true);
});

$('#report_type').on('change', function(){
    let type = $(this).val();

    if(type === '1'){
        $('#plh_story_date').attr('hidden', true);
        $('#plh_user_id').removeAttr('hidden');
    }else{
        $('#plh_user_id').attr('hidden', true);
        $('#plh_story_date').removeAttr('hidden');
    }
})
