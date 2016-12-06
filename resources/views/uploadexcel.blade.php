<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
    </head>
    <body>
        
        <form id="form-upload" method="post" action="upload" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="file" name="excel" id="select-file"/>
            <input type="submit" value="Upload" id="submit-upload"/>
        </form>

        <div id="result">
        </div>
    </body>

    <script type="text/javascript">
        $('#form-upload').ajaxForm({
            complete: function(xhr) {
              // Add response text to div #result
              $('#result').html(xhr.responseText);
            }
          });
    </script>
</html>