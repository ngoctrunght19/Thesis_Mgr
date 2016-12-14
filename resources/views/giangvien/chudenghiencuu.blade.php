@extends('giangvien')

@section('tab-view')

<div id="chudenghiencuu">
	<h3>Các chủ đề nghiên cứu</h3>

	<div id="pendingApproval" class="tab-pane active">
	    <table class="table" id="bangchude">
	    	<thead>
	    		<th>Chủ đề nghiên cứu</th>
	    	</thead>
	    	<tbody>
	    		@foreach($chudenghiencuu as $c)
	    		<tr>
	    			<td class="col-md-10">{{ $c->tenchude }}</td>
	    			<td>
	    				<button machude="{{ $c->id }}" id="accept" class="btn btn-primary">Sửa</button>
	    				<button machude="{{ $c->id }}" id="reject" class="btn btn-danger">Xóa chủ đề</button>
	    			</td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
		
		<br/>


	    <form id="form-chude" class="form-horizontal" method="post" action="chudenghiencuu/themchude" enctype="multipart/form-data">
		  {{ csrf_field() }}
		  	<div>
		  		<label>Nhập chủ đề nghiên cứu:</label>
		  	</div>
		    <div class="form-group">
				<div class="col-sm-8">
					<textarea class="form-control" rows="4" id="chude" name="chude" required="" oninvalid="this.setCustomValidity('Chưa nhập chủ đề')" oninput="setCustomValidity('')"></textarea>
				</div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-9">
		        <button type="submit" class="btn btn-primary">Thêm chủ đề</button>
		      </div>
		    </div>

		    <div class="error"></div>
		</form>

		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalAddGroup">Thêm chủ đề</button>

		<!-- Modal -->
		<!-- Modal Add Group -->
		<div class="modal fade" id="modalAddGroup" role="dialog">
		    <div class="modal-dialog modal-lg">
		    	<div class="modal-content">
		        	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h2 class="modal-title">Thêm chủ đề</h2>
			        </div>
			        <div class="modal-body">
			        	<form class="form" id="addGroup" method="post" action="">
			        		<div class="">
								<label class="detail-label">Chủ đề: </label>
							</div>
							<div class="row">
								<div class="col-md-12">
									<textarea class="form-control" rows="4" id="chude" name="chude" required="" oninvalid="this.setCustomValidity('Chưa nhập chủ đề')" oninput="setCustomValidity('')"></textarea>
								</div>
							</div>
						</form>
			        </div>
		        	<div class="modal-footer">
		        		<button type="button" class="btn btn-primary">Thêm chủ đề</button>
		        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
		        	</div>
		    	</div>
		    </div>
		</div>
  	</div>

</div>

<div id="linhvuclienquan"></div>

@endsection
