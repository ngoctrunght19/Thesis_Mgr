$(document).ready(function(){

	$('body').on('change','.file' , function(){
		console.log("test");
	});

	$('#form-upload').ajaxForm({
	    complete: function(xhr) {
	//      $('#result').html(xhr.responseText);
			$('#danhsachgiangvien').html(xhr.responseText);
	    }
	});

	$('#active').ajaxForm({
	    complete: function(xhr) {
	//      $('#result').html(xhr.responseText);
			$('#rp-error').html(xhr.responseText);
	    }
	});

	$("#select-file").change(function(){
    	var file = $(this).val();
    	if (isExcelFile(file)) {	
    		$('#uploadLecturer .form-error').html("&nbsp;");
		}
		else {
			$('#uploadLecturer .form-error').html("Không phải file excel!");
		}
	});

	$("#active #re-password").keyup(function(event) {
		var p = $("#active #password").val();
		var rp = $("#active #re-password").val();
		if (p != rp) {
			$("#active #rp-error").html('Mật khẩu nhập lại chưa khớp');
		}
		else {
			$("#active #rp-error").html('&nbsp;');
		}
	});

});

function validateActive() {
	var p = document.getElementById("password").value;
	var rp = document.getElementById("re-password").value;
	if (p != rp) {
		$("#active #rp-error").html('Mật khẩu nhập lại chưa khớp');
		return false;
	}
	else {
		$("#active #rp-error").html('&nbsp;');
		return true;
	}
}


function validateUploadForm(self) {
	var file = document.getElementsByClassName('file')[0].value;
	if (file == '') {
		$('#uploadLecturer .form-error').html("Chưa chọn file!");
		return false;
	}
	else if (!isExcelFile(file)) {
		$('#uploadLecturer .form-error').html("Không phải file excel!");
		return false;
	}

	// la phai excel
	$('#uploadLecturer .form-error').html("");
	return true;
}

// kiểm tra file có phải file excel hay ko
// $file: tên file hoặc đường dẫn tới file
function isExcelFile(file) {
	var fileExt = file.split('.').pop();
	if (fileExt != 'xlsx' && fileExt != 'xls') {
		return false;
	}
	else {
		return true;
	}
}