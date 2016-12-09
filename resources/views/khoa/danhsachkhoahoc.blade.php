@foreach ($khoahoc as $k)
<li class="todo-list-item">
	<label>{{ $k->tenkhoahoc }}</label>
	<div class="pull-right action-buttons">
		<a makhoahoc="{{ $k->id }}" class="trash btn-xoakhoahoc"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use>
		</svg></a>
	</div>
</li>
@endforeach