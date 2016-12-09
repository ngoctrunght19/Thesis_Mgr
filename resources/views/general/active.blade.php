@extends('layout.frame')

@section('title', 'Đăng nhập')

@section('nav_account')
@endsection

@section('body')
    
    <div class="center">
        <div class="box-login">
            <div class="title-login">Đặt mật khẩu để kích hoạt tài khoản</div>
            <form id="active" class="login" method="POST" action="{{ url('active') }}" onsubmit="return validateActive()">
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
                <button type="submit" class="btn btn-block btn-success">Xác nhận</button>
            </form>
        </div>
        
    </div>
@endsection