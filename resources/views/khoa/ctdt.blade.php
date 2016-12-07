<div class="panel panel-blue" id="tabs-2">
	<div class="panel-heading dark-overlay">
		CHƯƠNG TRÌNH HỌC
	</div>
	<div class="panel-footer">
		<div class="input-group">
			<input id="input-nganh" type="text" class="form-control input-md" placeholder="Thêm chương trình học" />
			<span class="input-group-btn">
				<button class="btn btn-primary btn-md" id="btn-themnganh">Thêm</button>
			</span>
		</div>
	</div>
	<div class="panel-body">
		<ul class="todo-list">
			<?php $NganhHoc = DB::table('nghanhhoc')->get();
				foreach ($NganhHoc as $nganh): ?>
			<li class="todo-list-item">
				<label> <?php echo $nganh->tennganh; ?> </label>
				<div class="pull-right action-buttons">
					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>