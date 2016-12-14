<table class="table" id="bangchude">
	<thead>
		<th>Thông báo</th>
	</thead>
	<tbody>
		@foreach($thongbao as $t)
		<tr>
			<td class="col-md-10 col-sm-9 col-xs-8 chu">{{ $t->thongbao }}</td>
			<td>
				<button mathongbao="{{ $t->id }}" class="xoathongbao btn btn-danger">Xóa thông báo</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>