<div id="tabs-3">
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h1>Lĩnh vực & Chủ đề nghiên cứu</h1>
					<div class="panel-body">
            <ul class="nav menu" id="item-linhvuc">
              @foreach ($linhvuc as $l)
              <li class="">
                <a data-toggle="collapse" href="#item-{{ $l->id+1000 }}">{{ $l->tenlinhvuc }}</a>
                <ul class="nav  collapse deeper" id="item-{{ $l->id+1000 }}">
                  @foreach ($cdnc as $c)
                    @if($c->linhvuc == $l->id)
                      <li class="">
                        <a href="#">{{ $c->tenchude }}</a>
                      </li>
                    @endif
                  @endforeach
                </ul>
              </li>
              @endforeach
            </ul>
					</div>
				</div>
			</div>
		</div><!--/.row-->
</div>
