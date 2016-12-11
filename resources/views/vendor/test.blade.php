<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
</head>
<body>

<button id='btn'>hello</button>
<div id="result">
	
</div>

<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

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

function createTree(list=null, item=null, parent_id=null) {
	var c = "nav ";
	if (parent_id != null) {
		c += "collapse deeper"
		console.log("parent not null: " + parent_id);
	}
	else 
		console.log("parent: " + parent_id);
	var html = '<ul class="'+ c +'" id='+item+'>';
	for(var i = 0; i < list.length; i++){
		if(list[i]['parent_id'] == parent_id){
			item = list[i]['id'];
		    html += '<li><a data-toggle="collapse" href="#'+ item +'">'+ list[i]['name'] + '</a>' + createTree(list, item, list[i]['id']) + '</li>';
		}
	}

	html += '</ul>';
	if ( html.indexOf('</li>')==-1){
		html = '';
	}
	return html;
}

</script>

</body>
</html>

