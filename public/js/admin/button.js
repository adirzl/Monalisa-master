$(document).on('click', 'a[rel="changestatus2"]', function () {
    swal({
        title: "Are you sure want to change status?",
        text: "anda dapat mengubahnya kembali kemudian",
        icon: 'warning',
        buttons: {
            cancel: true,
            submit: 'Yes, Save It'
        }
    }).then(result => { if (result) {
        window.location.href = this.getAttribute('href');
    }});
    return false;
});

$(document).ready(function(){
    $('.datepicker').datepicker({ format: 'yyyy/mm/dd' });
});