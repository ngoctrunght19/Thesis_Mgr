<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        
    <form id="form-upload" method="post" action="upload" onsubmit="return validateUploadForm(this)" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="file" name="excel" class="file" id="select-file" accept=".xlsx, .xls"/>
        <input type="submit" value="Upload"  id="submit-upload"/>
    </form>

    <div id="result">
    </div>
    </body>

	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
    <script type="text/javascript">
		function validateUploadForm(self) {
			var file = document.getElementsByClass('file')[0].value;
			if (file == '') {
				alert("chua chon file");
				return false;
			}else {
				var fileExt = file.split('.').pop();
				if (fileExt != 'xlsx' && fileExt != 'xls') {
					alert("Không phải file excel");
					return false;
				}
				alert("file: " + file);
			}
		}
		
        $('#form-upload').ajaxForm({
            complete: function(xhr) {
              // Add response text to div #result
              $('#result').html(xhr.responseText);
            }
        });
    </script>
</html>