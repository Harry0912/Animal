@extends('layouts.main')

@section('product_info')
<div class="container">
    <div class="row">
        @include('product/product_side')
        <div class="col-xl-8 col-lg-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-ms-6 col-xs-6">
                        <img src="{{ ($product->product_image) ? '/storage/'.$product->product_image : asset('images/default.png') }}" width="400" height="400">
                    </div>
                    <div class="col-md-6 col-ms-6 col-xs-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">名稱 : {{ $product->product_title }}</li>
                            <li class="list-group-item">分類 : {{ $product->type->type_name }}</li>
                            <li class="list-group-item">口味 : {{ $product->product_intro }}</li>
                            <li class="list-group-item">成分 : {{ $product->product_ingredients }}</li>
                            <li class="list-group-item">重量 : {{ $product->product_weight }}g</li>
                            <li class="list-group-item">說明 : {{ $product->product_content }}</li>
                        </ul><br>
                        <a href="/product_list" class="btn btn-success">返回</a>
                        <div align="right"><i class="fa fa-eye" aria-hidden="true"></i>{{ $product->hits }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection