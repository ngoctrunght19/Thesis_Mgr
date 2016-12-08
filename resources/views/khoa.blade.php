@extends('layout.frame')

@section('title', 'Khoa')

@section('nav_account')
    @include('layout.nav_account')
@endsection

@section('body')
<div id="tabs">
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="parent ">
      				<a href="#tabs-1">
                <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Khóa học
      				</a>
      			</li>
            <li class="parent">
              <a href="#tabs-2">
                <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                Chương trình đào tạo
              </a>
            </li>
            <li>
                <a href="#tabs-3">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Quản lý giảng viên
                </a >
            </li>
            <li>
                <a href="#tabs-4">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Quản lý học viên
                </a>
            </li>

        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('khoa.khoahoc', ['khoahoc' => $khoahoc])
        @include('khoa.ctdt', ['nganhhoc', $nganhhoc])
        @include('khoa.qlgv', ['giangvien' => $giangvien])
        @include('khoa.qlhv')
    </div>
</div>
@endsection
