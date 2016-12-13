@extends('hocvien')

@section('tab-view')

<div>
	<h1>Lĩnh vực & Chủ đề nghiên cứu</h1>
  <ul class="nav menu" id="item-linhvuc">
    @foreach ($linhvuc as $l)
    <li class="">
      <a data-toggle="collapse" href="#item-{{ $l->id }}">{{ $l->tenlinhvuc }}</a>
      <ul class="nav collapse deeper" id="item-{{ $l->id }}">
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

@endsection
