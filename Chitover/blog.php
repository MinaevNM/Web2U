<?php

$id=$_GET['id'];
if(!isset($_COOKIE['idg']) || $_COOKIE['idg'] == 0)
 setcookie("idg",$id);
$addr=$_SERVER['HTTP_HOST'];
if($id)
 header("Location: http://".$addr."/reader1/wordpress/index.php");
else
{
 $id=$_COOKIE['idg'];
 setcookie("idg",0);
 header("Location: http://".$addr."/reader1/index.php?id=".$id); 
}
?>