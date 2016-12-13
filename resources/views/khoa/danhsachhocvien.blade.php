<h3>Danh sách học viên</h3>
<div>
    <table class="table table-responsive table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã học viên</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Ngành học</th>
            <th>Khóa học</th>
            <th>Tình trạng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hocvien as $h)
        <tr>
            <td>{{ $h->mahocvien }}</td>
            <td>{{ $h->hoten }}</td>
            <td>{{ $h->email }}</td>
            <td>{{ $h->nganhhoc }}</td>
            <td>{{ $h->khoahoc }}</td>
            <td>{{ $h->duocangky }}</td>
        </tr>
    </tbody>
    @endforeach

    </table>
</div>
<div class="row center">
  {!! $pagination !!}
</div>
