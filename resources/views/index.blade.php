@extends('layouts.main')

@section('title')
ＯＯＯ貓狗寵物水族館
@endsection

@section('main')
    <div class="container">
        <div class="row" id="infoList">
            <div class="col-md-4">
                <img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <h5><span id="info_title">{{ $info->title }}</span></h5><br>
                <p><i class="fa fa-phone" aria-hidden="true"></i> : <span id="info_tel">{{ $info->tel }}</span></p>
                <p><i class="fa fa-fax" aria-hidden="true"></i> : <span id="info_fax">{{ $info->fax }}</span></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> : <span id="info_email">{{ $info->email }}</span></p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <span id="info_address">{{ $info->address }}</span></p>
                <button class="btn btn-primary" id="btnEdit">編輯</button>
            </div>
        </div>

        <div class="row" id="infoEdit" style="display: none;">
            <div class="col-md-4">
                <img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <h5><input type="text" id="title" value="{{ $info->title }}"></h5><br>
                <p><i class="fa fa-phone" aria-hidden="true"></i> : <input type="text" id="tel" value="{{ $info->tel }}"></p>
                <p><i class="fa fa-fax" aria-hidden="true"></i> : <input type="text" id="fax" value="{{ $info->fax }}"></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> : <input type="text" id="email" value="{{ $info->email }}"></p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> : <input type="text" id="address" value="{{ $info->address }}"></p>
                <button class="btn btn-primary" id="btnUpdate">變更</button>
            </div>
        </div>
    </div>
@endsection