@extends('layouts.main')
@section('product_add')
<div class="container"><div class="row"><a href="/product_list" class="col-1 btn btn-success">回上一頁</a></div></div><br>
{{ Form::open(array('url'=>'/product_add/store', 'method'=>'post', 'enctype'=>'multipart/form-data')) }}
<div class="container">
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">標題</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_title" value="">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">簡述</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_intro" value="">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">成分</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_ingredients" value="">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">重量</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_weight" value="">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">說明</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_content" value="">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">圖片</div>
        <input class="col-md-4 col-sm-9 col-xs-9" type="file" name="product_image">
    </div><br>
    <div>
        <img id="img" src="{{ asset('images/default.png') }}" class="rounded" alt="..." width="400" height="400">
    </div>
    <div class="row">
        <div class="col-2"><input name="save" class="btn btn-primary" type="submit" value="儲存"></div>
    </div>
</div>
{{ Form::close() }}
@endsection