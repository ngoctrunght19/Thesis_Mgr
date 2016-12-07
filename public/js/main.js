$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$( function() {
    $( "#tabs" ).tabs();
});

//them khoa hoc
$("#btn-themkhoahoc").click(function(event) {
	/* Act on the event */
	var tenkhoahoc = $('#input-khoahoc').val();
	$.ajax({
		url: 'khoa/addKhoaHoc',
		type: 'post',
		dataType: 'text',
		data: {
			khoahoc : tenkhoahoc
		},
		success : function (result){
            window.location = 'khoa';
        }
	});
	
});

$("#btn-themnganh").click(function(event) {
	/* Act on the event */
	$.ajax({
		url: 'khoa/addNganh',
		type: 'post',
		dataType: 'text',
		data: {
			nganh : $('#input-nganh').val()
		},
		success : function (result){
            window.location = 'khoa';
        }
	})
	
});