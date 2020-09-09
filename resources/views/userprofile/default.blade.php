@php($createRoute = 'userprofile.create')
@extends('layouts.templates.blank')
@section('title', ucwords('userprofile'))
@section('subtitle', 'Default')
@section('filter_panel')
    @include('userprofile.filter')
@endsection

@section('subcontent')
    <div class="row">
        <div class="col s12">
            <div id="icon-prefixes" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <ul class="tabs">
                                    <li class="tab col s4 p-0"><a class="active p-0" href="#view-icon-prefixes">View</a></li>
                                    <li class="tab col s4 p-0"><a class="p-0" href="#html-icon-prefixes">Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="view-icon-prefixes">
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">fingerprint</i>
                                        <input id="icon_prefix3" type="text" value="{{$data->username}}" class="validate" readonly="readonly">
                                        <label for="icon_prefix3">Username</label>
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">face</i>
                                        <input id="icon_prefix3" type="text" value="{{$data->name}}" class="validate" readonly="readonly">
                                        <label for="icon_prefix3">Nama</label>
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">email</i>
                                        <input id="icon_prefix3" value="{{$data->email}}" type="text" class="validate" readonly="readonly">
                                        <label for="icon_prefix3">email</label>
                                    </div>
                                    @if(in_array(auth()->user()->roles->first()->id, [ env('SURVEYOR_ID') ]))
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">map</i>
                                        <!--<input id="icon_email" value="{{$data->area->name}}" type="number" class="validate" readonly="readonly">-->
                                        {{ Form::text('icon_email', $data->area->name, [ 'class' =>  'validate', 'readonly' => 'readonly' ]) }}
                                        <label for="icon_email">Daerah</label>
                                    </div>
                                    @endif
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="icon_phone" value="{{$data->phone}}" type="text" class="validate" readonly="readonly">
                                        <label for="icon_phone">Nomor Hp</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="html-icon-prefixes">
                        {{ Form::model($data, ['route' => 'userprofile.changepassword', 'method' => 'post', 'class' => 'form-horizontal form-material form-data', 'autocomplete' => 'off']) }}
       <label for="icon_prefix3">New Password</label>
                    {{ Form::password('password', null, ['id' => 'password', 'class' => '', 'placeholder' => 'New Password']) }}
     
                
        @include('...layouts.partials.admin.button_form', [ 'backLink' => 'userprofile.index'])
    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
