<h2>Các lĩnh vực liên quan</h2>
<ul>
	@foreach($linhvuc as $lv)
	<li class="linhvuc-list" malinhvuc={{$lv->id}}>
		{{ $lv->tenlinhvuc }}
	</li>
	@endforeach
</ul>