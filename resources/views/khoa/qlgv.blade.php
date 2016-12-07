<div id="tabs-3">
<button>Thêm giảng viên</button> <br />
<form id="form-upload" method="post" action="upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="file" name="excel" class="file" id="select-file" accept=".xlsx, .xls"/>
    <input type="submit" value="Upload"  id="submit-upload"/>
</form>

<div id="result">
</div>

<div id="danhsachgiangvien">
@include('khoa.danhsachgiangvien')
</div>

</div>