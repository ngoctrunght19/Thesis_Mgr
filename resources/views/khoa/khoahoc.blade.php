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
			@foreach ($khoahoc as $k)
			<li class="todo-list-item">
				<label>{{ $k->tenkhoahoc }}</label>
				<div class="pull-right action-buttons">
					<a makhoahoc="{{ $k->id }}" class="trash btn-xoakhoahoc"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use>
					</svg></a>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>

@endsection