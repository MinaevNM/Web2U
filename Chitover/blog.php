<!DOCTYPE html>
<form action='index.php' method='post' name='tophp'>
<input type=hidden name=idr id=idr value=''>
</form>
<script language="javascript" type="text/javascript"> 
function formtoindex(id)
{
 var f = document.forms['tophp'];
 document.getElementById('idr').value=id;
 f.submit();
}
</script>
<?php
$id=$_POST['idb'];
if(!isset($_COOKIE['idg']) || $_COOKIE['idg'] == 0)
 setcookie("idg",$id);
$addr=$_SERVER['HTTP_HOST'];
if($id)
 header("Location: http://".$addr."/reader1/wordpress/index.php");
else
{
 $id=$_COOKIE['idg'];
 setcookie("idg",0);
 echo "<script type=\"text/javascript\"> formtoindex(".$id.");</script>";
}
?>