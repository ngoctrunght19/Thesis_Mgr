@extends('hocvien')

@section('tab-view')

<div id="detai-result">
@if($student->duocdangky == false)
  
  <h3>Bạn chưa đủ điều kiện được phép đăng ký</h3>

@else @if($detai == null)

	<h2>Đăng ký đề tài</h2>
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
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Đăng ký</button>
      </div>
    </div>
  </form>

  @else @if($detai->trangthai == 'cho')
        <div class="alert bg-warning" role="alert">
          <svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg> Đang chờ giảng viên phê duyệt
        </div>
        <div class="row">
          <div class="col-sm-2">
            <label class="detail-label">Tên đề tài: </label>
          </div>
          <div class="col-sm-10">
            <p class="detail-text">{{ $detai->tendetai }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
            <label class="detail-label">Tên giảng viên: </label>
          </div>
          <div class="col-sm-10">
            <p class="detail-text">{{ $detai->hoten }}</p>
          </div>
        </div>
  @else 
    <div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Đề tài của bạn được chấp nhận
        </div>
    <div class="row">
          <div class="col-sm-2">
            <label class="detail-label">Tên đề tài: </label>
          </div>
          <div class="col-sm-10">
            <p class="detail-text">{{ $detai->tendetai }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
            <label class="detail-label">Tên giảng viên: </label>
          </div>
          <div class="col-sm-10">
            <p class="detail-text">{{ $detai->hoten }}</p>
          </div>
        </div>
    @endif
  @endif

@endif
</div>

  

@endsection
