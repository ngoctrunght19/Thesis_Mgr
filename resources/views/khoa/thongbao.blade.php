@extends('khoa')

@section('tab-view')

<div class="row">
	<div class="col-sm-12">
		<h2>Thêm thông báo</h2>
	</div>
</div>

<div class="row">
	<div class="form-group col-sm-8">
  		<label for="comment">Thông báo:</label>
  		<textarea class="form-control" rows="4" id="comment"></textarea>
	</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<button class="btn btn-primary">Đăng thông báo</button>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<h2>Danh sách các thông báo</h2>
	</div>
</div>



@endsection
