<button>Thêm giảng viên</button> <br />
<form method="GET" action="addGV">
    <label>Chọn tệp</label><input type="file" name="filename" accept=".xls,.xlsx">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="submit" value="Thêm giảng viên">
</form>
<table class="table">
    <thead>
      <tr>
        <th>Họ và tên</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
</table>