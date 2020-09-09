$(document).ready(function(){
    $('.modal').modal({dismissible: false});

    $('.datepicker').datepicker({ format: 'yyyy/mm/dd' });

    let param = $('#id_baseline_search').val();
    getDetailBaseline(param);

    let paramPelaksana = $('#pelaksana_id').val();
    getDetailPelaksana(paramPelaksana);

    let tipe_tangki = $('#tipe_tangki').val();
    changeStatusIdentifikasiTS(tipe_tangki);


    fillAutocomplete();

});

function fillAutocomplete(){
    let request = $.get('/baseline/getBaselinePartial');
    request.done(function(response) {console.log(response['data']);
        $('#id_baseline_search').autocomplete({
            data: response['data'],
        });

    });
}

// $('#id_baseline_search').on('change', function(){
//     alert($(this).val());
// });


$('#pelaksana_id').on('change', function(){
    getDetailPelaksana($(this).find(':selected').val());
});

$('#tipe_tangki').on('change', function(){
    changeStatusIdentifikasiTS($(this).val());
});

$('#btn-cari-baseline').on('click', function(){
    let param = $('#id_baseline_search').val();
    getDetailBaseline(param.substring(0, param.indexOf("|")).trim());
});

function getDetailBaseline(param){console.log(param);
    if(param){
        $('#modal_loader').modal('open');
        let request = $.get('/baseline/'+param+'/getBaseline');
        request.done(function(response) {
            if(response['data']['id']){
                let card = '<div class="card gradient-45deg-light-blue-cyan gradient-shadow">' +
                                '<div class="card-content white-text">' +
                                    '<span class="card-title">Detail Baseline</span>' +
                                    '<div class="col s12 l6">' +
                                        'ID Baseline : ' + response['data']['id'] +
                                    '</div>' +
                                    '<div class="col s12 l6">' +
                                        'Nama : ' + response['data']['nama'] +
                                    '</div>' +
                                    '<div class="col s12 l6">' +
                                        'Kecamatan : ' + response['data']['kec'] +
                                    '</div>' +
                                    '<div class="col s12 l6">' +
                                        'Kelurahan : ' + response['data']['kel'] +
                                    '</div>' +
                                    '<div class="col s12">' +
                                        'Alamat : ' + response['data']['alamat'] +
                                    '</div>' +
                                '</div>' +
                                '<div class="card-action mt-5">' +
                                    '<p class="white-text">* pastikan data baseline sudah sesuai</p>' +
                                '</div>' +
                            '</div>';
                            $('#plh-baseline-result').html(card);

                $('#baseline_id').val(response['data']['id']);
            }else{
                swal({
                    title: "Not Found!",
                    text: 'Data Baseline tidak ditemukan atau diluar wilayah anda!',
                    icon: 'error'
                })
            }

        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            swal({
                title: "Not Found!",
                text: 'Data Baseline tidak ditemukan atau diluar wilayah anda!',
                icon: 'error'
            })
        });

        request.always(function(dataOrjqXHR, textStatus, jqXHRorErrorThrown){
            $('#modal_loader').modal('close');
        });
    }
}

function getDetailPelaksana(param){
    if(param){
        $('#modal_loader').modal('open');
        let request = $.get('/pelaksana/'+param+'/getPelaksana');
        request.done(function(response) {
            if(response['data']['id']){
                let card = '<div class="card gradient-45deg-light-blue-cyan gradient-shadow">' +
                                '<div class="card-content white-text">' +
                                    '<span class="card-title">Detail Pelaksana</span>' +
                                    '<div class="col s12">' +
                                        'Nama : ' + response['data']['name'] +
                                    '</div>' +
                                    '<div class="col s12 l6">' +
                                        'Phone : ' + response['data']['phone'] +
                                    '</div>' +
                                    '<div class="col s12 l6">' +
                                        'No. SPMK : ' + response['data']['spmk_no'] +
                                    '</div>' +
                                '</div>' +
                                '<div class="card-action mt-5">' +
                                    '<p class="white-text">* pastikan data pelaksana sudah sesuai</p>' +
                                '</div>' +
                            '</div>';
                            $('#plh-pelaksana-result').html(card);
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            swal({
                title: "Not Found!",
                text: 'Data Pelaksana tidak ditemukan!',
                icon: 'error'
            })
        });

        request.always(function(dataOrjqXHR, textStatus, jqXHRorErrorThrown){
            $('#modal_loader').modal('close');
        });
    }

}

function changeStatusIdentifikasiTS(state){
    if(!state){
        $('#panjang').attr('disabled', true);
        $('#lebar').attr('disabled', true);
        $('#tinggi').attr('disabled', true);
        $('#diameter').attr('disabled', true);
    }else{
        $('#panjang').removeAttr('disabled');
        $('#lebar').removeAttr('disabled');
        $('#tinggi').removeAttr('disabled');
        $('#diameter').removeAttr('disabled');
    }
}
