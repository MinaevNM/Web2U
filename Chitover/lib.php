<!DOCTYPE html>
<?php
$id=$_GET['id'];
$dir='/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/'.$id;
if(!is_dir($dir))
 {mkdir($dir);}
$i=0;
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
	    if ($file === '.' || $file === '..') continue;
        $books[$i]=$file; $i++;
    }
    closedir($handle); 
}
?>
<script language="javascript" type="text/javascript">
function choose()
{
choosefile.style.display = 'block';
}
</script>
<html>
<head>
	<meta charset="utf-8" />
	<link href="lib.css" rel="stylesheet">
</head>


<!--<form style="display:none" id="choosefile" method="get">
 <div id="choosefile" style="display:none"><p><input  type="file" name="f" id="fid" size="50">
 <input type="submit" value="Отправить" onclick="loadfile()"></p></div>-->
<!--</form> -->
 <form action="upload.php?id=<?php echo $id ?>" style="display:none" id="choosefile" method="post" enctype="multipart/form-data">
 <p><input  type="file" name="f" id="fid" size="50">
 <input type="submit" value="Отправить" ></p>
</form>  
<table><tr>
 <td><div id="logo"><a href="index.php"><img src="images/chitover_logo.jpg" border="0">
</a></div></td>
 <td width="80%" align="right" valign="top"><div id="topright_menu">
  <ul>
   <li><a href="entr.htm"><img src="images/entr.jpg" border="0"></a></li>
   <li><a href="info.htm"><img src="images/info.jpg" border="0"></a></li>
   <li><a href="refer.htm"><img src="images/zoom.jpg" border="0"></a></li>
   <li><a href="forum.htm"><img src="images/forum.jpg" border="0"></a></li>
   <li><a href="lib.php"><img src="images/lib.jpg" border="0"></a></li>
   <li><a href="plus.htm"><img src="images/plus.jpg" border="0"></a></li>
   <li><a href="face.php"><img src="images/face.jpg" border="0"></a></li>
  </ul>
 </div></td>
 </tr></table>

<div id="menu" align="center" >
<ul><table width="100%" ><tr><td width="50%" align="center">
 <li><a href="javascript: dan();">Личные данные</a></li></td>
 <td width="50%" align="center"><li><a href="#">Библиотека</a></li></td>
</ul></tr></table>
</div>
<hr id="hr">
<div id="logomini" ><a href="index.php"><img src="images/chitover_logomini.jpg" border="0" ></a></div>
<div id="text">- это универсальная программа для чтения книг в новом формате. Чтобы загрузить книгу, просто выберите файл.
</div>
<button id="select" onclick="choose()">Выберите файл</button>
<input id="selection"> </input>
<!--<button id="read" onclick="read()">Приступить к чтению</button>-->
<div id="form">
<p><b>Перечень загруженных книг</b></p><br>

<table id="bookslist">
<?php for($i=0;$i<sizeof($books);$i++) { ?>
<?php if($i == 0) echo '<tr><td></td><td>Удалить</td><td></td></tr>'; ?>
<?php echo '<tr id="books_tr"><td>'.$books[$i].'</td><td align="center"><button id="cross" onmouseover="redcross()" onmouseout="blackcross()" onclick="deletebook(this)">X</button></td><td><button onclick="readbook('.$i.')">Читать</button></td></tr>' ?>
<?php } ?>
</table>

</div>


<script language="javascript" type="text/javascript"> 
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
 //window.location.href="http://"+window.location.host+"/reader1/facedata.php?change=0&id=<?php echo $id ?>";
 /*alert(r.parentNode.parentNode.rowIndex);
 document.getElementById("bookslist").deleteRow(r.parentNode.parentNode.rowIndex);*/
}
function dan()
{
 window.location.href="http://"+window.location.host+"/reader1/facedata.php?change=0&id=<?php echo $id ?>";
}
function read()
{
 fileName=document.getElementById("fid").value;
// alert(fileName);
 var pos = fileName.lastIndexOf("\\");
 fileName = fileName.substr(pos+1);
 window.location.href="http://"+window.location.host+"/reader1/index.php?id=<?php echo $id ?>&b="+fileName;
 
}
function readbook(num)
{
 table=document.getElementById("bookslist");
 fileName=table.rows[num+1].cells[0].innerHTML;
 href="http://"+window.location.host+"/reader1/index.php?id=<?php echo $id ?>&b="+fileName;
 window.location.href=href;
 
 }
function loadfile()
{
 fileName=document.getElementById("fid").value;
 var pos = fileName.lastIndexOf("\\");
 fileName = fileName.substr(pos+1);
 document.getElementById("selection").value = fileName;
 choosefile.style.display = 'none';
 newRow=document.getElementById("bookslist").insertRow(1);
 var newCell = newRow.insertCell(0);
 newCell.innerHTML=fileName;
}
</script>
</html>