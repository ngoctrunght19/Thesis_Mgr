<div class="col-sm-2 dropdown">
    <a href="#" class="dropdown-toggle nav-account" data-toggle="dropdown">
        @if( Auth::check() )
            Xin chào, {{ Auth::user()->username }}
        @endif
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu drop-account" role="menu">
        <li>
            <a href="{{ url('giangvien/taikhoan') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật tài khoản</a>
        </li>
        <li>
            <a href="{{ url('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
        </li>
    </ul>
</div>
