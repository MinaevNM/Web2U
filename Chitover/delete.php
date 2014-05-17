<!DOCTYPE html>
<?php
 $id=$_GET['id'];
 $file_name=$_GET['filename'];
 $dir='/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/'.$id."/".$file_name;
 unlink($dir);
 $addr=$_SERVER['HTTP_HOST'];
 header("Location: http://".$addr."/reader1/lib.php?id=".$id);
?>

