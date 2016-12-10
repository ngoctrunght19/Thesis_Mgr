@extends('hocvien')

@section('tab-view')

<div>
  @if($student->duocdangky == false)
  
  <h3>Bạn chưa đủ được phép đăng ký</h3>

  @else

	<h1>Đăng ký đề tài</h1>
  <form id="form-detai" class="form-horizontal" method="post" action="dakydetai" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-3" for="madetai">Tên đề tài:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="id" id="tendetai" placeholder="Nhập tên đề tài" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập tên đề tài')" oninput="setCustomValidity('')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="khoa">Giảng viên hướng dẫn:</label>
      <div class="col-sm-8">
        <select class="form-control" id="sel-khoa">
          @foreach($giangvien as $g)
            <option>{{ $g->hoten }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="madetai">Mô tả đề tài:</label>
      <div class="col-sm-8">
        <textarea class="form-control" rows="4" id="comment"></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Đăng ký</button>
      </div>
    </div>
  </form>
</div>

@endif

@endsection
