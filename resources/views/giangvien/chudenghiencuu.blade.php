@extends('giangvien')

@section('tab-view')

<div id="chudenghiencuu">

	<h3>Các chủ đề nghiên cứu</h3>

	<div class="row">
		<div class="col-md-2 col-md-offset-10">
			<button id="goto-themchude" class="btn btn-primary">thêm chủ đề</button>
		</div>
	</div>

	<div id="pendingApproval" class="tab-pane active">
	    <table class="table" id="bangchude">
	    	<thead>
	    		<th>Chủ đề nghiên cứu</th>
	    	</thead>
	    	<tbody>
	    		@foreach($chudenghiencuu as $c)
	    		<tr>
	    			<td class="col-md-10 col-sm-9 col-xs-8 chu">{{ $c->tenchude }}</td>
	    			<td>
	    				<button machude="{{ $c->id }}" class="suachude btn btn-primary">Sửa</button>
	    				<button machude="{{ $c->id }}" class="xoachude btn btn-danger">Xóa chủ đề</button>
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


		<!-- Sửa chủ đề -->
		<div class="modal fade" id="modalAddGroup" role="dialog">
		    <div class="modal-dialog modal-lg">
		    	<div class="modal-content">
		        	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h2 class="modal-title">Thêm chủ đề</h2>
			        </div>
			        <div class="modal-body">
			        	<form id="form-chude" class="form-horizontal" method="post" action="chudenghiencuu/themchude" enctype="multipart/form-data">
		  					{{ csrf_field() }}
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
		        		<button type="button" id="themchude" class="btn btn-primary">Thêm chủ đề</button>
		        		<button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
		        	</div>
		    	</div>
		    </div>
		</div>
  	</div>

</div>

<div id="linhvuclienquan"></div>

@endsection
