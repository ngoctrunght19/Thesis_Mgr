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
	url = "khoa/" + tenkhoahoc + "/themKhoaHoc";
	$.get(url, function(data, status){
			console.log("done");
			var newDoc = document.open("text/html", "replace");
			newDoc.write(data);
			newDoc.close();
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