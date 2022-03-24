<div class="col-xl-4 col-lg-5">
    <div class="row">
        <div class="col-md-4">
            <a href="/type_list" class="btn btn-info"><i class="fa fa-window-restore" aria-hidden="true"></i> 產品分類</a>
        </div>
        <div class="col-md-4">
            <a href="/product_add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> 新增</a>
        </div>
        <!-- <div class="col-4"><a href="#" class="btn btn-outline-danger">刪除</a></div> -->
    </div><br>
    <div class="row">
        <form class="d-flex">
            <div class="col-md-6 me-2">
                <input class="form-control" type="search" id="product_keyword" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-success" id="product_search">
                    <i class="fa fa-search" aria-hidden="true"></i> 搜尋
                </button>
            </div>
        </form>
    </div>
    <div class="row">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/product_list">所有產品</a>
                <span class="badge bg-primary rounded-pill">{{ $total }}</span>
            </li>
            @foreach ($types as $key => $value)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/product_list/{{ $value['type_id'] }}">{{ $value['type_name'] }}</a>
                    <span class="badge bg-primary rounded-pill">{{ $value['count'] }}</span>
                </li>
            @endforeach
        </ul>
    </div><br>
    <div class="row">
        <h3>熱門商品</h3>
        @foreach ($hits as $key => $value)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="/product_info/{{ $value->product_id }}">
                            <img src="{{ isset($value->product_image) ? '/storage/'.$value->product_image : asset('images/default.png') }}" class="img-fluid rounded-start" style="width: 200; height: 100">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="/product_info/{{ $value->product_id }}"><h5 class="card-title">{{ $value->product_title }}</h5></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>