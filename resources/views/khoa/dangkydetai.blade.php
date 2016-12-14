@extends('khoa')

@section('tab-view')

<div class="panel panel-blue">
	<div class="panel-heading dark-overlay">
		CHƯƠNG TRÌNH HỌC
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<input id="input-nganh" type="text" class="form-control input-md" placeholder="Thêm chương trình học" />
			<span class="input-group-btn">
				<button class="btn btn-primary btn-md" id="btn-themnganh">Thêm</button>
			</span>
		</div>
	</div>
	<div class="panel-body">
		<ul class="todo-list" id="list-nganh">
			@include('khoa.danhsachnganh', ['nganhhoc' => $nganhhoc])
		</ul>
	</div>
</div>

@endsection