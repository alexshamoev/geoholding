<html>
 
<head>   
 
<!-- 1 -->
    <!-- <link href="css/dropzone.css" type="text/css" rel="stylesheet" /> -->
 
<!-- 2 -->
    <script src="dropzone.min.js"></script>
 
    </head>
 
    <body>
<?php
        $name = 'test[]';
?>
<!-- 3 -->
        {{ Form :: file($name, ['multiple' => "multiple", 'class' => 'dropzone']) }}
        <form action="" method="post">
            <input type="file" name="lasha[]" id="" multiple>

        </form>
    </body>
</html>
