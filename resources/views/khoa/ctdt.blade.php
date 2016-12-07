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
			<?php $NganhHoc = DB::table('nganhhoc')->get();
				foreach ($NganhHoc as $nganh): ?>
			<li class="todo-list-item">
				<label> <?php echo $nganh->tennganh; ?> </label>
				<div class="pull-right action-buttons">
					<a manganh="<?php echo $nganh->id; ?>" class="trash btn-xoanganh"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use>
					</svg></a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>