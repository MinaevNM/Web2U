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
 <td><div id="logo"><a href="index.php?id=<?php echo $id ?>"><img src="images/chitover_logo.jpg" border="0" ></a></div></td>
 <td width="80%" align="right" valign="top"><div id="topright_menu">
  <ul>
   <li><a href="index.php?id=0" title="выход"><img src="images/entr.jpg" border="0"></a></li>
   <li><a href="info.php?id=<?php echo $id ?>" title="блог с комментариями и статьями"><img src="images/info.jpg" border="0"></a></li>
   <li><a href="#" title="справка" onclick="refer()"><img src="images/zoom.jpg" border="0"></a></li>
   <li><a href="./phpBB3/index.php" title="форум"><img src="images/forum.jpg" border="0"></a></li>
   <li><a id="alib" title="библиотека"><img src="images/lib.jpg" border="0"></a></li>
   <li><a href="blog.php?id=<?php echo $id ?>" title="блог"><img src="images/bl.jpg" border="0"></a></li>
   <li><a href="face.php?id=<?php echo $id ?>" title="личный кабинет"><img src="images/face.jpg" border="0"></a></li>
  </ul>
 </div></td>
 </tr></table>


<div id="form">
<p><b>Перечень загруженных книг</b></p><br>
<table id="bookslist">
<?php if ($id > 0) { echo "<script language='javascript' type='text/javascript'>document.getElementById('alib').href='lib.php?id=".$id."';</script>"; ?>
<?php for($i=0;$i<sizeof($books);$i++) { ?>
<?php echo '<tr id="books_tr"><td>'.$books[$i].'</td><td align="center"><button id="cross" onmouseover="redcross()" onmouseout="blackcross()" onclick="deletebook(this)">X</button></td><td><button onclick="readbook('.$i.')">Читать</button></td></tr>' ?>
<?php } ?>
<?php } else {?>
<?php echo "Сначала зарегистрируйтесь" ?>
<?php } ?>
</table>
</div>
<script language="javascript" type="text/javascript">
function refer()
{
if(menu_refer.style.visibility == 'hidden')
{
  menu_refer.style.visibility='visible';
 /* var x_begin=document.getElementById("r1").offsetLeft;
  var y_begin=document.getElementById("r1").offsetTop;
  var x_end=document.getElementById("m1").offsetLeft;
  var y_end=document.getElementById("m1").offsetTop;
  var canvas = document.getElementById("canvas");
  var cvs = canvas.getContext("2d");
  cvs.beginPath();
  cvs.moveTo(x_begin,y_begin);
  cvs.lineTo(x_end,y_end);
  cvs.closePath();
  cvs.stroke();
  canvas.style.visibility='visible';*/
}
else
{
  menu_refer.style.visibility='hidden';
 /* var canvas = document.getElementById("canvas"); 
  var cvs = canvas.getContext("2d");
  canvas.style.visibility='hidden';*/
}
}
function redcross()
{
 event.srcElement.style.color="red";
}
function blackcross()
{
 event.srcElement.style.color="black";
}
function deletebook(r)
{
 table=document.getElementById("bookslist");
 fileName=table.rows[r.parentNode.parentNode.rowIndex].cells[0].innerHTML;
 document.getElementById("bookslist").deleteRow(r.parentNode.parentNode.rowIndex);
 window.location.href="http://"+window.location.host+"/reader1/delete.php?id=<?php echo $id ?>&filename="+fileName;
}
function readbook(num)
{
 table=document.getElementById("bookslist");
 fileName=table.rows[num+1].cells[0].innerHTML;
 href="http://"+window.location.host+"/reader1/index.php?id=<?php echo $id ?>&b="+fileName;
 window.location.href=href;
 
 }
</script>        
</html>