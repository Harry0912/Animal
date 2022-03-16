@extends('layouts.main')
@section('product_add')
<div class="container"><div class="row"><a href="/product_list" class="col-1 btn btn-success">回上一頁</a></div></div><br>
<form>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">分類</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
        <select id="product_type" class="form-select" value="{{ $product->type_id ?? '' }}">
            <option {{ $product->type_id ?? 'selected' }} disabled>請選擇分類</option>
            @foreach ($types as $key => $value)
                <option {{ (isset($product) && $value->type_id == $product->type_id) ? 'selected' : '' }} value="{{ $value->type_id }}">{{ $value->type_name }}</option>
            @endforeach
        </select>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">標題</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" id="product_title" value="{{ $product->product_title ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">簡述</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" id="product_intro" value="{{ $product->product_intro ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">成分</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" id="product_ingredients" value="{{ $product->product_ingredients ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">重量</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" id="product_weight" value="{{ $product->product_weight ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">說明</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" id="product_content" value="{{ $product->product_content ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">圖片</div>
        <input class="col-md-4 col-sm-9 col-xs-9" type="file" id="product_image">
    </div><br>
    <div>
        <img id="img" src="{{ asset('images/default.png') }}" class="rounded" alt="..." width="400" height="400">
    </div><br>
    <input type="hidden" id="product_id" value="{{ $product->product_id ?? '' }}">
    <div class="row">
        <div class="col-2"><button id="{{ $buttonId }}" class="btn btn-primary">{{ $buttonName }}</button></div>
    </div>
</div>
</form>
@endsection