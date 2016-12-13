@extends('giangvien')

@section('tab-view')

<div>
	<h1>Đơn vị</h1>
	<ul class="nav menu" id="item-donvi">
		@foreach ($khoa as $k)
			<li>
				<a data-toggle="collapse" href="#item-{{ $k->makhoa }}">{{ $k->tenkhoa }}</a>
				<ul class="nav collapse deeper" id="item-{{ $k->makhoa }}">
					@foreach ($donvi as $d)
						@if ($k->makhoa == $d->makhoa)
							<li>
								<a href="#item-bm{{ $k->makhoa }}"> {{ $d->tendonvi }} </a>
							</li>
						@endif
					@endforeach
				</ul>
			</li>
		@endforeach
	</ul>
</div>

@endsection
