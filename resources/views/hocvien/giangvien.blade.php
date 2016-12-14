@extends('hocvien')

@section('tab-view')

<div>
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h1>Giảng viên</h1>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-sortable="true">Họ và tên</th>
						        <th data-sortable="true">Đơn vị</th>
						        <th data-sortable="true">Lĩnh vực</th>
						        <th data-sortable="true">Chủ đề nghiên cứu</th>
						    </tr>
						    </thead>
						    <tbody>
						    @foreach ($giangvien as $gv)
								<tr>
									<td><a href="#">{{ $gv->hoten }}</a></td>
									<td>
										<div>Khoa {{ $gv->khoa }}</div>
										<div>{{ $gv->donvi }}</div>
									</td>
									<td>
										@foreach ($gv->linhvuc as $linhvuc)
										<div>{{ $linhvuc->tenlinhvuc }}</div>
										@endforeach
									</td>
									<td>
										@foreach ($gv->chude as $chude)
										<div>{{ $chude->tenchude }}</div>
										@endforeach
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</div>

@endsection