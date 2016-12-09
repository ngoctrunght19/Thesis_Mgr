@extends('hocvien')

@section('tab-view')

<div>
	<h1>Đăng ký đề tài</h1>
  <form id="form-upload" class="form-horizontal" method="post" action="qlgv/upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-3" for="magv">Tên đề tài:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="id" id="tendetai" placeholder="Nhập tên đề tài" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập tên đề tài')" oninput="setCustomValidity('')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="khoa">Giảng viên hướng dẫn:</label>
      <div class="col-sm-9">
        <select class="form-control" id="sel-khoa">
          @foreach($giangvien as $g)
            <option>{{ $g->hoten }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </form>
</div>

@endsection
