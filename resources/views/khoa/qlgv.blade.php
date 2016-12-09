@extends('khoa')

@section('tab-view')

<div>
<label>Nhập tay: </label>
<button class="btn btn-primary" data-toggle="modal" data-target="#modalthemgv">Thêm tay</button> 
<br />
<form id="form-upload" method="post" action="qlgv/upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="file" name="excel" class="file" id="select-file" accept=".xlsx, .xls"/>
    <input type="submit" value="Upload"  id="submit-upload"/>
</form>

<div id="result">
</div>

<div id="danhsachgiangvien">
@include('khoa.danhsachgiangvien')
</div>

<!-- Modal Add Group -->
<div class="modal fade" id="modalthemgv" role="dialog">
    <div class="modal-dialog modal-lg">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h2 class="modal-title">Thêm giảng viên</h2>
	        </div>
	        <div class="modal-body">
	        	<form class="form" id="themgiangvien" method="post" action="">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-1">
							<label class="detail-label">Mã giảng viên: </label>
						</div>
						<div class="col-sm-8">
							<input class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-1">
							<label class="detail-label">Tên giảng viên: </label>
						</div>
						<div class="col-sm-8">
							<input class="form-control" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-1">
							<label class="detail-label">Email: </label>
						</div>
						<div class="col-sm-8">
							<input class="form-control" type="text">
						</div>
					</div>

				</form>
	        </div>
        	<div class="modal-footer">
        		<button type="button" class="btn btn-primary">Chấp nhận</button>
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
        	</div>
    	</div>
    </div>
</div>

</div>

@endsection