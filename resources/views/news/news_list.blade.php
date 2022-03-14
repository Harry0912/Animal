@extends('layouts.main')

@section('news')
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="row">
                <div class="col-4"><a class="btn btn-primary" href="/news_add"><i class="fa-solid fa-plus"></i>新增</a></div>
                <div class="col-4"><a class="btn btn-info" href="/news_add"><i class="fa-solid fa-pen-to-square"></i>編輯</a></div>
                <div class="col-4"><a class="btn btn-danger" href="/news_add"><i class="fa-solid fa-trash-can"></i>刪除</a></div>
            </div><br>
            <div class="row">
                <div class="col-9">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-3"><a class="btn btn-primary" href="/news_add">新增</a></div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="row">
                <div class="accordion" id="accordionExample">
                    @foreach ($news as $key => $value)
                    <div class="row">
                        <div class="col-1"><input class="form-check-input" type="checkbox" value="{{ $value->news_id }}" id="newsCheckbox"></div>
                        <div class="col-10">
                            <div class="accordion-item">
                                <!-- <div class="row"> -->
                                <!-- <div class="form-check"> -->
                                    <!-- <div class="col-1" style="display:none;"><input class="form-check-input" type="checkbox" value="{{ $value->news_id }}" name="newsCheckbox"></div> -->
                                    <div class="col-12">
                                        <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button {{ ($key!=0)?'collapsed':'' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                            {{ $value['news_title'] }}
                                        </button>
                                        </h2>
                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ ($key==0)?'show':'' }}" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>{{ $value['news_content'] }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-1">
                                        <div class="row">
                                            <div class="col-6"><a href="/news_edit/{{ $value->news_id }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a></div>
                                            <div class="col-6"><a href="/news_edit/{{ $value->news_id }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></i></a></div>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="row">
                                <div class="col-6"><a class="btn btn-info" href="/news_edit/{{ $value->news_id }}"><i class="fa-solid fa-pen-to-square"></i></a></div>
                                <div class="col-6"><a class="btn btn-danger" href="/news_delete/{{ $value->news_id }}"><i class="fa-solid fa-trash-can"></i></a></div>
                                <!-- <div class="col-6"><button class="btn btn-danger" onclick="destroy('{{ $value->news_id }}', '{{ csrf_token() }}')"><i class="fa-solid fa-trash-can"></i></button></div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-12">
                <nav aria-label="Page navigation example">
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
                </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection