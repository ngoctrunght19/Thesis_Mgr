@extends('layout.frame')

@section('title', 'Đăng nhập')

@section('body')
    <form action="" class="w3-container w3-card-4 w3-light-grey form-login">
        <h2 class="w3-center">ĐĂNG NHẬP</h2>
        <div class="w3-row w3-section">
            <h6>Tên truy cập</h6>
            <input class="w3-input w3-border" type="text" name="">
        </div>
        <div class="w3-row w3-section">
            <h6>Mật khẩu</h6>
            <input class="w3-input w3-border" type="password" name="">
        </div>
        <button class="w3-btn-block w3-section w3-green w3-padding">Đăng nhập</button>
    </form>
@endsection