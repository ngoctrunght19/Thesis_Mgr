@extends('khoa')

@section('tab-view')

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#nhaphocvien">Nhập học viên</a></li>
  <li><a data-toggle="tab" href="#chuanop">Chưa nộp</a></li>
  <li><a data-toggle="tab" href="#dudieukien">Đủ điều kiện</a></li>
</ul>

<br />


<div class="tab-content">
  <div id="nhaphocvien" class="tab-pane active">
    <div class="col-sm-offset-2">
     	<h2>Nhập học viên đã nộp hồ sơ</h2>
    </div>

    <form id="nophoso" class="form-horizontal" method="post" action="dangkybao/nophoso" enctype="multipart/form-data">
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
	

  <div id="chuanop" class="tab-pane">
  		<button id="guinhacnho" class="btn btn-primary">Gửi email nhắc nhở</button>
   		<h2>Danh sách sinh viên chưa nộp hồ sơ</h2>

   		<div>
		    <table class="table table-responsive table-bordered table-hover">
		    <thead>
		        <tr>
		            <th>Mã học viên</th>
		            <th>Họ và tên</th>
		            <th>Email</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($chuanop as $cn)
		        <tr>
		            <td>{{ $cn->mahocvien }}</td>
		            <td>{{ $cn->hoten }}</td>
		            <td>{{ $cn->email }}</td>
		        </tr>
		    </tbody>
		    @endforeach

		    </table>
		</div>
  </div>

  <div id="dudieukien" class="tab-pane">
     <button id="xuatcongvan" class="btn btn-primary">Xuât công văn</button>
 		 <h2>Danh sách sinh viên đủ điều kiện bảo vệ</h2>

   
      <div>
        <table class="table table-responsive table-bordered table-hover">
        <thead>
            <tr>
                <th>Mã học viên</th>
                <th>Họ và tên</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dudieukien as $d)
            <tr>
                <td>{{ $d->mahocvien }}</td>
                <td>{{ $d->hoten }}</td>
                <td>{{ $d->email }}</td>
            </tr>
        </tbody>
        @endforeach

        </table>
    </div>
  </div>
</div>

@endsection