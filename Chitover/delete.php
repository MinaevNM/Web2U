<!DOCTYPE html>
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
 $id=$_POST['idd'];
 $file_name=$_POST['fnd'];
 $dir='/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/'.$id."/".$file_name;
 unlink($dir);
 echo "<script type=\"text/javascript\"> formtoindex(".$id.");</script>";
?>

