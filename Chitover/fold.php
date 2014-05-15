<!DOCTYPE html>
<?php
$id=$_GET['id'];
$dir='/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/'.$id;
$i=0;
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
	    if ($file === '.' || $file === '..') continue;
        $books[$i]=$file; $i++;
    }
    closedir($handle); 
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<link href="lib.css" rel="stylesheet">
</head>

<table><tr>
 <td><div id="logo"><a href="index.php"><img src="images/chitover_logo.jpg" border="0" ></a></div></td>
 <td width="80%" align="right" valign="top"><div id="topright_menu">
  <ul>
   <li><a href="entr.htm"><img src="images/entr.jpg" border="0"></a></li>
   <li><a href="info.htm"><img src="images/info.jpg" border="0"></a></li>
   <li><a href="refer.htm"><img src="images/zoom.jpg" border="0"></a></li>
   <li><a href="./phpBB3/index.php"><img src="images/forum.jpg" border="0"></a></li>
   <li><a id="alib"><img src="images/lib.jpg" border="0"></a></li>
   <li><a href="./wordpress/wp-admin"><img src="images/bl.jpg" border="0"></a></li>
   <li><a href="face.php"><img src="images/face.jpg" border="0"></a></li>
  </ul>
 </div></td>
 </tr></table>


<div id="form">
<p><b>Перечень загруженных книг</b></p><br>
<table id="bookslist">
<?php if ($id > 0) { echo "<script language='javascript' type='text/javascript'>document.getElementById('alib').href='lib.php?id=".$id."';</script>"; ?>
<?php for($i=0;$i<sizeof($books);$i++) { ?>
<?php echo '<tr id="books_tr"><td>'.$books[$i].'</td></tr>' ?>
<?php } ?>
<?php } else {?>
<?php echo "Сначала зарегистрируйтесь" ?>
<?php } ?>
</table>
</div>

</html>