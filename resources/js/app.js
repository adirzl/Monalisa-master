$(function () {
    'use strict';
    window.addEventListener('load', function () {
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        // Accept only alphabet character.
        $(document).on('keyup', '.alpha', function () { this.value = this.value.replace(/[^a-zA-Z]/g, ''); });
        // Accept only alphabet & number.
        $(document).on('keyup', '.alphanum', function () { this.value = this.value.replace(/[^a-zA-Z0-9]/g, ''); });
        // Accept only alphabet & number and allow white space.
        $(document).on('keyup', '.alphanumspace', function () { this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, ''); });
        // Accept only alphabet & number and allow white space.
        $(document).on('keyup', '.alphanumdash', function () { this.value = this.value.replace(/[^a-zA-Z0-9\-\_]/g, ''); });
        // Accept only alphabet & number.
        $(document).on('keyup', '.alphadash', function () { this.value = this.value.replace(/[^a-zA-Z\-\_]/g, ''); });
        // Accept only alphabet, number, dash and "/".
        $(document).on('keyup', '.memo', function () { this.value = this.value.replace(/[^a-zA-Z0-9\/\-]/g, ''); });
        // Replace space with underscore.
        $(document).on('keyup', '.underscore', function () { this.value = this.value.replace(/\s/g, '_'); });
        // Replace space with dash.
        $(document).on('keyup', '.dashed', function () { this.value = this.value.replace(/\s/g, '-'); });
        // Accept only number.
        $(document).on('keyup', '.number', function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
        // Turn first character into uppercase on keyup.
        $(document).on('keyup', '.ucfirst', function () { this.value = ucfirst(this.value); });
        // Turn all character into uppercase on keyup.
        $(document).on('keyup', '.ucase', function () { this.value = this.value.toUpperCase(); });
        // Turn all character into lowercase on keyup.
        $(document).on('keyup', '.lcase', function () { this.value = this.value.toLowerCase(); });
        // Format value into currency on keyup.
        $(document).on('keyup', '.currency', function () {
            var comma, dot, num, regex;
            this.value = this.value.replace(/[^0-9\.\,]/g, '');
            comma = this.value.replace(/,/g, '');
            comma += '';
            dot = comma.split('.'), num = dot[0], regex = /(\d+)(\d{3})/;
            while (regex.test(num)) { num = num.replace(regex, '$1,$2') }
            this.value = num;
        });

        $(document).on('click', 'a[rel="action"]', function () {
            // var title = $(this).prop('title') != '' ? $(this).prop('title') : $(this)[0].dataset.originalTitle,
            //     href = $(this).prop('href');
            // SwalOptions.text = title + '?';
            // swal(SwalOptions).then(result => { if (result.value) { window.location = href; } });
            return false;
        });

        $(document).on('click', 'a[rel="softdelete"]', function () {
            swal({
                title: "Are you sure want to soft delete?",
                text: "You will not be able to recover this imaginary file!",
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

        $(document).on('click', 'a[rel="changestatus"]', function () {
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

        $(".export-file").click(function() {
            let FormObj = this.form;
            let data = getFormData();
            let fullURL = $(this).attr('href');
            let type = getURLParameter(fullURL, 'type');
            $.extend(data, {'type' : type});
            let request = $.post(fullURL, data);

            // showLoading();
            let url = $(this).prop("href"),
                filter = $(".form-filter").serializeArray();console.log(url);
            $.ajax({
                url: url,
                data: data,
                method: "post",
                xhrFields: { responseType: "blob" },
                success: function(data, status, xhr) {
                    if (xhr.status == 200) {
                        let disposition = xhr.getResponseHeader(
                                "content-disposition"
                            ),
                            matches = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/.exec(
                                disposition
                            ),
                            filename =
                                matches != null && matches[1]
                                    ? matches[1]
                                    : "file.pdf",
                            link = document.createElement("a"),
                            objUrl = window.URL.createObjectURL(data);
                        link.href = objUrl;
                        link.download = filename;
                        document.body.append(link);
                        link.click();
                        link.remove();
                        window.URL.revokeObjectURL(link);
                        // $(".loading-page").fadeOut();
                    } else {console.log(xhr.statusText);
                        // Swal.fire("Error", xhr.statusText, "error").then(result => {
                        //     // $(".loading-page").fadeOut();
                        // });
                    }
                },
                error: function(xhr) {console.log(xhr.statusText);
                    // Swal("Error", xhr.statusText, "error").then(result => {
                    //     // $(".loading-page").fadeOut();
                    // });
                }
            });
            return false;
        });

        $(document).on('click', 'a[rel="export-report"]', function () {
            let FormObj = this.form;
            let data = getFormData();
            let fullURL = $(this).attr('href');
            let type = getURLParameter(fullURL, 'type');
            $.extend(data, {'type' : type});
            let request = $.post(fullURL, data);
            request.done(function (response) {
                let notification = '<div class="card-alert card purple lighten-5">'+
                    '<div class="card-content purple-text">'+
                        '<p>'+response['status']+'</p>'+
                        '<ul>'+response['message']+'</ul>'+
                    '</div>'+
                    '<button type="button" class="close purple-text" data-dismiss="card-alert" aria-label="Close">'+
                    '<span aria-hidden="true">×</span>'+
                    '</button>'+
                    '</div>';

                $('#form-report').before(notification);
            });
            request.fail(function (jqXHR, textStatus, errorThrown) {
                let message = '';
                for(let i in jqXHR['responseJSON']['errors']){
                    message = message + '<li>'+ jqXHR['responseJSON']['errors'][i] +'</li>';
                }

                let notification = '<div class="card-alert card purple lighten-5">'+
                    '<div class="card-content purple-text">'+
                        '<p>Following error(s) occured:</p>'+
                        '<ul>'+message+'</ul>'+
                    '</div>'+
                    '<button type="button" class="close purple-text" data-dismiss="card-alert" aria-label="Close">'+
                        '<span aria-hidden="true">×</span>'+
                    '</button>'+
                '</div>';

                $('#form-report').before(notification);

            });
            return false;
        });

        function getURLParameter(url, name) {
            return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
        }

        $(document).on('click', 'a[rel="delete"]', function () {
            //belum dilanjutkan
            // console.log($(this).attr('href'));
            let recordID = title = $(this).prop('title');
            swal({
                title: "Are you sure want to delete?",
                text: "You will not be able to recover this imaginary file!",
                icon: 'warning',
                buttons: {
                    cancel: true,
                    submit: 'Yes, Save It'
                }
            }).then(result => { if (result) {
                let request = $.get($(this).attr('href'), { 'id' : recordID });
                request.done(function (response) {
                    let notification = '<div class="card-alert card purple lighten-5">'+
                        '<div class="card-content purple-text">'+
                            '<p>'+response['status']+'</p>'+
                            '<ul>'+response['message']+'</ul>'+
                        '</div>'+
                        '<button type="button" class="close purple-text" data-dismiss="card-alert" aria-label="Close">'+
                        '<span aria-hidden="true">×</span>'+
                        '</button>'+
                        '</div>';

                    $(this.table).before(notification);
                });
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    let message = '';
                    for(let i in jqXHR['responseJSON']['errors']){
                        message = message + '<li>'+ jqXHR['responseJSON']['errors'][i] +'</li>';
                    }

                    let notification = '<div class="card-alert card purple lighten-5">'+
                        '<div class="card-content purple-text">'+
                            '<p>Following error(s) occured:</p>'+
                            '<ul>'+message+'</ul>'+
                        '</div>'+
                        '<button type="button" class="close purple-text" data-dismiss="card-alert" aria-label="Close">'+
                            '<span aria-hidden="true">×</span>'+
                        '</button>'+
                    '</div>';

                    $(this.table).before(notification);

                });
            }});
            return false;
        });

        $(document).on('click', 'button[rel="save"]', function (e) {
            e.preventDefault();
            // $(this).before('<input type="hidden" name="save" value="1">');
            let FormObj = this.form;console.log(FormObj);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: 'warning',
                buttons: {
                    cancel: true,
                    submit: 'Yes, Save It'
                }
            }).then(result => { if (result) {
                FormObj.submit();
                // window.location.href = "./";
                // return true;
            } });
            // .then(window.location.href = "./");
            return false;
        });

        $(document).on('click', '.save', function (e) {
            e.preventDefault();
            $(this).before('<input type="hidden" name="save" value="1">');
            let FormObj = this.form;
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: 'warning',
                buttons: {
                    cancel: true,
                    submit: 'Yes, Save It'
                }
            }).then(result => { if (result) {
                FormObj.submit();
                // window.location.href = "./";
            } });
            // .then(window.location.href = "./");
            return false;
        });

        $(document).on('click', '.saveAjax', function () {
            let FormObj = this.form;
            let data = getFormData();
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: 'warning',
                buttons: {
                    cancel: true,
                    submit: 'Yes, Save It'
                }
            }).then(result => { if (result) {
                let request = $.post($(FormObj).attr('action'), data);
                request.done(function (response) {
                    // window.location.href = "./";
                    let notification = '<div class="card-alert card purple lighten-5">'+
                        '<div class="card-content purple-text">'+
                            '<p>'+response['status']+'</p>'+
                            '<ul>'+response['message']+'</ul>'+
                        '</div>'+
                        '<button type="button" class="close purple-text" data-dismiss="card-alert" aria-label="Close">'+
                        '<span aria-hidden="true">×</span>'+
                        '</button>'+
                        '</div>';

                    $(FormObj).before(notification);
                    $(':input').val('');
                    $('.child').remove();
                    $('.first-add-button-holder').removeAttr('hidden');
                });
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    let message = '';
                    for(let i in jqXHR['responseJSON']['errors']){
                        message = message + '<li>'+ jqXHR['responseJSON']['errors'][i] +'</li>';
                    }

                    let notification = '<div class="card-alert card purple lighten-5">'+
                        '<div class="card-content purple-text">'+
                            '<p>Following error(s) occured:</p>'+
                            '<ul>'+message+'</ul>'+
                        '</div>'+
                        '<button type="button" class="close purple-text" data-dismiss="card-alert" aria-label="Close">'+
                            '<span aria-hidden="true">×</span>'+
                        '</button>'+
                    '</div>';

                    $(FormObj).before(notification);

                });
            } });

            return false;
        });

        function getFormData(){
            var unindexed_array = $('form .ajaxObj');
            var indexed_array = {};

            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }

        $(document).on('click', '.save-close', function () {
            FormObj = this.form, SwalOptions.text = 'Submit?';
            swal(SwalOptions).then(result => { if (result.value) { FormObj.submit(); } });
            return false;
        });

        $(document).on('submit', '.form-data', function () {
            FormObj = this, SwalOptions.text = 'Submit?';
            swal(SwalOptions).then(result => { if (result.value) { FormObj.submit(); } });
            return false;
        });

        $(document).on('click', '.reset', function () {
            FormObj = this.form, SwalOptions.text = 'Reset?';
            swal(SwalOptions).then(result => { if (result.value) { FormObj.reset(); } });
            return false;
        });

        $(document).on('submit', '.form-filter', function () { $(this).submit(); });

        $(document).on('change', '#perPage', function () {
            var i, filter, queryString = [], uri = window.location.href.replace(BaseURI+'/', '').split('?')[0];
            if (uri.indexOf('filter') > 0) {
                uri = uri.replace('/filter', '');
            }
            queryString.push('per_page='+$(this).val());
            if ($('.form-filter').length) {
                filter = $('.form-filter').serializeArray();
                for (i = 0; i < filter.length; i++) {
                    if (filter[i].value !== '' && filter[i].name !== '_token') queryString.push(filter[i].name+'='+filter[i].value);
                }
            }
            window.location = BaseURI+'/'+uri+'?'+queryString.join('&');
        });

        if ($('.form-modal').length) {
            $('.form-data').off('submit');
            $('.save').off('click');
            $('.save-close').off('click');
            $('.form-modal').each(function (i) {
                $('.save-modal').eq(i).off('click').on('click', function () {
                    var method = $('.form-modal').eq(i).attr('data-method');
                    var action = $('.form-modal').eq(i).attr('data-action');
                    $('.form-modal').eq(i).children().unwrap()
                        .wrapAll('<form name="form-modal" action="'+action+'" method="'+method+'" class="form-material form-modal" autocomplete="off"></form>');
                    FormObj = $('.form-modal').eq(i)[0], SwalOptions.text = 'Submit?';
                    swal(SwalOptions).then(result => { if (result.value) { FormObj.submit(); } });
                    return false;
                })
            });
        }
        // Permission
        if ($('.permissions').length) { restructure('permission'); }
        // Date/Month/DateRange/DateTimeRange Picker
        $('.dr-start').datepicker(DatePickerOptions).on('changeDate', function (e) {
            var year = parseInt($('.dr-start').val().substr(0, 4)),
                month = parseInt($('.dr-start').val().substr(5, 2)) - 1,
                day = parseInt($('.dr-start').val().substr(8, 2)), dt = new Date(year, month, day);
            $('.dr-end').datepicker('show').datepicker('setDate', dt).datepicker('setStartDate', dt);
        });
        $('.dr-end').datepicker(DatePickerOptions);
        $('.datepick').datepicker($.removeCollection(DatePickerOptions, 'startDate'));
        // $('.monthpick').datepicker($.replaceCollection(DatePickerOptions, 'format', 'M yyyy'));
        $('.yearpick').datepicker({autoclose: true, format: 'yyyy', viewMode: 'years', minViewMode: 'years'});
        $('.monthpick').datepicker({autoclose: true, format: 'MM', viewMode: 'months', minViewMode: 'months'});
        $('.drtimepick').daterangepicker(DateRangePickerOptions);
        $('.clockpick').clockpicker({autoclose: true, placement: 'bottom', default: 'now'});
        // Nestable
        $('.nestable').nestable({handleClass: 'nest-handle'});
        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd-mmm-yyyy"
        });

        $("#datepickerwithsecond").datepicker("option", "dateFormat", "yy-mm-dd ");
    });

    window.addEventListener('load', initPlugins);
});
