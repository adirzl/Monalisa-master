@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'projects.store';
    // if ($segment !== 'create' && $segment !== 'fill' ) { $title = 'edit'; $method = 'put'; $action = ['projects.update', $data->{$data->getKeyName()}]; }
    // $dropdownObj = ['area_id', 'tipe_konstruksi'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('Weekly Progres'))
@section('subtitle', 'Form')

@section('subcontent')
    <h5>LAPORAN MINGGUAN KEGIATAN PEMBANGUNAN TANGKI SEPTIK</h5>
    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
        {{-- <div class="row">
            <div class="input-field col s12 l6">
                {{ Form::text('id_baseline_search', $data->baseline_id, [ 'id' => 'id_baseline_search', 'class' => 'autocomplete' ]) }}
                {{ Form::label('id_baseline_search', ucwords('ID Baseline')) }}
                
            </div>
            <div class="input-field col s12 l6">
                <button type="button" class="btn teal" id="btn-cari-baseline">Cari</button>
            </div>
        </div> --}}
        {{ Form::hidden('baseline_id', $baseline->id, [ 'id' => 'baseline_id' ]) }}
        <div class="row" id="plh-baseline-result">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                <div class="card-content white-text">
                    <span class="card-title">Detail Baseline</span>
                    <div class="col s12 l6">
                        ID Baseline :  {{ $baseline->id }}
                    </div>
                    <div class="col s12 l6">
                        Nama :  {{ $baseline->nama }}
                    </div>
                    <div class="col s12 l6">
                        Kecamatan :  {{ $baseline->kec }}
                    </div>
                    <div class="col s12 l6">
                        Kelurahan :  {{ $baseline->kel }}
                    </div>
                    <div class="col s12">
                        Alamat :  {{ $baseline->alamat }}
                    </div>
                </div>
                <div class="card-action mt-5">
                    <p class="white-text">* pastikan data baseline sudah sesuai</p>
                </div>
            </div>';
        </div>
        <div class="row" id="plh-form-project">
            <div class="input-field col s12 l6">
                {{ Form::text('tgl_pelaporan', null, [ 'id' => 'tgl_pelaporan', 'class' => 'datepicker' ]) }}
                {{ Form::label('tgl_pelaporan', ucwords('1. tgl_pelaporan')) }}
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('minggu_ke', null, [ 'id' => 'minggu_ke', 'class' => '' ]) }}
                {{ Form::label('minggu_ke', ucwords('2. minggu_ke')) }}
            </div>
            <div class="col s12 new-section cyan white-text">
                <p>3. Identifikasi Tangki Septik</p>
            </div>
            <div class="input-field col s12">
                {{ Form::select('tipe_konstruksi',$tipe_konstruksi, null, [ 'id' => 'tipe_konstruksi', 'class' => '' ]) }}
                {{ Form::label('tipe_konstruksi', ucwords('3.1. Jenis Konstruksi Tangki Septik')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::select('tipe_tangki', $tipe_tangki, null, [ 'id' => 'tipe_tangki', 'class' => '', 'id' => 'tipe_tangki' ]) }}
                {{ Form::label('tipe_tangki', ucwords('3.2. Jenis Tangki Septik ')) }}
            </div>
            <div class="col s12">
                <p>3.2.1 Dimensi</p>
            </div>
            <div class="input-field col s6 l3">
                {{ Form::text('panjang', null, [ 'id' => 'panjang', 'class' => '', 'id' => 'panjang' ]) }}
                {{ Form::label('panjang', ucwords('panjang (m)')) }}
            </div>
            <div class="input-field col s6 l3">
                {{ Form::text('lebar', null, [ 'id' => 'lebar', 'class' => '', 'id' => 'lebar' ]) }}
                {{ Form::label('lebar', ucwords('lebar (m)')) }}
            </div>
            <div class="input-field col s6 l3">
                {{ Form::text('tinggi', null, [ 'id' => 'tinggi', 'class' => '', 'id' => 'tinggi' ]) }}
                {{ Form::label('tinggi', ucwords('tinggi (m)')) }}
            </div>
            <div class="input-field col s6 l3">
                {{ Form::text('diameter', null, [ 'id' => 'diameter', 'class' => '', 'id' => 'diameter' ]) }}
                {{ Form::label('diameter', ucwords('diameter (m)')) }}
                <span class="helper-text">jika Biofilter atau buis beton (m)</span>
            </div>
            <div class="col s12 new-section cyan white-text">
                <p>4. Kamar Mandi dan WC</p>
            </div>
            <div class="input-field col s12 l4">
                {{ Form::text('km_sa', null, [ 'id' => 'km_sa', 'class' => '' ]) }}
                {{ Form::label('km_sa', ucwords('Sudah ada')) }}
            </div>
            <div class="input-field col s12 l4">
                {{ Form::text('km_ts', null, [ 'id' => 'km_ts', 'class' => '' ]) }}
                {{ Form::label('km_ts', ucwords('Termasuk dalam pembangunan TS')) }}
            </div>
            <div class="input-field col s12 l4">
                {{ Form::text('km_ta', null, [ 'id' => 'km_ta', 'class' => '' ]) }}
                {{ Form::label('km_ta', ucwords('Tidak ada')) }}
            </div>
            <div class="col s12 new-section cyan white-text">
                <p>5. Identitas Pelaksana Kegiatan</p>
            </div>
            <div class="input-field col s12">
                {{ Form::select('pelaksana_id', $pelaksana_id, null, [ 'id' => 'pelaksana_id', 'class' => '' ]) }}
                {{ Form::label('pelaksana_id', ucwords('pelaksana')) }}
            </div>
            <div class="col s12" id="plh-pelaksana-result">
            </div>
            <div class="col s12 new-section cyan white-text">
                <p>6. Pengadaan Barang/material</p>
            </div>
            <div class="input-field col s12">
                {{ Form::select('pengadaan', $status_proses, null, [ 'id' => 'pengadaan', 'class' => '' ]) }}
                {{ Form::label('pengadaan', ucwords('Pengadaan Barang/material')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('note_pengadaan', null, [ 'id' => 'note_pengadaan', 'class' => '' ]) }}
                {{ Form::label('note_pengadaan', ucwords('Keterangan/Kendala pengadaan Barang/material')) }}
            </div>

            <div class="col s12 new-section cyan white-text">
                <p>7. Pelaksanaan Kegiatan Pembangunan</p>
            </div>
            <div class="input-field col s12">
                {{ Form::select('pelaksanaan', $status_proses, null, [ 'id' => 'pelaksanaan', 'class' => '' ]) }}
                {{ Form::label('pelaksanaan', ucwords('Pelaksanaan Kegiatan Pembangunan')) }}
            </div>
            <div class="input-field col s12">
                {{ Form::text('note_pelaksanaan', null, [ 'id' => 'note_pelaksanaan', 'class' => '' ]) }}
                {{ Form::label('note_pelaksanaan', ucwords('Keterangan/Kendala Pelaksanaan Kegiatan Pembangunan')) }}
            </div>

            <div class="col s12 new-section cyan white-text">
                <p>8. Waktu Pelaksanaan</p>
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('tgl_realisasi_awal', null, [ 'id' => 'tgl_realisasi_awal', 'class' => 'datepicker' ]) }}
                {{ Form::label('tgl_realisasi_awal', ucwords('tgl_realisasi_awal')) }}
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('tgl_realisasi_akhir', null, [ 'id' => 'tgl_realisasi_akhir', 'class' => 'datepicker' ]) }}
                {{ Form::label('tgl_realisasi_akhir', ucwords('tgl_realisasi_akhir')) }}
                <span class="helper-text">*) diisi setelah pekerjaan selesai</span>
            </div>

            <div class="col s12 new-section cyan white-text">
                <p>9. Progres Fisik (%) *</p>
            </div>
            <div class="input-field col s12">
                {{ Form::text('progres_fisik', null, [ 'id' => 'progres_fisik', 'class' => '' ]) }}
                {{ Form::label('progres_fisik', ucwords('progres_fisik')) }}
                <span class="helper-text">*) prosentase terhadap nilai kontrak</span>
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('jml_ts', null, [ 'id' => 'jml_ts', 'class' => '' ]) }}
                {{ Form::label('jml_ts', ucwords('Jumlah TS Mulai terbangun dalam minggu ini (unit)')) }}
            </div>
            <div class="file-field input-field col s12 l6">
                <div class="btn">
                    <span>Photo</span>
                    {{ Form::file('jml_ts_img', null, [ 'id' => 'jml_ts_img', 'class' => '' ]) }}
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('jml_ts_50', null, [ 'id' => 'jml_ts_50', 'class' => '' ]) }}
                {{ Form::label('jml_ts_50', ucwords('Jumlah TS dengan  progres fisik +/- 50% dalam minggu ini (unit)')) }}
            </div>
            <div class="file-field input-field col s12 l6">
                <div class="btn">
                    <span>Photo</span>
                    {{ Form::file('jml_ts_50_img', null, [ 'id' => 'jml_ts_50_img', 'class' => '' ]) }}
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="input-field col s12 l6">
                {{ Form::text('jml_ts_akumulasi', null, [ 'id' => 'jml_ts_akumulasi', 'class' => '' ]) }}
                {{ Form::label('jml_ts_akumulasi', ucwords('Akumulasi jumlah TS progres fisik +/- 100%  (unit)')) }}
            </div>
            <div class="file-field input-field col s12 l6">
                <div class="btn">
                    <span>Photo</span>
                    {{ Form::file('jml_ts_akumulasi_img', null, [ 'id' => 'jml_ts_akumulasi_img', 'class' => '' ]) }}
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 new-section cyan white-text">
                <p>Diperiksa/Disetujui,</p>
            </div>
            <div class="col s12">
                {{ Form::text('verified_1_title', null, [ 'id' => 'verified_1_title', 'class' => '' ]) }}
                {{ Form::label('verified_1_title', ucwords('Dinas : ')) }}
            </div>
            <div class="col s12">
                {{ Form::text('verified_1_by', null, [ 'id' => 'verified_1_by', 'class' => '' ]) }}
                {{ Form::label('verified_1_by', ucwords('Nama')) }}
            </div>

            <div class="col s12 new-section cyan white-text">
                <p>Diperiksa/Disetujui,</p>
            </div>
            <div class="col s12">
                {{ Form::text('verified_2_title', 'Konsultan Oversight (LE)', [ 'id' => 'verified_2_title', 'class' => '', 'disabled' ]) }}
                {{ Form::label('verified_2_title', ucwords('-')) }}
            </div>
            <div class="col s12">
                {{ Form::text('verified_2_by', null, [ 'id' => 'verified_2_by', 'class' => '' ]) }}
                {{ Form::label('verified_2_by', ucwords('Nama')) }}
            </div>
        </div>
        <div class="row">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
                <div class="card-content white-text">
                    <span class="card-title">Note:</span>
                    <p>Keterangan : setiap unit TS harus dilengkapi dengan foto MC-0, dan foto progres mingguan. Penamaan foto dengan cara : "Idbaseline_prosentase progres". Setiap foto TS, disimpan pada satu Folder dengan nama "idbaseline"-nya.</p>
                </div>
                <div class="card-action">
                    <p>.</p>
                </div>
            </div>
        </div>

        {{-- @foreach($fieldOnForm as $item)
            <div class="row">
                <div class="input-field col s12">
                    @if(in_array($item, $dropdownObj))
                        {{ Form::select($item, ${$item}, $data->$item,['id' => $item]) }}
                    @else
                        @php($addClass = in_array($item, ['tgl_pelaporan']) ? 'datepicker' : '')
                        {{ Form::text($item,$data->$item,['id' => $item, 'class' => $addClass]) }}
                    @endif
                    {{ Form::label($item, ucwords($item)) }}
                </div>
            </div>
        @endforeach --}}
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'projects.index'])
    {{ Form::close() }}

    <div id="modal_loader" class="modal">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
@endsection
