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
                    <a href="{{ url('admin/linhvuc') }}">
                <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Lĩnh vực
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
