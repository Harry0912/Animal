@extends('layouts.main')

@section('product_list')
<div class="container">
    <div class="row">
        @include('product/product_side')
        <div class="col-xl-8 col-lg-7">
            <div class="row">
                @if (count($products) > 0)
                    @foreach($products as $key => $value)
                    <div class="col-lg-12 col-xl-6">
                        <div class="card">
                            <img src="{{ isset($value->product_image) ? '/storage/'.$value->product_image : asset('images/default.png') }}" class="card-img-top" alt="..." width="300" height="300">
                            <div class="card-body">
                                <!-- <h5 class="card-title">{{ $value->product_title }}</h5> -->
                                <a href="/product_info/{{ $value->product_id }}" class="card-title"><h5>{{ $value->product_title }}</h5></a>
                            </div>
                            <div class="btn-group">
                                <input type="hidden" name="product_id" value="{{ $value->product_id }}">
                                <a href="/product_edit/{{ $value->product_id }}" class="btn btn-info col-6"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button name="productDelete" class="btn btn-danger col-6"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12">
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
                @else
                <div class="alert alert-primary" style="text-align:center;" role="alert">沒有任何產品</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection