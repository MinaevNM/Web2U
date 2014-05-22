<html>
<head>
  <title>Результат загрузки файла</title>
</head>
<body>
<form action='lib.php' method='post' name='tophp'>
<input type=hidden name=idl id=idl value=''>
</form>
<script language="javascript" type="text/javascript"> 
function formtoindex(id)
{
 var f = document.forms['tophp'];
 document.getElementById('idl').value=id;
 f.submit();
}
</script>
<?php
$addr=$_SERVER['HTTP_HOST'];
$id=$_POST['idu'];
$file_name = $_FILES['f']['name'];
//$file_type = $_FILES['f']['type'];
//$file_size = $_FILES['f']['size'];
$file_path = $_FILES['f']['tmp_name'];

move_uploaded_file($file_path, "/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/".$id."/".$file_name);
echo "<script type=\"text/javascript\"> formtoindex(".$id.");</script>";
?>
</body>
</html>