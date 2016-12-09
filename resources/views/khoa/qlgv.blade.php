@extends('khoa')

@section('tab-view')


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#uploadLecturer">Upload excel</a></li>
  <li><a data-toggle="tab" href="#typelecturer">Nhập tay</a></li>
  <li><a data-toggle="tab" href="#menu2">Giảng viên</a></li>
</ul>

<br />


<div class="tab-content">
  <div id="uploadLecturer" class="tab-pane active">
    <form id="form-upload" class="form-horizontal" method="post" action="qlgv/upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-2" for="select-file">Chọn file excel:</label>
          <div class="col-sm-10">          
            <input type="file" name="excel" class="file" id="select-file" accept=".xlsx, .xls"/>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Thêm giảng viên</button>
          </div>
        </div>
    </form>
    
    <div id="result">
    </div>

    <div id="danhsachgiangvien">
    @include('khoa.danhsachgiangvien')
    </div>
  </div>

  <div id="typelecturer" class="tab-pane">
    <div class="container col-md-8" >
      <h2>Nhập thông tin giảng viên</h2>
      <form class="form-horizontal" form id="typelecturer" method="post" action="qlgv/typelecturer">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="control-label col-sm-2" for="magv">Mã giảng viên:</label>
          <div class="col-sm-10">          
            <input type="text" class="form-control" name="id" id="magv" placeholder="Nhập mã giảng viên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập mã giảng viên')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Họ và tên:</label>
          <div class="col-sm-10">          
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập tên')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email"  id="email" placeholder="Nhập email" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập email')" oninput="setCustomValidity('')">
          </div>
        </div>
  
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Thêm giảng viên</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div id="lecturer" class="tab-pane">
    
  </div>
</div>


</div>

</div>

@endsection