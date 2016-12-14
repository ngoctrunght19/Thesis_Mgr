$(document).ready(function(){

	$('body').on('change','.file' , function(){
		console.log("test");
	});

	$('.submit').click( function(){
//		$(this).addClass('disabled')
	});

	$('#uploadLecturer #form-upload').ajaxForm({
	    complete: function(xhr) {
			$('#uploadLecturer #upload-result').html(xhr.responseText);
			$('#uploadLecturer .submit').removeClass('disabled')
	    }
	});


	$('#type-lecturer').ajaxForm({
	    complete: function(xhr) {
			$('#uploadLecturer #type-result').html(xhr.responseText);
			$('#type-lecturer .submit').removeClass('disabled')
	    }
	});


	$('#uploadStudent #form-upload').ajaxForm({
	    complete: function(xhr) {
	      	$('#upload-result').html(xhr.responseText);
	      	$('#uploadStudent .submit').removeClass('disabled')
	    }
	});

	$('#type-student').ajaxForm({
	    complete: function(xhr) {
			$('#typestudent #result').html(xhr.responseText);
			$('#type-student .submit').removeClass('disabled')
	    }
	});

	$('#type').ajaxForm({
	    complete: function(xhr) {
	    	console.log(xhr.responseText);
			$('#type .result').html(xhr.responseText);
			$('#type .submit').removeClass('disabled')
	    }
	});
	

	$("#select-file").change(function(){
    	var file = $(this).val();
    	if (isExcelFile(file)) {	
    		$('.form-error').html("");
		}
		else {
			$('.form-error').html("Không phải file excel!");
		}
	});

	$('#active').ajaxForm({
	    success: function(xhr) {
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


	$('#dudieukien #upload #form-upload').ajaxForm({
	    complete: function(xhr) {
	      	$('#upload-result').html(xhr.responseText);
	      	$('#dudieukien #upload .submit').removeClass('disabled')
	    }
	});

});

$(document).on('click', '#danhsachgiangvien .pagination li:not(.active):not(.disabled) a',function(){
	var url = $(this).attr('url');
	
	$.ajax({
        url : url, // gửi ajax đến url
        type : "get", // chọn phương thức gửi là post
        dateType:"text", // dữ liệu trả về dạng text
        context: this,
        success : function(result) {
			$( "#danhsachgiangvien" ).html(result);
		}
	});
});


$(document).on('click', '#danhsachhocvien .pagination li:not(.active):not(.disabled) a',function(){
	var url = $(this).attr('url');
	
	$.ajax({
        url : url, // gửi ajax đến url
        type : "get", // chọn phương thức gửi là post
        dateType:"text", // dữ liệu trả về dạng text
        context: this,
        success : function(result) {
			$( "#danhsachhocvien" ).html(result);
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
		$('#form-upload .form-error').html("Chưa chọn file!");
		return false;
	}
	else if (!isExcelFile(file)) {
		$('#form-upload .form-error').html("Không phải file excel!");
		return false;
	}

	// la phai excel
	$('#form-upload .form-error').html("");
	$('#form-upload #upload-result').html("Đang gửi yêu cầu");
	$('#form-upload .submit').addClass('disabled');
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