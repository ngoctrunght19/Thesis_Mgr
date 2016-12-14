@extends('khoa')

@section('tab-view')

<div class="panel panel-blue">
	<div class="panel-heading dark-overlay">
		CÔNG VĂN
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<span class="input-group-btn">
				<a href="{{ url('khoa/congvan/export') }}"><button class="btn btn-primary btn-md" id="btn-themnganh">Xuất Công Văn</button></a>
			</span>
		</div>
	</div>
</div>

@endsection
