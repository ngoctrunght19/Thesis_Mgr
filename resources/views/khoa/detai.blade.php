@extends('khoa')

@section('tab-view')

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#dudieukien">Học viên</a></li>
  <li><a data-toggle="tab" href="#quanly">Quản lý</a></li>
  <li><a data-toggle="tab" href="#thongke">Thống kê</a></li>
</ul>

<br />

<div class="tab-content">
  <div id="dudieukien" class="tab-pane active">
    <div id="upload">
      <h2>Nhập danh sách các sinh viên đủ điều kiện đăng ký băng file</h2>
      <form id="form-upload" class="form-horizontal" method="post" action="detai/upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label class="control-label col-sm-2" for="select-file">Chọn file excel:</label>
            <div class="col-sm-10">
              <input type="file" name="excel" class="file" id="select-file" accept=".xlsx, .xls"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary submit">Upload</button>
            </div>
          </div>

          <span class="error form-error"></span>

          <div id="upload-result" class="result">
          </div>

      </form>
    </div>

    <hr>

    <div>
      <h2>Nhập mã học viên đủ điều kiện đăng ký</h2>
      <form id="type" class="form-horizontal" method="post" action="detai/type" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label class="control-label col-sm-3" for="mahv">Mã giảng viên:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="mahv" id="mahv" placeholder="Nhập mã học viên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập mã học viên')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary submit">Cập nhật</button>
            </div>
          </div>

          <div class="result">
          </div>

      </form>
    </div>

  </div>

  <div id="quanly" class="tab-pane">
    quanly
  </div>

  <div id="thongke" class="tab-pane">

    <h2>Các đề tài đăng ký được chấp nhận</h2>
        <a href="{{ url('khoa/congvan/exportdsdt') }}">
            <button class="btn btn-warning">Xuất công văn đề nghị đề tài</button>
        </a>
        <a href="{{ url('downloads/ds-detai.docx') }}">
            <button class="btn btn-primary btn-md">Tải công văn</button>
        </a>
    <div>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Tên đề tài</th>
                  <th>Học viên</th>
                  <th>Giảng viên hướng dẫn</th>
              </tr>
          </thead>
          <tbody>
          @foreach($detai as $dt)
            @if($dt->trangthai == "chapnhan" && ($dt->thaydoi == null || $dt->thaydoi == "dangsua"))
              <tr>
                  <td>{{ $dt->tendetai }}</td>
                  <td>{{ $dt->hocvien }}</td>
                  <td>{{ $dt->giangvien }}</td>
              </tr>
            @endif
          @endforeach
          </tbody>
      </table>

      <br>
      <h2>Các đề tài xin rút</h2>
          <a href="{{ url('khoa/congvan/exportrdt') }}">
              <button class="btn btn-warning btn-md">Xuất công văn rút đề tài</button>
          </a>
          <a href="{{ url('downloads/rut-detai.docx') }}">
              <button class="btn btn-primary btn-md">Tải công văn</button>
          </a>
      <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên đề tài</th>
                    <th>Học viên</th>
                    <th>Giảng viên hướng dẫn</th>
                </tr>
            </thead>
            <tbody>
            @foreach($detai as $dt)
            @if($dt->trangthai == "chapnhan" && $dt->thaydoi == "rut")
              <tr>
                  <td>{{ $dt->tendetai }}</td>
                  <td>{{ $dt->hocvien }}</td>
                  <td>{{ $dt->giangvien }}</td>
              </tr>
            @endif
            @endforeach
            </tbody>
        </table>

        <br>
        <h2>Các đề tài xin sửa đổi</h2>
            <a href="{{ url('khoa/congvan/exportsdt') }}">
                <button class="btn btn-warning btn-md">Xuất công văn sửa đổi đề tài</button>
            </a>
            <a href="{{ url('downloads/sua-detai.docx') }}">
                <button class="btn btn-primary btn-md">Tải công văn</button>
            </a>
        <div>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Tên đề tài</th>
                      <th>Học viên</th>
                      <th>Giảng viên hướng dẫn</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($detai as $dt)
              @if($dt->trangthai == "chapnhan" && $dt->thaydoi == "sua")
                <tr>
                    <td>{{ $dt->tendetai }}</td>
                    <td>{{ $dt->hocvien }}</td>
                    <td>{{ $dt->giangvien }}</td>
                </tr>
              @endif
              @endforeach
              </tbody>
          </table>
  </div>

</div>

@endsection
