@php($createRoute = 'baseline.create')
@extends('layouts.templates.default')
@section('title', ucwords('baseline'))
@php($addTitle = (auth()->user()->roles->first()->id == env('SURVEYOR_ID') ? auth()->user()->area->name : ''))
@section('subtitle', 'List Baseline '. $addTitle . '( Total: '.$data->total().' baseline )')
@section('filter_panel')
    @include('baseline.filter')
@endsection

@section('subcontent')
    
    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
    <div class="card-alert card gradient-45deg-red-pink">
        <div class="card-content white-text">
          <p>
            <i class="material-icons">error</i> {{ $errors->first('file') }}</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    {{-- notifikasi sukses --}}
    @if ($sukses = Session::get('sukses'))
    <div class="card-alert card gradient-45deg-green-teal">
        <div class="card-content white-text">
          <p>
            <i class="material-icons">check</i> {{ $sukses }}</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    <!-- Import Excel -->
            <!--<br>-->
            @if((string)in_array(auth()->user()->roles->first()->id, [ env('SUPERADMIN_ID'), env('ADMIN_ID') ]))
            <div class="row">
                <div class="col s12">
                    <a class="waves-effect waves-light btn modal-trigger mb-2 mr-1 mb-5 mt-5 teal" href="#modal2">Upload Data</a>
                </div>
            </div>
            @endif
            
            <div id="modal2" class="modal">
                <div class="modal-content">
                    <h4>Upload Data Baseline</h4>
                    <a href="{{asset('templates_upload.xlsx')}}" class="waves-effect green lighten-2 waves-light btn-small right"><i class="material-icons right">file_download</i>Download Templates</a>
                    <form method="post" action="/baseline/import_excel" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-body">
        
                                {{ csrf_field() }}
        
                                <div class="col m6 s12 file-field input-field">
                                    <div class="btn float-right">
                                        <span>Pilih File</span>
                                        <input type="file" name="file" id="input-file-max-fs" class="dropify" required="required">
                                    </div>
                                    *format file .xlsx, .xls
                                </div>
                                <!-- <div class="file-field input-field col s12 l6">-->
                                <!--    <div class="btn">-->
                                <!--        <span>.xlsx, .xls</span>-->
                                <!--        {{ Form::file('jml_ts_akumulasi_img', null, [ 'id' => 'jml_ts_akumulasi_img', 'class' => '' ]) }}-->
                                <!--    </div>-->
                                <!--    <div class="file-path-wrapper">-->
                                <!--        <input class="file-path validate" type="text">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="waves-effect waves-light  btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Import</button>
                            <button class="modal-action modal-close btn-flat waves-effect purple white-text box-shadow-none border-round mb-1">Close</button>
                        </div>
                    </form>
                </div>
            </div>
            
    <table class="responsive-table">
        <thead>
        <tr>
            <th>{{ __('label.action') }}</th>
            @foreach($fieldOnGrid as $header)
                <th>{{ strtoupper($header) }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $d)
            <tr>
                <td>
                    {!! default_standard_controll('baseline',$d) !!}
                </td>
                @foreach($fieldOnGrid as $header)
                    <td>{{ $header == 'status' ? (isset($status[$d->$header]) ? $status[$d->$header] : 'N/A') : $d->$header }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
