@extends('layouts.main')
@section('product_type')
<div class="container"><div class="row"><a href="/product_list" class="col-1 btn btn-success">回上一頁</a></div></div><br>
<form action="/type_add/store" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-1 bg-info bgblue">分類</div>
            <div class="col-2"><input class="form-control" type="text" name="type_name" value=""></div>
            <input type="submit" class="col-1 btn btn-primary" id="type_add" value="新增">
        </div>
    </div>
</form><hr>
<div class="container">
    @if (count($type_name))
        <form action="/type_edit">
        @foreach ($type_name as $value)
            <div class="row">
                <div class="col-2"><input type="text" value="{{ $value->type_name }}"></div>
                <div class="col-1"><a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></div>
            </div><br>
        @endforeach
        <div class="row"><input type="submit" class="col-1 btn btn-primary" value="儲存"></div>
        </form>
    @else
        <div class="alert alert-primary" style="text-align:center;" role="alert">沒有任何分類</div>
    @endif
</div>
@endsection