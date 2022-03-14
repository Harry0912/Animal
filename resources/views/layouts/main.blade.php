<html>
    <head>
        <title>應用程式名稱 - @yield('title')</title>
        <meta name="_token" content="{{csrf_token()}}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}"></link>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/animal.css') }}">
    </head>
    <body>

    <nav>
        <!-- <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="/">首頁</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/news_list">最新消息</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/product_list" role="button" aria-expanded="false">產品</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">所有產品</a></li>
                    <li><a class="dropdown-item" href="#">狗飼料</a></li>
                    <li><a class="dropdown-item" href="#">貓飼料</a></li>
                    <li><a class="dropdown-item" href="#">魚飼料</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">聯絡我們</a>
            </li>
        </ul> -->
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">首頁</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/news_list">最新消息</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product_list">產品</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">聯絡我們</a>
            </li>
        </ul>
    </nav>

        <!-- <div class="input-group">
            <a class="btn btn-outline-primary col-md-3" href="/">首頁</a>
            <a class="btn btn-outline-primary col-md-3" href="/news_list">最新消息</a>
            <a class="btn btn-outline-primary col-md-3" href="/product_list">產品</a>
            <a class="btn btn-outline-primary col-md-3" href="/contact">聯絡我們</a>
        </div> -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('images/banner1.jpg') }}" width="1920" height="320" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/banner2.jpg') }}" width="1920" height="320" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/banner3.jpg') }}" width="1920" height="320" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br><br>
        @yield('main')
        @yield('news')
        @yield('news_add')
        @yield('product')
        @yield('product_add')
        @yield('product_type')
        <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/animal.js') }}"></script>
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    </body>
</html>