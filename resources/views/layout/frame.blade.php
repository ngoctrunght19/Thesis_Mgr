<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    </head>
    <body>

        <header>
            <div class="container-fluid header">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="{{ asset('img/uet_logo.png') }}" class="img-responsive">
                    </div>
                    <div class="col-sm-3">
                        <h4>Trường Đại Học Công Nghệ</h4>
                        <h5>Đại Học Quốc Gia Hà Nội</h5>
                    </div>
                    <div class="col-sm-8">
                        <h1>ĐĂNG KÝ ĐỀ TÀI KHÓA LUẬN</h1>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            @yield('body')
        </div>

        <footer>
            <div class="footer">
                <div>Trường đại học Công Nghệ - ĐHQG Hà Nội</div>
                <div>144 đường Xuân Thủy, Quận Cầu Giấy, Hà Nội, Việt Nam</div>
            </div>
        </footer>

    
    <!-- JavaScrip -->
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    </body>

</html>
