<div class="panel panel-blue" id="tabs-1">
	<div class="panel-heading dark-overlay">
		KHÓA HỌC
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<input id="input-khoahoc" type="text" class="form-control input-md" placeholder="Thêm khóa học"/>
			<span class="input-group-btn">
				<button class="btn btn-primary btn-md" id="btn-themkhoahoc">Thêm</button>
			</span>
		</div>
	</div>
	<div class="panel-body">
		<ul class="todo-list">
			<?php $KhoaHoc = DB::table('khoahoc')->get();
				foreach ($KhoaHoc as $khoa): ?>
			<li class="todo-list-item">
				<label> <?php echo $khoa->tenkhoahoc; ?> </label>
				<div class="pull-right action-buttons">
					<a makhoahoc="<?php echo $khoa->id; ?>" class="trash btn-xoakhoahoc"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use>
					</svg></a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>