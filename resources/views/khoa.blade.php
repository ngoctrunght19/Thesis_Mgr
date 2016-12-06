@extends('layout.frame')

@section('title', 'Khoa')

@section('nav_account')
    @include('layout.nav_account')
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
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span>Quản lý giảng viên</span>
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
        <button>Thêm giảng viên</button> <br />
        <form method="GET" action="addGV">
            <label>Chọn tệp</label><input type="file" name="filename" accept=".xls,.xlsx">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="submit" value="Thêm giảng viên">
        </form>
        <table class="table">
            <thead>
              <tr>
                <th>Họ và tên</th>
                <th>Lastname</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
              </tr>
              <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
              </tr>
            </tbody>
        </table>
    </div>
@endsection