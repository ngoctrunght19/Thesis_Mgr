@extends('khoa')

@section('tab-view')

<div class="panel panel-blue">
	<div class="panel-heading dark-overlay">
		KHÓA HỌC
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<input id="input-khoahoc" type="text" class="form-control input-md" placeholder="Thêm khóa học"/>
			<span class="input-group-btn">
				<button class="btn btn-primary btn-md" id="btn-themkhoahoc">Thêm</button>
			</span>
		</div>
	</div>
	<div class="panel-body">
		<ul class="todo-list" id="list-khoahoc">
			@include('khoa.danhsachkhoahoc', ['khoahoc' => $khoahoc])
		</ul>
	</div>
</div>

@endsection