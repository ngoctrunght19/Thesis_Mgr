@foreach ($nganhhoc as $nganh)
<li class="todo-list-item">
	<label>{{ $nganh->tennganh }}</label>
	<div class="pull-right action-buttons">
		<a manganh="{{ $nganh->id }}" class="trash btn-xoanganh"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use>
		</svg></a>
	</div>
</li>
@endforeach