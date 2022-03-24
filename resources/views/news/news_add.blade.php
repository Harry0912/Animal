@extends('layouts.main')
@section('news_add')
    <div class="container">
        <div class="row">
            <a href="/news_list" class="col-1 btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> 回上一頁</a>
        </div>
    </div><br>
    <form>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">標題</div>
            <div class="col-md-4 col-sm-9 col-xs-9">
                <input class="form-control" style="border-redius:5px;" type="text" id="news_title" value="{{ $news_title ?? '' }}">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">發布日期</div>
            <div class="col-md-4 col-sm-9 col-xs-9">
                <input class="form-control" style="border-redius:5px;" type="date" id="news_time" value="{{ $news_time ?? '' }}">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-3 bg-info bgblue">內容</div>
            <div class="col-md-4 col-sm-9 col-xs-9">
                <input class="form-control" style="border-redius:5px;" type="text" id="news_content" value="{{ $news_content ?? '' }}">
            </div>
        </div><br>
        <input type="hidden" id="news_id" value="{{ $news_id ?? '' }}">
        <div class="row">
            <div class="col-2">
                <button id="{{ $buttonId }}" class="btn btn-primary">
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
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
@endsection