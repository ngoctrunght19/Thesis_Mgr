@extends('layout.frame')

@section('title', 'Khoa')

@section('nav_account')
    @include('layout.nav_account')
@endsection

@section('body')
<div>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li class="parent ">
      				<a href="{{ url('khoa/khoahoc') }}">
                <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Khóa học
      				</a>
      			</li>
            <li class="parent">
              <a href="{{ url('khoa/ctdt') }}">
                <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                Chương trình đào tạo
              </a>
            </li>
            <li>
                <a href="{{ url('khoa/qlgv') }}">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Quản lý giảng viên
                </a >
            </li>
            <li>
                <a href="{{ url('khoa/qlhv') }}">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Quản lý học viên
                </a>
            </li>
            <li>
                <a href="{{ url('khoa/detai') }}">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                     Đề tài
                </a>
            </li>
            <li>
                <a href="{{ url('khoa/modongdk') }}">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                     Mở đóng đăng ký
                </a>
            </li>
            <li>
                <a href="{{ url('khoa/thongbao') }}">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                     Thông báo
                </a>
            </li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('tab-view')

     {{--    @include('khoa.khoahoc', ['khoahoc' => $khoahoc])
        @include('khoa.ctdt', ['nganhhoc', $nganhhoc])
        @include('khoa.qlgv', ['giangvien' => $giangvien])
        @include('khoa.qlhv') --}}
    </div>
</div>
@endsection
