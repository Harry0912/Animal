@extends('layouts.main')
@section('product_type')
<div class="container"><div class="row"><a href="/product_list" class="col-1 btn btn-success">回上一頁</a></div></div><br>
<form action="/type_add/store" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-1 bg-info bgblue">分類</div>
            <div class="col-2"><input class="form-control" type="text" id="type_name" value=""></div>
            <button class="col-1 btn btn-primary" id="typeAdd">新增</button>
        </div>
    </div>
</form><hr>
<div class="container">
    @if (count($types))
        <form>
        @foreach ($types as $value)
            <div class="row">
                <div class="col-2"><input type="text" name="type_name" value="{{ $value->type_name }}"></div>
                <input type="hidden" name="type_id" value="{{ $value->type_id }}">
                <div class="col-1"><button name="typeDelete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></div>
            </div><br>
        @endforeach
        <div class="row"><button id="typeEdit" class="col-1 btn btn-primary">儲存</button></div>
        </form>
    @else
        <div class="alert alert-primary" style="text-align:center;" role="alert">沒有任何分類</div>
    @endif
</div>
@endsection