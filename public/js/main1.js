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

	$('#form-chude').submit( function() {
		$('#form-chude').addClass('disabled')
	});

	$('#goto-themchude').click(function() {
		console.log('thllo');
		$('#form-chude #chude').focus();
	});


	$('#form-chude').ajaxForm({
	    complete: function(xhr) {
	    	$('#form-chude').removeClass('disabled')

	      	var responseText = xhr.responseText;
	      	var result = responseText.split("-");
	      	var message = result[0];
	      	console.log(message);
	      
	      	// nếu có lỗi thì in thông báo lỗi và thoát
	      	if (message != 'ok') {
	      		$('#form-chude .error').html(responseText);
	      		return;
	      	}
	      	
	      	var chude = $('#form-chude #chude').val();
	      	var machude = result[1];

	      	var chudemoi = "<tr><td class=\"col-md-10 col-sm-9 col-xs-8 chude\">"+ chude +"</td><td><button machude=\""+machude+"\" id=\"accept\" class=\"btn btn-primary suachude\">Sửa</button><button machude=\""+machude+"\" class=\"xoachude btn btn-danger\">Xóa chủ đề</button></td></tr>";
	      	$('#bangchude tbody').append(chudemoi);
	    	var url      = window.location.href;
	      	$( "#bangchude" ).load( url + " #bangchude" );
	    }
	});

	$('#form-chude').submit(function() {
		$('#form-chude .error').html("");
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

$(document).on('click', '.xoachude',function(){
	var url = $(this).attr('machude');
	
	$.ajax({
        url : chudenghiencuu/xoachude,
        type : "post", 
        dateType:"text", 
        success : function(result) {
        //	if (result != 'OK')
        	alert(result);
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