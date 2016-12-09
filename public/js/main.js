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

	
});