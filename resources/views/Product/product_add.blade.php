@extends('layouts.main')
@section('product_add')
<div class="container">
    <div class="row">
        <a href="/product_list" class="col-1 btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> 回上一頁</a>
    </div>
</div><br>
<form action="{{ $action }}" id="productForm" method="post" enctype="multipart/form-data">
@csrf
<div class="container">
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">分類</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
        <select id="product_type" name="type_id" class="form-select" value="{{ $product->type_id ?? '' }}">
            <option {{ $product->type_id ?? 'selected' }} disabled>請選擇分類</option>
            @foreach ($types as $key => $value)
                <option {{ (isset($product) && $value['type_id'] == $product->type_id) ? 'selected' : '' }} value="{{ $value['type_id'] }}">{{ $value['type_name'] }}</option>
            @endforeach
        </select>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">產品名稱</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_title" value="{{ $product->product_title ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">口味</div>
        <!-- <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" value="{{ $product->product_intro ?? '' }}">
        </div> -->

        <div class="col-md-4 col-sm-9 col-xs-9">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_intro" value="牛肉口味" {{ (isset($product) && ($product->product_intro == '牛肉口味')) ? 'checked' : '' }}>
                <label class="form-check-label" for="product_intro1">牛肉</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_intro" value="豬肉口味" {{ (isset($product) && ($product->product_intro == '豬肉口味')) ? 'checked' : '' }}>
                <label class="form-check-label" for="product_intro2">豬肉</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_intro" value="雞肉口味" {{ (isset($product) && ($product->product_intro == '雞肉口味')) ? 'checked' : '' }}>
                <label class="form-check-label" for="product_intro3">雞肉</label>
            </div>
        </div>

    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">成分</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_ingredients" value="{{ $product->product_ingredients ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">重量</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_weight" value="{{ $product->product_weight ?? '' }}">
        </div>
        <span class="col-md-4 col-sm-9 col-xs-9" style="color:red;">***重量單位為"克"</span>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">說明</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <!-- <input class="form-control" style="border-radius:5px;" type="text" name="product_content" value="{{ $product->product_content ?? '' }}"> -->
            <textarea class="form-control" name="product_content" style="border-radius:5px;" rows="6">{{ $product->product_content ?? '' }}</textarea>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">特價開關</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <div class="form-switch"><input class="form-check-input" type="checkbox" name="on_sale" @if(isset($product) && $product->on_sale=='Y') checked @endif></div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">價格</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="product_price" value="{{ $product->product_price ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">特價</div>
        <div class="col-md-4 col-sm-9 col-xs-9">
            <input class="form-control" style="border-radius:5px;" type="text" name="discount_price" value="{{ $product->discount_price ?? '' }}">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">圖片</div>
        <input class="col-md-4 col-sm-9 col-xs-9" type="file" name="product_image">
    </div><br>
    <div>
        <img id="img" src="{{ isset($product->product_image) ? '/storage/'.$product->product_image : asset('images/default.png') }}" class="rounded" alt="..." width="400" height="400">
    </div><br>
    <input type="hidden" id="product_id" name="product_id" value="{{ $product->product_id ?? '' }}">
    <div class="row">
        <div class="col-2">
            <button type="submit" id="{{ $buttonId }}" class="btn btn-primary">
                @if ($buttonName == '新增')
                    <i class="fa-solid fa-plus"></i>
                @else
                    <i class="fa-regular fa-floppy-disk"></i> 
                @endif
                {{ $buttonName }}
            </button>
        </div>
    </div>
</div>
</form>
@endsection