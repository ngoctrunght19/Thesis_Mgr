@extends('layout.frame')

@section('title', 'Học Viên')

@section('nav_account')
    @include('layout.nav_account')
@endsection

@section('body')
<div>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li class="parent">
              <a href="{{ url('hocvien/donvi') }}">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                    Đơn vị
              </a>

            </li>
            <li>
                <a href="{{ url('hocvien/giangvien') }}">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Giảng viên
                </a>
            </li>
            <li class="parent">
                <a href="{{ url('hocvien/linhvuc') }}">
                    <svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
                     Lĩnh vực
                </a >

            </li>
            <li>
                <a href="{{ url('hocvien/detaikhoaluan') }}">
                    <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
                     Đề tài khóa luận
                </a>
            </li>
            <li>
                <a href="{{ url('hocvien/suadetai') }}">
                    <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
                     Sửa đề tài
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
