@extends('khoa')

@section('tab-view')

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#nhaphocvien">Nhập học viên</a></li>
  <li><a data-toggle="tab" href="#typelecturer">Nhập tay</a></li>
  <li><a data-toggle="tab" href="#lecturer">Giảng viên</a></li>
</ul>

<br />


<div class="tab-content">
  <div id="nhaphocvien" class="tab-pane active">
    <div class="col-sm-offset-2">
     	<h2>Nhập học viên đã nộp hồ sơ</h2>
     </div>
    </div>
    <form id="nophoso" class="form-horizontal" method="post" action="dangkybaove/nophoso" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-2" for="magv">Mã học viên:</label>
          <div class="col-sm-9">          
            <input type="text" class="form-control" name="id" id="mahocvien" placeholder="Nhập mã học viên" required=""  oninvalid="this.setCustomValidity('Bạn chưa nhập mã học viên')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary submit">Đánh dấu hoc viên</button>
          </div>
        </div>

        <span class="error form-error"></span>

        <div id="result">
        </div>
    </form>
    

  </div>

  <div id="typelecturer" class="tab-pane">
   
  </div>

  <div id="lecturer" class="tab-pane">
 
  </div>
</div>

@endsection