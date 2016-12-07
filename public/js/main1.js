$(document).ready(function(){

	$('body').on('change','.file' , function(){
		console.log("test");
	});

	$('#form-upload').ajaxForm({
	    complete: function(xhr) {
	      // Add response text to div #result
	//      $('#result').html(xhr.responseText);
			$('#danhsachgiangvien').html(xhr.responseText);
	    }
	});

});

function validateUploadForm(self) {
	var file = document.getElementsByClassName('file')[0].value;
	if (file == '') {
		alert("chua chon file");
		return false;
	}else {
		var fileExt = file.split('.').pop();
		if (fileExt != 'xlsx' && fileExt != 'xls') {
			alert("Không phải file excel");
			return false;
		}
	}

	return true;
}