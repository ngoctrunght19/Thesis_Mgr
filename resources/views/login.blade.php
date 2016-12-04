@extends('layout.frame')

@section('title', 'Đăng nhập')

@section('body')
    <div class="row">
        <div class="col-sm-8">
            <h3>Thông báo:</h3>
        </div>

        <div class="col-sm-4">
            <div class="box-login">
                <div class="title-login">Đăng nhập hệ thống</div>
                <form class="login">
                    <div class="form-group">
                        <label for="email">Tên truy cập</label>
                        <input type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu</label>
                        <input type="password" class="form-control" required="">
                    </div>
                    <button class="btn btn-block btn-success">Đăng nhập</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection