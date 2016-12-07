@if( !empty($info) )
    {{ $info }}
@endif

<h3>Danh sách giảng viên</h3>

<table class="table">
    <thead>
      <tr>
        <th>Mã giảng viên</th>
        <th>Họ và tên</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    @foreach($giangvien as $gv)
      <tr>
        <td>{{ $gv->magiangvien }}</td>
        <td>{{ $gv->hoten }}</td>
        <td>{{ $gv->email }}</td>
      </tr>
    </tbody>
    @endforeach

</table>