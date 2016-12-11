<h3>Danh sách giảng viên</h3>
<div>
    <table class="table table-responsive table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã giảng viên</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Đơn vị</th>
        </tr>
    </thead>
    <tbody>
    @foreach($giangvien as $gv)
        <tr>
            <td>{{ $gv->magiangvien }}</td>
            <td>{{ $gv->hoten }}</td>
            <td>{{ $gv->email }}</td>
            <td>{{ $gv->donvi }}</td>
        </tr>
    </tbody>
    @endforeach

    </table>
</div>
<div class="row center">
  {!! $pagination !!}
</div>

