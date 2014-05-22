<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href="lib.css" rel="stylesheet">
</head>
<body onload="buttonload()">
<?php
$id=$_POST['idl'];
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
$dir='/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/adm';
$i=0;
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
	    if ($file === '.' || $file === '..') continue;
        $books_adm[$i]=$file; $i++;
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


 <form action="upload.php" style="display:none" id="choosefile" name="choosefile" method="post" enctype="multipart/form-data">
 <p><input  type="file" name="f" id="fid" size="50"><input type=hidden name=idu id=idu value='<?php echo $id ?>'>
 <input type="submit" value="Отправить" ></p>
</form>  
<table><tr>
 <td><div id="logo"><a href="#" onclick="ind()"><img src="images/chitover_logo.jpg" border="0">
</a></div></td>
 <td width="80%" align="right" valign="top"><div id="topright_menu">
  <ul>
  <li id="m1"><a href="#" onclick="exit()" title="выход" ><img src="images/entr.jpg" border="0"></a></li>
  <li><a href="#" onclick="info()" title="блог с комментариями и статьями"><img src="images/info.jpg" border="0"></a></li>
  <li><a href="#" title="справка" onclick="refer()"><img src="images/zoom.jpg" border="0"></a></li>
  <li><a href="./phpBB3/index.php" title="форум"><img src="images/forum.jpg" border="0"></a></li>
  <!--<li><a href="#" onclick="lib()"  title="библиотека"><img src="images/lib.jpg" border="0"></a></li>-->
  <li><button id="mylib" disabled onclick="lib()" title="библиотека" ><img src="images/lib.jpg" border="0"></button></li>
  <li><a href="#" onclick="blog()" title="блог" ><img src="images/bl.jpg" border="0"></a></li>
  <li><a title="личный кабинет" onclick="face()"><img src="images/face.jpg" border="0"></a></li>
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
<div id="logomini" ><a href="#" onclick="ind()"><img src="images/chitover_logomini.jpg" border="0" ></a></div>
<div id="text">- это универсальная программа для чтения книг в новом формате. Чтобы загрузить книгу, просто выберите файл.
</div>
<button id="select" onclick="choose()">Выберите файл</button>
<!--<input id="selection"> </input>
<button id="read" onclick="read()">Приступить к чтению</button>-->
<div id="form">
<p><b>Перечень загруженных книг</b></p><br>

<table id="bookslist">
<?php for($i=0;$i<sizeof($books);$i++) { ?>
<?php if($i == 0) echo '<tr><td></td><td>Удалить</td><td></td></tr>'; ?>
<?php echo '<tr id="books_tr"><td>'.$books[$i].'</td><td align="center"><button id="cross" onmouseover="redcross()" onmouseout="blackcross()" onclick="deletebook(this)">X</button></td><td><button onclick="readbook('.$i.')">Читать</button></td></tr>' ?>
<?php } ?>
</table>

</div>
<div id="form_adm">
<p><b>Книги администратора</b></p><br>

<table id="bookslist_adm">
<?php for($i=0;$i<sizeof($books_adm);$i++) { ?>
<?php echo '<tr id="books_tr_adm"><td>'.$books_adm[$i].'</td><td align="center"><td><button onclick="takebook('.$i.')">Читать</button></td></tr>' ?>
<?php } ?>
</table>

</div>
<form action='index.php' method='post' name='tophpr'>
<input type=hidden name=idr id=idr value=''>
<input type=hidden name=fnr id=fnr value=''>
</form>
<form action='delete.php' method='post' name='tophpd'>
<input type=hidden name=idd id=idd value=''>
<input type=hidden name=fnd id=fnd value=''>
</form>
<form action='facedata.php' method='post' name='tophpfd'>
<input type=hidden name=idfd id=idfd value=''>
<input type=hidden name=fnfd id=fnfd value=''>
</form>
<form action='lib.php' method='post' name='tophp_lib'>
<input type=hidden name=idl id=idl value=''>
</form>
<form action='fold.php' method='post' name='tophp_fold'>
<input type=hidden name=idfo id=idfo value=''>
</form>
<form action='index.php' method='post' name='tophp_exit'>
<input type=hidden name=ide id=ide value=''>
</form>
<form action='info.php' method='post' name='tophp_info'>
<input type=hidden name=idi id=idi value=''>
</form>
<form action='blog.php' method='post' name='tophp_blog'>
<input type=hidden name=idb id=idb value=''>
</form>
<form action='face.php' method='post' name='tophp_face'>
<input type=hidden name=idf id=idf value=''>
</form>

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
 table=document.getElementById("bookslist");
 fileName=table.rows[r.parentNode.parentNode.rowIndex].cells[0].innerHTML;
 document.getElementById("bookslist").deleteRow(r.parentNode.parentNode.rowIndex);
 	var f = document.forms['tophpd'];
    document.getElementById("idd").value = '<?php echo $id ?>';
    document.getElementById("fnd").value = fileName;
    f.submit();
}
function dan()
{
	var f = document.forms['tophpfd'];
    document.getElementById("idfd").value = '<?php echo $id ?>';
    document.getElementById("fnfd").value = 0;
    f.submit();
}
function read()
{
 fileName=document.getElementById("fid").value;
 var pos = fileName.lastIndexOf("\\");
 fileName = fileName.substr(pos+1);
	var f = document.forms['tophpr'];
    document.getElementById("idr").value = '<?php echo $id ?>';
    document.getElementById("fnr").value = fileName;
    f.submit();

	
}
function readbook(num)
{
 table=document.getElementById("bookslist");
 fileName=table.rows[num+1].cells[0].innerHTML;
 //href="http://"+window.location.host+"/reader1/index.php?id=<?php echo $id ?>&b="+fileName;
 var f = document.forms['tophpr'];
 document.getElementById("idr").value = '<?php echo $id ?>';
 document.getElementById("fnr").value = fileName;
 f.submit();
 }
 function takebook(num)
 {
 table=document.getElementById("bookslist_adm");
 fileName=table.rows[num].cells[0].innerHTML;
 var f = document.forms['tophpr'];
 document.getElementById("idr").value = '<?php echo $id ?>';
 document.getElementById("fnr").value = fileName;
 f.submit();
 //choose();
 //document.getElementById("fid").value=fileName;
 //document.getElementById("idu").value='<?php echo $id ?>';
 //var f = document.forms['choosefile'];
 //f.submit(); 
/* alert(fileName);
 newRow=document.getElementById("bookslist").insertRow(1);
 var newCell = newRow.insertCell(0);
 newCell.innerHTML=fileName;*/
 
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
function exit()
{
	var f = document.forms['tophp_exit'];
    document.getElementById("ide").value = 0;
    f.submit();
}
function info()
{
	var f = document.forms['tophp_info'];
    document.getElementById("idi").value = "<?php echo $id ?>";
    f.submit();
}
function blog()
{
	var f = document.forms['tophp_blog'];
    document.getElementById("idb").value = "<?php echo $id ?>";
    f.submit();
}
function face()
{
	var f = document.forms['tophp_face'];
    document.getElementById("idf").value = "<?php echo $id ?>";
    f.submit();
}
function lib()
{ 
	var f = document.forms['tophp_lib'];
    document.getElementById("idl").value = "<?php echo $id ?>";
    f.submit();
}
function fold()
{ 
	var f = document.forms['tophp_fold'];
    document.getElementById("idfo").value = "<?php echo $id ?>";
    f.submit();
}
function ind()
{ 
	var f = document.forms['tophpr'];
    document.getElementById("idr").value = "<?php echo $id ?>";
    f.submit();
}
function refer()
{
if(menu_refer.style.visibility == 'hidden')
  menu_refer.style.visibility='visible';
else
  menu_refer.style.visibility='hidden';
}
function buttonload()
{
id="<?php echo $id ?>";
if(id)
 document.getElementById("mylib").disabled=false;
}
</script>
</html>