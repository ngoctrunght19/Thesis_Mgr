@extends('layout.frame')

@section('title', 'Admin')

@section('nav_account')
<div class="col-sm-2 dropdown">
    <a href="#" class="dropdown-toggle nav-account" data-toggle="dropdown">
        @if( Auth::check() )
            Xin chào, {{ Auth::user()->username }}
        @endif
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu drop-account" role="menu">
        <li>
            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật tài khoản</a>
        </li>
        <li>
            <a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
        </li>
    </ul>
</div>
@endsection

@section('body')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="active">
                <a href="">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="parent">
                <a data-toggle="collapse" href="#sub-item-1">
                    <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                    <span>Dropdown<span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li>
                        <a class="" href="#">
                            Sub Item 1
                        </a>
                    </li>
                    <li>
                        <a class="" href="#">
                            Sub Item 2
                        </a>
                    </li>
                    <li>
                        <a class="" href="#">
                            Sub Item 3
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">   
        a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>
    </div>
@endsection