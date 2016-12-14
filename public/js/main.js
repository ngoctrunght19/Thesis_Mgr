$(document).ready(function(){

	//đỡ thêm token nhiều lần
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	//them khoa hoc
	$("#btn-themkhoahoc").click(function(event) {
		/* Act on the event */
		var tenkhoahoc = $('#input-khoahoc').val();
		tenkhoahoc = tenkhoahoc.trim();
		if (tenkhoahoc == '')
			return;
		console.log(tenkhoahoc);
		$.ajax({
	        url : "themkhoahoc", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             khoahoc : tenkhoahoc
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            $("#input-khoahoc").val("");
	            $( "#list-khoahoc" ).html(result);
	        }
    	});

	});

	//thêm ngành
	$("#btn-themnganh").click(function(event) {
		/* Act on the event */
		var tennganh = $('#input-nganh').val();
		tennganh = tennganh.trim();
		if (tennganh == '')
			return;
		console.log(tennganh);
		$.ajax({
	        url : "themnganh", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             nganh : tennganh
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            $("#input-nganh").val("");
	            $( "#list-nganh" ).html(result);
	        }
    	});

	});

	//xoa khoa hoc
	$('body').on('click', '.btn-xoakhoahoc', function () {
		var makhoahoc = $(this).attr("makhoahoc");
		console.log(makhoahoc);
		$.ajax({
	        url : "xoakhoahoc", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             id : makhoahoc
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            $( "#list-khoahoc" ).html(result);
	        }
    	});
	});

	//xoa nganh
	$('body').on('click', '.btn-xoanganh', function () {
		var manganh = $(this).attr("manganh");
		console.log(manganh);
		$.ajax({
	        url : "xoanganh", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             id : manganh
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            $( "#list-nganh" ).html(result);
	        }
    	});
	});

	//dang ky de tai
	$('#form-detai').ajaxForm({
	    complete: function(xhr) {
	    	var html = "<h3>" + xhr.responseText + "</h3>";
	      $('#detai-result').html(html);
	    }
	});

	$(".btn-xoadetai").click(function(event) {
		alert("Xoa");
	});

	$(".btn-suadetai").click(function(event) {
		alert("Sua");
	});

	//cập nhật thông tin giảng viên
	$('#edit-info-gv').ajaxForm({
	    complete: function(xhr) {
	    	alert("cap nhat thanh cong");
	    }
	});

	//chấp nhận
	$('#accept').click(function(event) {
		var madetai = $(this).attr('madetai');
		//console.log(madetai);
		$.ajax({
	        url : "detaikhoaluan/chapnhan", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             id : madetai
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            console.log(result);
	            $("#de-tai").html(result);
	            // $( "#list-khoahoc" ).html(result);
	        }
    	});
	});

	//từ chối
	$('#reject').click(function(event) {
		var madetai = $(this).attr('madetai');
		//console.log(madetai);
		$.ajax({
	        url : "detaikhoaluan/tuchoi", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             id : madetai
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            console.log(result);
	            $("#de-tai").html(result);
	            // $( "#list-khoahoc" ).html(result);
	        }
    	});
	});

	//mở đóng đăng ký
	$('#open-close').click(function() {
		//console.log(madetai);
		$.ajax({
	        url : "modongdk", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
				
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            console.log(result);
	            $('#open-close span').html(result);
	            // $( "#list-khoahoc" ).html(result);
	        }
    	});
	});

	//rút đề tài
	$('#rut-de-tai').click(function() {
		var madetai = $(this).attr('madetai');
		console.log(madetai);
		$.ajax({
	        url : "rutdetai", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
				id: madetai
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            var html = "<h3>" + result + "</h3>";
	      		$('#detai-result').html(html);
	        }
    	});
	});

	//thêm thông báo
	$('#rut-de-tai').click(function() {
		var madetai = $(this).attr('madetai');
		console.log(madetai);
		$.ajax({
	        url : "rutdetai", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
				id: madetai
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            var html = "<h3>" + result + "</h3>";
	      		$('#detai-result').html(html);
	        }
    	});
	});

});
