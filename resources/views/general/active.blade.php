@extends('layout.frame')

@section('title', 'Kích hoạt tài khoản')

@section('nav_account')
@endsection

@section('body')
    
    <div class="center">
        <div class="box-login">
            <div class="title-login center">Hãy đặt mật khẩu để kích hoạt</div>
            <div class="title-login center">tài khoản với tên đăng nhập {{ $tendangnhap }}</div>
            <form id="active" class="login" method="POST" action="" onsubmit="return validateActive()">
                <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password" id="password" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập mật khẩu')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label for="re-pwd">Nhập lại mật khẩu:</label>
                    <input type="password" class="form-control" name="re-password" id="re-password" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập lại mật khẩu')" oninput="setCustomValidity('')">
                    <span class="error" id="rp-error">&nbsp;</span>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" id="submit" class="btn btn-block btn-success">Xác nhận</button>
                <a href="{{ URL::to('/') }}" id="redirect" class="btn btn-block btn-success hidden">Kích để chuyển tới trang đăng nhập</a>
            </form>
        </div>
        
    </div>
@endsection