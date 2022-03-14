<div class="col-xl-4 col-lg-5">
    <div class="row">
        <div class="col-4"><a href="/product_type" class="btn btn-outline-info">產品分類</a></div>
        <div class="col-4"><a href="/product_add" class="btn btn-outline-primary">新增</a></div>
        <div class="col-4"><a href="#" class="btn btn-outline-danger">刪除</a></div>
    </div><br>
    <div>
        <div class="row">
            <div class="col-9">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-3"><a class="btn btn-primary" href="/product_add">新增</a></div>
        </div>
    </div>
    <div>
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#">所有產品</a>
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
                @foreach ($types as $key => $value)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="#">{{ $value->type_name }}</a>
                        <span class="badge bg-primary rounded-pill">2</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>