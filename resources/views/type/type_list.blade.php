@extends('layouts.main')
@section('type')
<div class="container">
    <div class="row">
        <a href="/product_list" class="col-md-1 col-12 btn btn-success"><i class="fas fa-arrow-left" aria-hidden="true"></i> 回上一頁</a>
    </div>
</div><br>
<form id="typeAddForm" action="/type_add/store">
    <div class="container">
        <div class="row">
            <div class="col-md-1 bg-info bgblue">分類<span> *</span></div>
            <div class="col-md-2"><input class="form-control" type="text" name="type_name" value=""></div>
            <button class="col-md-1 btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> 新增</button>
        </div>
    </div>
</form><hr>
<div class="container">
    @if (count($types))
        <form id="typeEditForm">
            @foreach ($types as $value)
                <div class="row">
                    <div class="col-md-2"><input type="text" name="type_name[]" value="{{ $value->type_name }}"></div>
                    <input type="hidden" name="type_id[]" value="{{ $value->type_id }}">
                    <div class="col-md-1"><button name="typeDelete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></div>
                </div><br>
            @endforeach
            <div class="row">
                <button type="submit" class="col-md-1 col-12 btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> 儲存</button>
            </div>
        </form>
    @else
        <div class="alert alert-primary" style="text-align:center;" role="alert">沒有任何分類</div>
    @endif
</div>
@endsection