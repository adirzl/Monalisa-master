@extends('layouts.templates.default')
@section('title', ucwords('projects'))
@section('subtitle', 'Show')

@section('subcontent')
<div class="modal-footer">
    <a href="{{url('/projects/'.$data->id.'/cetak_pdf')}}" target="blank"><button type="submit" class="waves-effect waves-light  btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Export PDF</button></a>
</div>
<br>
<div class="row">
    <div class="input-field col s12">
        {{ Form::text('id_baseline_search', $data->baseline_id, [ 'id' => 'id_baseline_search', 'disabled' ]) }}
        {{ Form::label('id_baseline_search', ucwords('ID Baseline')) }}
    </div>
</div>
<div class="row" id="plh-baseline-result">
</div>
<div class="row" id="plh-form-project">
    <div class="input-field col s12 l6">
        {{ Form::text('tgl_pelaporan', $data->tgl_pelaporan, [ 'id' => 'tgl_pelaporan', 'class' => 'datepicker', 'disabled' ]) }}
        {{ Form::label('tgl_pelaporan', ucwords('1. tgl_pelaporan')) }}
    </div>
    <div class="input-field col s12 l6">
        {{ Form::text('minggu_ke', $data->minggu_ke, [ 'id' => 'minggu_ke', 'class' => '', 'disabled' ]) }}
        {{ Form::label('minggu_ke', ucwords('2. minggu_ke')) }}
    </div>
    <div class="col s12 new-section cyan white-text">
        <p>3. Identifikasi Tangki Septik</p>
    </div>
    <div class="input-field col s12">
        {{ Form::select('tipe_konstruksi',$tipe_konstruksi, $data->tipe_konstruksi, [ 'id' => 'tipe_konstruksi', 'class' => '', 'disabled' ]) }}
        {{ Form::label('tipe_konstruksi', ucwords('3.1. Jenis Konstruksi Tangki Septik')) }}
    </div>
    <div class="input-field col s12">
        {{ Form::select('tipe_tangki', $tipe_tangki, $data->tipe_tangki, [ 'id' => 'tipe_tangki', 'class' => '', 'id' => 'tipe_tangki', 'disabled' ]) }}
        {{ Form::label('tipe_tangki', ucwords('3.2. Jenis Tangki Septik ')) }}
    </div>
    <div class="col s12">
        <p>3.2.1 Dimensi</p>
    </div>
    <div class="input-field col s6 l3">
        {{ Form::text('panjang', $data->panjang, [ 'id' => 'panjang', 'class' => '', 'id' => 'panjang', 'disabled' ]) }}
        {{ Form::label('panjang', ucwords('panjang (m)')) }}
    </div>
    <div class="input-field col s6 l3">
        {{ Form::text('lebar', $data->lebar, [ 'id' => 'lebar', 'class' => '', 'id' => 'lebar', 'disabled' ]) }}
        {{ Form::label('lebar', ucwords('lebar (m)')) }}
    </div>
    <div class="input-field col s6 l3">
        {{ Form::text('tinggi', $data->tinggi, [ 'id' => 'tinggi', 'class' => '', 'id' => 'tinggi', 'disabled' ]) }}
        {{ Form::label('tinggi', ucwords('tinggi (m)')) }}
    </div>
    <div class="input-field col s6 l3">
        {{ Form::text('diameter', $data->diameter, [ 'id' => 'diameter', 'class' => '', 'id' => 'diameter', 'disabled' ]) }}
        {{ Form::label('diameter', ucwords('diameter (m)')) }}
        <span class="helper-text">jika Biofilter atau buis beton (m)</span>
    </div>
    <div class="col s12 new-section cyan white-text">
        <p>4. Kamar Mandi dan WC</p>
    </div>
    <div class="input-field col s12 l4">
        {{ Form::text('km_sa', $data->km_sa, [ 'id' => 'km_sa', 'class' => '', 'disabled' ]) }}
        {{ Form::label('km_sa', ucwords('Sudah ada (unit)')) }}
    </div>
    <div class="input-field col s12 l4">
        {{ Form::text('km_ts', $data->km_ts, [ 'id' => 'km_ts', 'class' => '', 'disabled' ]) }}
        {{ Form::label('km_ts', ucwords('Termasuk dalam pembangunan TS (unit)')) }}
    </div>
    <div class="input-field col s12 l4">
        {{ Form::text('km_ta', $data->km_ta, [ 'id' => 'km_ta', 'class' => '', 'disabled' ]) }}
        {{ Form::label('km_ta', ucwords('Tidak ada (unit)')) }}
    </div>
    <div class="col s12 new-section cyan white-text">
        <p>5. Identitas Pelaksana Kegiatan</p>
    </div>
    <div class="input-field col s12">
        {{ Form::select('pelaksana_id', $pelaksana_id, $data->pelaksana_id, [ 'id' => 'pelaksana_id', 'class' => '', 'disabled' ]) }}
        {{ Form::label('pelaksana_id', ucwords('pelaksana')) }}
    </div>
    <div class="col s12" id="plh-pelaksana-result">
    </div>
    <div class="col s12 new-section cyan white-text">
        <p>6. Pengadaan Barang/material</p>
    </div>
    <div class="input-field col s12">
        {{ Form::select('pengadaan', $status_proses, $data->pengadaan, [ 'id' => 'pengadaan', 'class' => '', 'disabled' ]) }}
        {{ Form::label('pengadaan', ucwords('Pengadaan Barang/material')) }}
    </div>
    <div class="input-field col s12">
        {{ Form::text('note_pengadaan', $data->note_pengadaan, [ 'id' => 'note_pengadaan', 'class' => '', 'disabled' ]) }}
        {{ Form::label('note_pengadaan', ucwords('Keterangan/Kendala pengadaan Barang/material')) }}
    </div>

    <div class="col s12 new-section cyan white-text">
        <p>7. Pelaksanaan Kegiatan Pembangunan</p>
    </div>
    <div class="input-field col s12">
        {{ Form::select('pelaksanaan', $status_proses, $data->pelaksanaan, [ 'id' => 'pelaksanaan', 'class' => '', 'disabled' ]) }}
        {{ Form::label('pelaksanaan', ucwords('Pelaksanaan Kegiatan Pembangunan')) }}
    </div>
    <div class="input-field col s12">
        {{ Form::text('note_pelaksanaan', $data->note_pelaksanaan, [ 'id' => 'note_pelaksanaan', 'class' => '', 'disabled' ]) }}
        {{ Form::label('note_pelaksanaan', ucwords('Keterangan/Kendala Pelaksanaan Kegiatan Pembangunan')) }}
    </div>

    <div class="col s12 new-section cyan white-text">
        <p>8. Waktu Pelaksanaan</p>
    </div>
    <div class="input-field col s12 l6">
        {{ Form::text('tgl_realisasi_awal', $data->tgl_realisasi_awal, [ 'id' => 'tgl_realisasi_awal', 'class' => 'datepicker', 'disabled' ]) }}
        {{ Form::label('tgl_realisasi_awal', ucwords('tgl_realisasi_awal')) }}
    </div>
    <div class="input-field col s12 l6">
        {{ Form::text('tgl_realisasi_akhir', $data->tgl_realisasi_akhir, [ 'id' => 'tgl_realisasi_akhir', 'class' => 'datepicker', 'disabled' ]) }}
        {{ Form::label('tgl_realisasi_akhir', ucwords('tgl_realisasi_akhir')) }}
        <span class="helper-text">*) diisi setelah pekerjaan selesai</span>
    </div>

    <div class="col s12 new-section cyan white-text">
        <p>9. Progres Fisik (%) *</p>
    </div>
    <div class="input-field col s12">
        {{ Form::text('progres_fisik', $data->progres_fisik, [ 'id' => 'progres_fisik', 'class' => '', 'disabled' ]) }}
        {{ Form::label('progres_fisik', ucwords('progres_fisik')) }}
        <span class="helper-text">*) prosentase terhadap nilai kontrak</span>
    </div>
    <div class="input-field col s12 l12">
        {{ Form::text('jml_ts', $data->jml_ts, [ 'id' => 'jml_ts', 'class' => '', 'disabled' ]) }}
        {{ Form::label('jml_ts', ucwords('Jumlah TS Mulai terbangun dalam minggu ini (unit)')) }}
        <a href="{{ url("storage/$data->directory_file/img/$data->jml_ts_img") }}" target="_blank" />{{ $data->jml_ts_img }}</a>
    </div>
    {{-- <div class="input-field col s12 l6" style="margin-bottom: 5px"> --}}
        {{-- <a href="{{ url("storage/$data->directory_file/$data->jml_ts_img") }}" target="_blank" />{{ $data->jml_ts_img }}</a> --}}
    {{-- </div> --}}
    <div class="input-field col s12 l12">
        {{ Form::text('jml_ts_50', $data->jml_ts_50, [ 'id' => 'jml_ts_50', 'class' => '', 'disabled' ]) }}
        {{ Form::label('jml_ts_50', ucwords('Jumlah TS dengan  progres fisik +/- 50% dalam minggu ini (unit)')) }}
        <a href="{{ url("storage/$data->directory_file/img/$data->jml_ts_50_img") }}" target="_blank" />{{ $data->jml_ts_50_img }}</a>
    </div>
    {{-- <div class="input-field col s12 l6">
        <a href="{{ url("storage/$data->directory_file/$data->jml_ts_50_img") }}" target="_blank" />{{ $data->jml_ts_50_img }}</a>
    </div> --}}
    <div class="input-field col s12 l12">
        {{ Form::text('jml_ts_akumulasi', $data->jml_ts_akumulasi, [ 'id' => 'jml_ts_akumulasi', 'class' => '', 'disabled' ]) }}
        {{ Form::label('jml_ts_akumulasi', ucwords('Akumulasi jumlah TS progres fisik +/- 100%  (unit)')) }}
        <a href="{{ url("storage/$data->directory_file/img/$data->jml_ts_akumulasi_img") }}" target="_blank" />{{ $data->jml_ts_akumulasi_img }}</a>
    </div>
    {{-- <div class="input-field col s12 l6">
        <a href="{{ url("storage/$data->directory_file/$data->jml_ts_akumulasi_img") }}" target="_blank" />{{ $data->jml_ts_akumulasi_img }}</a>
    </div> --}}
    {{-- <div class="input-field col s12 l6">
    </div> --}}
</div>
<div class="row">
    <div class="col s12 new-section cyan white-text">
        <p>Diperiksa/Disetujui,</p>
    </div>
    <div class="col s12">
        {{ Form::text('verified_1_title', $data->verified_1_title, [ 'id' => 'verified_1_title', 'class' => '', 'disabled' ]) }}
        {{ Form::label('verified_1_title', ucwords('Dinas : ')) }}
    </div>
    <div class="col s12">
        {{ Form::text('verified_1_by', $data->verified_1_by, [ 'id' => 'verified_1_by', 'class' => '', 'disabled' ]) }}
        {{ Form::label('verified_1_by', ucwords('Nama')) }}
    </div>


    <div class="col s12 new-section cyan white-text">
        <p>Diperiksa/Disetujui,</p>
    </div>
    <div class="col s12">
        {{ Form::text('verified_2_title', 'Konsultan Oversight (LE)', [ 'id' => 'verified_2_title', 'class' => '', 'disabled' ]) }}
        {{ Form::label('verified_2_title', ucwords('Dinas : ')) }}
    </div>
    <div class="col s12">
        {{ Form::text('verified_2_by', $data->verified_2_by, [ 'id' => 'verified_2_by', 'class' => '', 'disabled' ]) }}
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
    @include('...layouts.partials.admin.button_show', [ 'backLink' => 'projects.index'])
@endsection
