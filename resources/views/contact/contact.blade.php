@extends('layouts.main')

@section('contact')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h3>{{ $info->title }}</h3><br>
            <div><i class="fa fa-phone" aria-hidden="true"></i> : {{ $info->tel }}</div><br>
            <div><i class="fa fa-fax" aria-hidden="true"></i> : {{ $info->fax }}</div><br>
            <div><i class="fa fa-envelope" aria-hidden="true"></i> : {{ $info->email }}</div><br>
            <div><i class="fa fa-map-marker" aria-hidden="true"></i> : {{ $info->address }}</div>
        </div>
        <div class="col-lg-8">
            <h3>留言給我們</h3><br>
            <form class="row g-3" id="contactForm" action="/contact/send" method="post">
                <div class="col-md-6">
                    <label for="name" class="form-label">填表人</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                    <label for="tel" class="form-label">電話</label>
                    <input type="text" class="form-control" name="tel">
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="col-12">
                    <label for="note" class="form-label">留言內容</label>
                    <textarea class="form-control" name="notes" rows="7" cols="30"></textarea>
                </div>
                <!-- <div class="col-12">
                    <div class="row">
                        <div class="col-1"><label>驗證碼</label></div>
                        <div class="col-2"><input type="text" class="form-control" name="captcha" maxlength="4"></div>
                        <div class="col-1"><img id="captcha_img" src="{{ captcha_src() }}"></div>
                    </div>
                </div> -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection