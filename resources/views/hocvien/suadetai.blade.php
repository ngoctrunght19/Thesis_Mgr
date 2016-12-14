@extends('hocvien')

@section('tab-view')

<div id="detai-result">

  @if($detai == null)
    <div class="alert bg-danger" role="alert">
      <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
       Bạn chưa đăng ký đề tài
    </div>
  @else @if($modangky->trangthai == 'mo')
    <div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đang trong đợt đăng ký đề tài, bạn chưa được rút hoặc sửa đề tài
    </div>
  @else
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#rutdangky">Rút đăng ký</a></li>
      <li><a data-toggle="tab" href="#suadetai">Sửa đề tài</a></li>
    </ul>
    
    <div class="tab-content">
      <div id="rutdangky" class="tab-pane active">
        <div class="row">
          <div class="col-sm-12">
            <h2>Rút đăng ký</h2>
          </div>
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

        <div class="row">
          <div class="col-sm-2">
            <button madetai="{{ $detai->id }}" id="rut-de-tai" class="btn btn-primary">Rút đăng ký</button>
          </div>
        </div>
      </div>

      <div id="suadetai" class="tab-pane">
        <div class="row">
          <div class="col-sm-2">
            <h2>Sửa đề tài</h2>
          </div>
        </div>
        <form id="form-detai" class="form-horizontal" method="post" action="suadetai" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-primary">Sửa đề tài</button>
          </div>
        </div>
      </form>
      </div>

    </div>

    @endif
  @endif

</div>

  

@endsection
