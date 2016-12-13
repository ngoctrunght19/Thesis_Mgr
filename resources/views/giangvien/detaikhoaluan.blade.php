@extends('giangvien')

@section('tab-view')

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#pendingApproval">Chờ phê duyệt</a></li>
  <li><a data-toggle="tab" href="#accepted">Đã chấp nhận</a></li>
</ul>

<br />


<div class="tab-content">
  <div id="pendingApproval" class="tab-pane active">
    <table class="table">
    	<thead>
    		<th>Mã học viên</th>
    		<th>Họ và tên</th>
    		<th>Email</th>
    		<th>Tên đề tài</th>
    		<th></th>
    	</thead>
    	<tbody>
    		@foreach($pending as $p)
    		<tr>
    			<td>{{ $p->mahocvien }}</td>
    			<td>{{ $p->hoten }}</td>
    			<td>{{ $p->email }}</td>
    			<td>{{ $p->tendetai }}</td>
    			<td>
    				<button id="accept" class="btn btn-primary">Chấp nhận</button>
    				<button id="reject" class="btn btn-danger reject">Từ chối</button>
    			</td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
  </div>

  <div id="accepted" class="tab-pane">
    <table class="table">
    	<thead>
    		<th>Mã học viên</th>
    		<th>Họ và tên</th>
    		<th>Email</th>
    		<th>Tên đề tài</th>
    	</thead>
    	<tbody>
    		@foreach($accepted as $a)
    		<tr>
    			<td>{{ $a->mahocvien }}</td>
    			<td>{{ $a->hoten }}</td>
    			<td>{{ $a->email }}</td>
    			<td>{{ $a->tendetai }}</td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
  </div>

</div>

@endsection
