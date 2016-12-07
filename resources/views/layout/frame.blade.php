<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
                <div class="row">
                    <div class="col-md-1 hidden-sm hidden-xs">
                        <img src="img/uet_logo.png" class="img-responsive">
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <h4>Trường Đại Học Công Nghệ</h4>
                        <h5>Đại Học Quốc Gia Hà Nội</h5>
                    </div>
                    <div class="col-md-5 col-sm-9 hidden-xs">
                        <h1>ĐỀ TÀI KHÓA LUẬN</h1>
                    </div>
                    @yield('nav_account')

                </div> <!-- ./Row -->
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>

    @yield('body')

    <!-- JavaScrip -->
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>
