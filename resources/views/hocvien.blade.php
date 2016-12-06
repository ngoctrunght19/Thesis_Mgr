@extends('layout.frame')

@section('title', 'Đăng nhập')

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
            <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
        </li>
    </ul>
</div>
@endsection

@section('body')
@endsection