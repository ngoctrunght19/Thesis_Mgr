<div id="tabs-3">
<button>Thêm giảng viên</button> <br />

<form id="form-upload" method="post" action="upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <label>Thêm giảng viên bằng file excel: </label><input type="file" name="excel" id="select-file" accept=".xlsx, .xls"/>
    <input type="submit" value="Tải lên"  id="submit-upload"/>
</form>

<div id="result">
</div>

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
</div>