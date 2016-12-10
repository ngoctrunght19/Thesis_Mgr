<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<button id='btn'>hello</button>
<div id="result">
	
</div>

<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.0.min.js') }}"></script>

<script type="text/javascript">
	//them khoa hoc
$(document).ready(function(){

	//đỡ thêm token nhiều lần
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$("#btn").click(function(event) {
		/* Act on the event */
		var tenkhoahoc = 'hello';
	//	console.log(tenkhoahoc);
		$.ajax({
	        url : "test", // gửi ajax đến url
	        type : "post", // chọn phương thức gửi là post
	        dateType:"text", // dữ liệu trả về dạng text
			data : { // Danh sách các thuộc tính sẽ gửi đi
			    khoahoc : tenkhoahoc
			},
	        success : function (result){
	            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
	//            $("#input-khoahoc").val("");
	//            $( "#list-khoahoc" ).html(result);
				var data = $.parseJSON(result);
				console.log(result);
				console.log(data);
				var tree = createTree(data);
				console.log(tree);
				$( "#result" ).html(tree);
	        }
		});
		
	});

});

function createTree(list=null, parent_id=null) {
	var html = '<ul>';
	for(var i = 0; i < list.length; i++){
		if(list[i]['parent_id'] == parent_id){
		    html += '<li id='+ list[i]['id'] +'>'+ list[i]['name'] + createTree(list, list[i]['id']) + '</li>';
		}
	}
//	console.log(html);
	html += '</ul>';
	if ( html.indexOf('</li>')==-1){
		console.log('here');
		console.log(html);
		html = '';
	}
	return html;
}

</script>

</body>
</html>

