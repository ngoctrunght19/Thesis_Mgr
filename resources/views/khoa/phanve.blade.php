@extends('khoa')

@section('tab-view')

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#dudieukien">Lập hội đồng</a></li>
  <li><a data-toggle="tab" href="#quanly">Ý kiến phản biện</a></li>
  <li><a data-toggle="tab" href="#thongke">Báo cáo</a></li>
</ul>

<br />

<div class="tab-content">
  <div id="dudieukien" class="tab-pane active">
      <h2>Lập hội đồng</h2>
  </div>

  <div id="quanly" class="tab-pane">
        <h2>Nhập ý kiến bảo vệ</h2>
       <form id="nophoso" class="form-horizontal" method="post" action="dangkybao/nophoso" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-2" for="magv">Mã học viên:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" name="id" id="mahocvien" placeholder="Nhập mã học viên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập mã học viên')" oninput="setCustomValidity('')">
          </div>
        </div>
      <div class="form-group">
        <div>
            <label class="control-label col-sm-2" for="ykien">Ý kiến của hội đồng:</label>
          </div>
          <div class="form-group">
          <div class="col-sm-9">
            <textarea class="form-control" rows="4" id="ykien" name="chude" required="" oninvalid="this.setCustomValidity('Chưa nhập chủ đề')" oninput="setCustomValidity('')"></textarea>
          </div>
          </div>
      </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="magv">Nhập điểm:</label>
          <div class="col-sm-1">          
            <input type="text" class="form-control" name="id" id="mahocvien" placeholder="10.0" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập mã học viên')" oninput="setCustomValidity('')">
          </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary submit">Xuất biên bản</button>
            </div>
          </div>

        <div id="result">
        </div>
    </form>
  </div>

  <div id="thongke" class="tab-pane">
      <h2>Xuât báo cáo</h2>
  </div>

</div>

@endsection
