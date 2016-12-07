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
                <div data-toggle="collapse" href="#item-khoahoc">
                  <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Khóa học
                </div>
      				</a>
      				<ul class="children collapse" id="item-khoahoc">
                @foreach ($khoahoc as $khoa)
                  <li>
                    <a class="" href="#">{{ $khoa->tenkhoahoc }}</a>
                  </li>
                @endforeach
      				</ul>
      			</li>
            <li class="parent">
              <a href="#tabs-2">
                <div data-toggle="collapse" href="#item-nganhhoc">
                  <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                  Chương trình đào tạo
                </div>
              </a>
              <ul class="children collapse" id="item-nganhhoc">
                @foreach ($nganhhoc as $nganh)
                  <li>
                    <a class="" href="#">{{ $nganh->tennganh }}</a>
                  </li>
                @endforeach
              </ul>
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
        @include('khoa.khoahoc')
        @include('khoa.ctdt')
        @include('khoa.qlgv')
        @include('khoa.qlhv')
    </div>
</div>
@endsection
