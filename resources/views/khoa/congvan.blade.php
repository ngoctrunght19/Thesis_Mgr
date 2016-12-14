@extends('khoa')

@section('tab-view')

<div class="panel panel-blue">
	<div class="panel-heading dark-overlay">
		CÔNG VĂN
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<a href="{{ url('khoa/congvan/export') }}"><button class="btn btn-warning btn-md">Xuất Công Văn</button></a>
			<a href="{{ url('downloads/cong-van.docx') }}"><button class="btn btn-primary btn-md">Tải Công Văn</button></a>
		</div>
	</div>
</div>

@endsection
