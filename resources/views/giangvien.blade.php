@extends('layout.frame')

@section('title', 'Giảng viên')

@section('nav_account')
    @include('giangvien.nav_account')
@endsection

@section('body')
<div>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="parent">
              <a href="{{ url('giangvien/chudenghiencuu') }}">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                    Chủ đề nghiên cứu
              </a>
            </li>
            <li class="parent">
              <a href="{{ url('giangvien/donvi') }}">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                    Đơn vị
              </a>

            </li>
            <li>
                <a href="{{ url('giangvien/giangvien') }}">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Giảng viên
                </a>
            </li>
            <li class="parent">
                <a href="{{ url('giangvien/linhvuc') }}">
                    <svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
                     Lĩnh vực
                </a >

            </li>
            <li>
                <a href="{{ url('giangvien/detaikhoaluan') }}">
                    <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
                     Đề tài khóa luận
                </a>
            </li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('tab-view')
       {{--  @include('hocvien.donvi')
        @include('hocvien.giangvien', ['giangvien' => $giangvien, 'khoa' => $khoa, 'cdnc' => $cdnc])
        @include('hocvien.linhvuc')
        <!-- @include('khoa.qlgv')
        @include('khoa.qlhv') --> --}}
    </div>
</div>
@endsection
