@extends('hocvien')

@section('tab-view')

<div id="detai-result">
@if($student->duocdangky == false)
  
  <h3>Bạn chưa đủ tuổi được phép đăng ký</h3>

@else @if($detai == null)

	<h1>Đăng ký đề tài</h1>
  <form id="form-detai" class="form-horizontal" method="post" action="dangkydetai" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
  {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-3" for="tendetai">Tên đề tài:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="tendetai" id="tendetai" placeholder="Nhập tên đề tài" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập tên đề tài')" oninput="setCustomValidity('')">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="giangvien">Giảng viên hướng dẫn:</label>
      <div class="col-sm-8">
        <select class="form-control" id="giangvien" name="giangvien">
          @foreach($giangvien as $g)
            <option value="{{ $g->magiangvien }}">{{ $g->hoten }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="motadetai">Mô tả đề tài:</label>
      <div class="col-sm-8">
        <textarea class="form-control" rows="4" id="motadetai" name="motadetai"></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Đăng ký</button>
      </div>
    </div>
  </form>

  @else @if($detai->trangthai == 'cho')
    <h3>Đang chờ phê duyệt</h3>
    @endif
  @endif

@endif
</div>

  

@endsection
