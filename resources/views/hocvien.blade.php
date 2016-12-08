@extends('layout.frame')

@section('title', 'Học Viên')

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
            <li class="parent">
              <a href="#tabs-1">
                  <div data-toggle="collapse" href="#item-khoa">
                    <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                    Đơn vị
                  </div>
              </a>

            </li>
            <li>
                <a href="#tabs-2">
                    <svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
                     Giảng viên
                </a>
            </li>
            <li class="parent">
                <a href="#tabs-3">
                    <svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
                     Lĩnh vực
                </a >

            </li>
            <li>
                <a href="#tabs-5">
                    <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
                     Đề tài khóa luận
                </a>
            </li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @include('hocvien.donvi')
        @include('hocvien.giangvien', ['giangvien' => $giangvien, 'khoa' => $khoa, 'cdnc' => $cdnc])
        @include('hocvien.linhvuc') 
        <!-- @include('khoa.qlgv')
        @include('khoa.qlhv') -->
    </div>
</div>
@endsection
