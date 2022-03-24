@extends('layouts.main')

@section('news_list')
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="row">
                <div class="col-4"><a class="btn btn-primary" href="/news_add"><i class="fa-solid fa-plus"></i> 新增</a></div>
                <!-- <div class="col-4"><a class="btn btn-info" href="/news_add"><i class="fa-solid fa-pen-to-square"></i>編輯</a></div> -->
                <!-- <div class="col-4"><a class="btn btn-danger" href="/news_add"><i class="fa-solid fa-trash-can"></i>刪除</a></div> -->
            </div><br>
            <div class="row">
                <form class="d-flex">
                    <div class="col-md-6 me-2">
                        <input class="form-control" type="search" id="news_keyword" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-outline-success" id="news_search">
                            <i class="fa fa-search" aria-hidden="true"></i> 搜尋
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            @if (count($news) > 0)
                <div class="row">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($news as $key => $value)
                        <div class="row">
                            <div class="col-10">
                                <div class="accordion-item">
                                    <div class="col-12">
                                        <h2 class="accordion-header" id="flush-heading{{ $key }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">
                                            {{ $value['news_title'] }}
                                        </button>
                                        </h2>
                                        <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <p>發布日期 : {{ $value->news_time }}</p>
                                                內容 : <strong>{{ $value['news_content'] }}</strong>
                                            </div><hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="row">
                                    <div class="col-6"><a class="btn btn-info" href="/news_edit/{{ $value->news_id }}"><i class="fa-solid fa-pen-to-square"></i></a></div>
                                    <input type="hidden" name="news_id" value="{{ $value->news_id }}">
                                    <input type="hidden" name="news_title" value="{{ $value['news_title'] }}">
                                    <div class="col-6"><button class="btn btn-danger" name="newsDelete"><i class="fa-solid fa-trash-can"></i></button></div>
                                    <!-- <div class="col-6"><button class="btn btn-danger" onclick="destroy('{{ $value->news_id }}', '{{ csrf_token() }}')"><i class="fa-solid fa-trash-can"></i></button></div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-12" style="display: flex; justify-content: center; padding: 12px;">
                        {{$news->links("pagination::bootstrap-4")}}
                        <!-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            @else
                <div class="alert alert-primary" style="text-align:center;" role="alert">沒有任何消息</div>
            @endif
        </div>
    </div>
</div>
@endsection