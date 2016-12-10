@extends('khoa')

@section('tab-view')

<div class="panel panel-blue">
	<div class="panel-heading dark-overlay">
		ĐỀ TÀI
	</div>

  <div class="panel-body">
		<ul class="todo-list" id="list-detai">
      @foreach ($detai as $d)
      <li class="todo-list-item">
      	<label>{{ $d->tendetai }}</label>
      	<div class="pull-right action-buttons">
      		<a madetai="{{ $d->id }}" class="trash">
            <svg class="glyph stroked gear btn-suadetai"><use xlink:href="#stroked-gear"/></svg>
            &nbsp;
            <svg class="glyph stroked trash btn-xoadetai"><use xlink:href="#stroked-trash"></svg>
          </a>
      	</div>
      </li>
      @endforeach
    </ul>
  </div>


</div>

@endsection
