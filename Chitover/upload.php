<html>
<head>
  <title>Результат загрузки файла</title>
</head>
<body>
<?php
$addr=$_SERVER['HTTP_HOST'];
$id=$_GET['id'];
$file_name = $_FILES['f']['name'];
$file_type = $_FILES['f']['type'];
$file_size = $_FILES['f']['size'];
$file_path = $_FILES['f']['tmp_name'];
move_uploaded_file($file_path, "/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/".$id."/".$file_name);
$str="Location: http://".$addr."/reader1/lib.php?id=".$id;
header($str);
?>
</body>
</html>