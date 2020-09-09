@php
    $segment = request()->segment(2);
    $title = 'create'; $method = 'post'; $action = 'projects.store';
    if ($data->id) { $title = 'edit'; $method = 'put'; $action = ['projects.update', $data->{$data->getKeyName()}]; }
    // $dropdownObj = ['area_id', 'tipe_konstruksi'];
@endphp

@extends('layouts.templates.default')
@section('title', ucwords('Weekly Progres'))
@section('subtitle', 'Form')

@section('subcontent')
    <h5 class="center">LAPORAN MINGGUAN KEGIATAN PEMBANGUNAN TANGKI SEPTIK</h5>
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col m3"><a href="#test1">Profile Project</a></li>
                <li class="tab col m3"><a href="#test2">Progres</a></li>
                <li class="tab col m3"><a href="#test3">History</a></li>
            </ul>
        </div>
        <div id="test1" class="col s12">
            <div class="row">
                <div class="col s12">
                    {{ Form::model($data, ['route' => $action, 'method' => $method, 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
                    {{ Form::hidden('baseline_id', $baseline->id, [ 'id' => 'baseline_id' ]) }}
                        <div class="col s12 mt-3 mb-1 cyan white-text">
                            <p>Identifikasi Tangki Septik</p>
                        </div>
                        <div class="input-field col s6">
                            {{ Form::select('tipe_konstruksi',$tipe_konstruksi, $data->tipe_konstruksi, [ 'id' => 'tipe_konstruksi', 'class' => '' ]) }}
                            {{ Form::label('tipe_konstruksi', ucwords('Jenis Konstruksi Tangki Septik')) }}
                        </div>
                        <div class="input-field col s6">
                            {{ Form::select('tipe_tangki', $tipe_tangki, $data->tipe_tangki, [ 'id' => 'tipe_tangki', 'class' => '', 'id' => 'tipe_tangki' ]) }}
                            {{ Form::label('tipe_tangki', ucwords('Jenis Tangki Septik ')) }}
                        </div>                          

                        <div class="col s12 mt-3 mb-1 cyan white-text">
                            <p>Dimensi</p>
                        </div>
                        <div class="input-field col s6 l3">
                            {{ Form::text('panjang', $data->panjang, [ 'id' => 'panjang', 'class' => '', 'id' => 'panjang' ]) }}
                            {{ Form::label('panjang', ucwords('panjang (m)')) }}
                        </div>
                        <div class="input-field col s6 l3">
                            {{ Form::text('lebar', $data->lebar, [ 'id' => 'lebar', 'class' => '', 'id' => 'lebar' ]) }}
                            {{ Form::label('lebar', ucwords('lebar (m)')) }}
                        </div>
                        <div class="input-field col s6 l3">
                            {{ Form::text('tinggi', $data->tinggi, [ 'id' => 'tinggi', 'class' => '', 'id' => 'tinggi' ]) }}
                            {{ Form::label('tinggi', ucwords('tinggi (m)')) }}
                        </div>
                        <div class="input-field col s6 l3">
                            {{ Form::text('diameter', $data->diameter, [ 'id' => 'diameter', 'class' => '', 'id' => 'diameter' ]) }}
                            {{ Form::label('diameter', ucwords('diameter (m)')) }}
                            <span class="helper-text">jika Biofilter atau buis beton (m)</span>
                        </div>

                        <div class="col s12 mt-3 mb-1 cyan white-text">
                            <p>Kamar Mandi dan WC</p>
                        </div>
                        <div class="input-field col s12 l4">
                            {{ Form::text('km_sa', $data->km_sa, [ 'id' => 'km_sa', 'class' => '' ]) }}
                            {{ Form::label('km_sa', ucwords('Sudah ada')) }}
                        </div>
                        <div class="input-field col s12 l4">
                            {{ Form::text('km_ts', $data->km_ts, [ 'id' => 'km_ts', 'class' => '' ]) }}
                            {{ Form::label('km_ts', ucwords('Termasuk dalam pembangunan TS')) }}
                        </div>
                        <div class="input-field col s12 l4">
                            {{ Form::text('km_ta', $data->km_ta, [ 'id' => 'km_ta', 'class' => '' ]) }}
                            {{ Form::label('km_ta', ucwords('Tidak ada')) }}
                        </div>

                        <div class="col s12 mt-3 mb-1 cyan white-text">
                            <p>Pengadaan Barang/material</p>
                        </div>
                        <div class="input-field col s12">
                            {{ Form::select('pengadaan', $status_proses, $data->pengadaan, [ 'id' => 'pengadaan', 'class' => '' ]) }}
                            {{ Form::label('pengadaan', ucwords('Pengadaan Barang/material')) }}
                        </div>
                        <div class="input-field col s12">
                            {{ Form::text('note_pengadaan', $data->note_pengadaan, [ 'id' => 'note_pengadaan', 'class' => '' ]) }}
                            {{ Form::label('note_pengadaan', ucwords('Keterangan/Kendala pengadaan Barang/material')) }}
                        </div>

                        <div class="col s12 mt-3 mb-1 cyan white-text">
                            <p>Waktu Pelaksanaan</p>
                        </div>
                        <div class="input-field col s12 l6">
                            {{ Form::text('tgl_realisasi_awal', $data->tgl_realisasi_awal, [ 'id' => 'tgl_realisasi_awal', 'class' => 'datepicker' ]) }}
                            {{ Form::label('tgl_realisasi_awal', ucwords('tgl_realisasi_awal')) }}
                        </div>
                        <div class="input-field col s12 l6">
                            {{ Form::text('tgl_realisasi_akhir', $data->tgl_realisasi_akhir, [ 'id' => 'tgl_realisasi_akhir', 'class' => 'datepicker', 'disabled' ]) }}
                            {{ Form::label('tgl_realisasi_akhir', ucwords('tgl_realisasi_akhir')) }}
                            <span class="helper-text">*) diisi setelah pekerjaan selesai</span>
                        </div>

                        {{-- <div class="row"> --}}
                            <div class="col s12 mt-3 mb-1 cyan white-text">
                                <p>Diperiksa/Disetujui,</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col s12 l6">
                                    <div class="col s12">
                                        {{ Form::text('verified_1_title', $data->verified_1_title, [ 'id' => 'verified_1_title', 'class' => '' ]) }}
                                        {{ Form::label('verified_1_title', ucwords('Dinas : ')) }}
                                    </div>
                                    <div class="col s12">
                                        {{ Form::text('verified_1_by', $data->verified_1_by, [ 'id' => 'verified_1_by', 'class' => '' ]) }}
                                        {{ Form::label('verified_1_by', ucwords('Nama')) }}
                                    </div>
                                </div>
                                <div class="col s12 l6">
                                    <div class="col s12">
                                        {{ Form::text('verified_2_title', 'Konsultan Oversight (LE)', [ 'id' => 'verified_2_title', 'class' => '', 'disabled' ]) }}
                                        {{ Form::label('verified_2_title', ucwords('-')) }}
                                    </div>
                                    <div class="col s12">
                                        {{ Form::text('verified_2_by', $data->verified_2_by, [ 'id' => 'verified_2_by', 'class' => '' ]) }}
                                        {{ Form::label('verified_2_by', ucwords('Nama')) }}
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}
            
                        
                        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'projects.index'])
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div id="test2" class="col s12">
            {{ Form::model($data, ['route' => 'projects.storeprogres', 'method' => 'POST', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('project_id', $data->id, [ 'id' => 'project_id' ]) }}
                <div class="row">
                    <div class="col s12">
                        <div class="input-field col s12 l6">
                            {{ Form::text('tgl_pelaporan', null, [ 'id' => 'tgl_pelaporan', 'class' => 'datepicker' ]) }}
                            {{ Form::label('tgl_pelaporan', ucwords('tgl_pelaporan')) }}
                        </div>
                        <div class="input-field col s12 l6">
                            {{ Form::text('minggu_ke', null, [ 'id' => 'minggu_ke', 'class' => '' ]) }}
                            {{ Form::label('minggu_ke', ucwords('minggu_ke')) }}
                        </div>
                        <div class="input-field col s12 l6">
                            {{ Form::select('progres_fisik', $progres_fisik, null, [ 'id' => 'progres_fisik', 'class' => '' ]) }}
                            {{ Form::label('progres_fisik', ucwords('progres_fisik')) }}
                            <span class="helper-text">*) prosentase terhadap nilai kontrak</span>
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
                        <div class="input-field col s12">
                            {{ Form::text('note_pelaksanaan', null, [ 'id' => 'note_pelaksanaan', 'class' => '' ]) }}
                            {{ Form::label('note_pelaksanaan', ucwords('Keterangan/Kendala Pelaksanaan Kegiatan Pembangunan')) }}
                        </div>
                        <div class="input-field col s12">
                            <p><label>{{ Form::checkbox('status', null) }}<span>Tandai progres ini telah selesai</span></label></p>
                        </div>
                    </div>
                </div>
                @include('...layouts.partials.admin.button_form', [ 'backLink' => 'projects.index'])
            {{ Form::close() }}
        </div>
        <div id="test3" class="col s12">
            <div class="row">
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <td>Tgl Pelaporan</td>
                                <td>Minggu ke-</td>
                                <td>Progres Fisik</td>
                                <td>Note Pelaksanaan</td>
                                <td>Status</td>
                                <td>Lampiran</td>
                                <td>BA</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data->progres))
                                @foreach($data->progres as $item)
                                <tr>
                                    <td>{{ $item->tgl_pelaporan }}</td>
                                    <td>{{ $item->minggu_ke }}</td>
                                    <td>{{ $item->progres_fisik }}</td>
                                    <td>{{ $item->note_pelaksanaan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->jml_ts_img }}</td>
                                    <td><a href="{{ route('projects.ba_pdf', [ 'id' => $item->project->baseline_id]) }}" >BA</a></td>
                                </tr>
                                @endforeach
                            @else 
                                <tr><td colspan="6">No. Record(s) Found</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
