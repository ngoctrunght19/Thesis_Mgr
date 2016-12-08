<div id="tabs-1">
	<h1>Đơn vị</h1>
	<ul class="nav menu" id="item-donvi">
		@foreach ($khoa as $khoa)
			<li>
				<a data-toggle="collapse" href="#item-{{ $khoa->makhoa }}">{{ $khoa->tenkhoa }}</a>
				<ul class="nav collapse deeper" id="item-{{ $khoa->makhoa }}">
					<li>
						<a data-toggle="collapse" href="#item-{{ $khoa->makhoa+100 }}"> Bộ môn </a>
							<ul class="nav collapse deeper" id="item-{{ $khoa->makhoa+100 }}">
								<li>
										<a href="#"> Phòng thí nghiệm </a>
								</li>
								<li>
										<a href="#"> Phòng thí nghiệm </a>
								</li>
							</ul>
					</li>
					<li>
						<a href="#"> Bộ môn </a>
					</li>
					<li>
						<a href="#"> Bộ môn </a>
					</li>
				</ul>
			</li>
		@endforeach
	</ul>
</div>
