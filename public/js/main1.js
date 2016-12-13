$(document).ready(function(){

	$('body').on('change','.file' , function(){
		console.log("test");
	});

	$('#uploadLecturer #form-upload').ajaxForm({
	    complete: function(xhr) {
	    	console.log("hihi");
	    	console.log('hihi: ' + xhr.responseText);
	      $('#uploadLecturer #upload-result').html(xhr.responseText);
	    }
	});


	$('#uploadLecturer #type-lecturer').ajaxForm({
	    complete: function(xhr) {
	//      $('#result').html(xhr.responseText);
			$('#uploadLecturer #type-result').html(xhr.responseText);
	    }
	});


	$('#uploadStudent #form-upload').ajaxForm({
	    complete: function(xhr) {
	    	console.log('hihi: ' + xhr.responseText);
	      	$('#upload-result').html(xhr.responseText);
	    }
	});

	$('#uploadStudent #type-student').ajaxForm({
	    complete: function(xhr) {
	//      $('#result').html(xhr.responseText);
			$('#uploadStudent #type-result').html(xhr.responseText);
	    }
	});
	

	$("#select-file").change(function(){
    	var file = $(this).val();
    	if (isExcelFile(file)) {	
    		$('.form-error').html("&nbsp;");
		}
		else {
			$('.form-error').html("Không phải file excel!");
		}
	});

	$('#active').ajaxForm({
	    success: function(xhr) {
	//      $('#result').html(xhr.responseText);
			$('#rp-error').html(xhr.responseText);
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

$(document).on('click', '.pagination li:not(.active):not(.disabled) a',function(){
	var url = $(this).attr('url');
	var self = $(this);
	
	$.ajax({
        url : url, // gửi ajax đến url
        type : "get", // chọn phương thức gửi là post
        dateType:"text", // dữ liệu trả về dạng text
        context: this,
        success : $.proxy(function (result){

        	if ($('#danhsachgiangvien').has(self)) {
				$( "#danhsachgiangvien" ).html(result);
			}
        }, self)
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
	$('#uploadLecturer #upload-result').html("");
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