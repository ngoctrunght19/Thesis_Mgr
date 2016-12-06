@extends('layout.frame')

@section('title', 'Đăng nhập')

@section('nav_account')
@endsection

@section('body')
    <div class="container container-login">
    <div class="row">
        <div class="col-sm-8">
            <h4>Thông báo:</h4>
        </div>

        <div class="col-sm-4">
            <div class="box-login">
                <div class="title-login">Đăng nhập hệ thống</div>
                <form class="login" method="POST" action="{{ url('login') }}">
                    <div class="form-group">
                        <label for="email">Tên truy cập</label>
                        <input type="text" class="form-control" name="username" id="username" required="" oninvalid="this.setCustomValidity('Chưa nhập tên truy cập')">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" required="" oninvalid="this.setCustomValidity('Chưa nhập mật khẩu')">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-block btn-success">Đăng nhập</button>
                </form>
            </div>
            
        </div>
    </div>
    </div>
@endsection