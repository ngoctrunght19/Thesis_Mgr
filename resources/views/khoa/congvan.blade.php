@extends('khoa')

@section('tab-view')

<div class="panel panel-blue">
	<div class="panel-heading dark-overlay">
		ĐÈ NGHỊ DANH SÁCH ĐỀ TÀI, HỌC VIÊN VÀ GIẢNG VIÊN HƯỚNG DẪN
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<a href="{{ url('khoa/congvan/exportdsdt') }}"><button class="btn btn-warning btn-md">Xuất Công Văn</button></a>
			<a href="{{ url('downloads/ds-detai.docx') }}"><button class="btn btn-primary btn-md">Tải Công Văn</button></a>
		</div>
	</div>
	<div class="panel-heading dark-overlay">
		ĐỀ NGHỊ THÔI LÀM ĐỀ TÀI
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<a href="{{ url('khoa/congvan/exportrdt') }}"><button class="btn btn-warning btn-md">Xuất Công Văn</button></a>
			<a href="{{ url('downloads/rut-detai.docx') }}"><button class="btn btn-primary btn-md">Tải Công Văn</button></a>
		</div>
	</div>
</div>

@endsection
