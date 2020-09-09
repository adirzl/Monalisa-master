$(document).ready(function(){
    $('.datepicker').datepicker({ format: 'yyyy/mm/dd' });

    let param = $('#id_baseline_search').val();
    getDetailBaseline(param);

    let paramPelaksana = $('#pelaksana_id').val();
    getDetailPelaksana(paramPelaksana);

    $('#panjang').attr('disabled', true);
    $('#lebar').attr('disabled', true);
    $('#tinggi').attr('disabled', true);
    $('#diameter').attr('disabled', true);
});

function getDetailBaseline(param){
    if(param){
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
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            swal({
                title: "Not Found!",
                text: 'Data Baseline tidak ditemukan!',
                icon: 'error'
            })
        });
    }
}

function getDetailPelaksana(param){
    if(param){
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
    }
}

