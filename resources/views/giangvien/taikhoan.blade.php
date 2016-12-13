@extends('giangvien')

@section('tab-view')
<div class="container col-md-10" >
  <div class="col-sm-offset-3 col-sm-9">
    <h2>Thông tin giảng viên</h2>
  </div>
  <form class="form-horizontal" form id="edit-info-gv" method="post" action="taikhoan/edit">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Họ và tên:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="name" id="hoten-gv" placeholder="Nhập họ và tên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập tên')" oninput="setCustomValidity('')" value="{{$accInfo->hoten}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" name="email"  id="email-gv" placeholder="Nhập email" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập email')" oninput="setCustomValidity('')" value="{{$accInfo->email}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Đơn vị:</label>
      <div class="col-sm-9">
        <textarea class="form-control" rows="4" cols="50" name="donvi" id="donvi-gv">{{$accInfo->donvi}}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection
