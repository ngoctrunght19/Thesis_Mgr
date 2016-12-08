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
	        url : "khoahoc", // gửi ajax đến file result.php
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
	        data : { // Danh sách các thuộc tính sẽ gửi đi
	             khoahoc : tenkhoahoc
	        },
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	            // đó vào thẻ div có id = result
	            window.location.replace("khoahoc");// chua biet ajax kieu gi
	        }
    	});
		
	});

	//thêm ngành
	$("#btn-themnganh").click(function(event) {
		/* Act on the event */
		var tennganh = $('#input-nganh').val();
		console.log(tennganh);
		url = "khoa/" + tennganh + "/themNganh";
		$.get(url, function(data, status){
				console.log("done");
				var newDoc = document.open("text/html", "replace");
				newDoc.write(data);
				newDoc.close();
		});
		
	});

	//xoa khoa hoc
	$(".btn-xoakhoahoc").each(function () {
		this.addEventListener("click", function() {
		/* Act on the event */
			var makhoahoc = $(this).attr("makhoahoc");
			console.log(makhoahoc);
			url = "khoa/" + makhoahoc + "/xoaKhoaHoc";
			$.get(url, function(data, status){
					console.log("done");
					var newDoc = document.open("text/html", "replace");
					newDoc.write(data);
					newDoc.close();
			});
		});
	});

	//xoa nganh
	$(".btn-xoanganh").each(function () {
		this.addEventListener("click", function() {
		/* Act on the event */
			var manganh = $(this).attr("manganh");
			console.log(manganh);
			url = "khoa/" + manganh + "/xoaNganh";
			$.get(url, function(data, status){
					console.log("done");
					var newDoc = document.open("text/html", "replace");
					newDoc.write(data);
					newDoc.close();
			});
		});
	});

	
});