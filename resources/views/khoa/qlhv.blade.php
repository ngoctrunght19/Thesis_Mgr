@extends('khoa')

@section('tab-view')


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#uploadStudent">Upload excel</a></li>
  <li><a data-toggle="tab" href="#typelstudent">Nhập tay</a></li>
  <li><a data-toggle="tab" href="#student">Học viên</a></li>
</ul>

<br />


<div class="tab-content">
  <div id="uploadStudent" class="tab-pane active">
  	<h2>Thêm học viên bằng upload excel</h2>
    <form id="form-upload" class="form-horizontal" method="post" action="qlhv/upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-2" for="select-file">Chọn file excel:</label>
          <div class="col-sm-10">          
            <input type="file" name="excel" class="file" id="select-file" accept=".xlsx, .xls"/>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Thêm học viên</button>
          </div>
        </div>

    </form>

    <div id="upload-result">
    </div>
  
  </div>

  <div id="typelstudent" class="tab-pane">
    <div class="container col-md-10" >
      <div class="col-sm-offset-3 col-sm-9">
        <h2>Nhập thông tin học viên</h2>
      </div>
      <form class="form-horizontal" form id="typelstudent" method="post" action="qlhv/typelstudent">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="control-label col-sm-3" for="mahv">Mã giảng viên:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" name="id" id="mahv" placeholder="Nhập mã học viên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập mã học viên')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Họ và tên:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập tên')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="khoa">Khóa học:</label>
          <div class="col-sm-9">
            <select class="form-control" id="sel-khoa">
              @foreach($khoahoc as $k)
              <option>{{ $k->tenkhoahoc }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="khoa">Chương trình đào tạo:</label>
          <div class="col-sm-9">
            <select class="form-control" id="sel-khoa">
              @foreach($nganhhoc as $nganh)
              <option>{{ $nganh->tennganh }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Email:</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" name="email"  id="email" placeholder="Nhập email" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập email')" oninput="setCustomValidity('')">
          </div>
        </div>

  
        <div class="form-group">        
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Thêm học viên</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div id="student" class="tab-pane">
    <div id="danhsachhocvien">
    @include('khoa.danhsachhocvien')
    </div>
  </div>
</div>


</div>

</div>

@endsection