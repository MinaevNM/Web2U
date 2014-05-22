<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href="lib.css" rel="stylesheet">
</head>
<body onload="buttonload()">
<?php
$id=$_POST['idfo'];
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


<table><tr>
 <td><div id="logo"><a href="#" onclick="ind()"><img src="images/chitover_logo.jpg" border="0" ></a></div></td>
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


<div id="form">
<p><b>Перечень загруженных книг</b></p><br>
<table id="bookslist">
<?php if ($id > 0) { ?>
<?php for($i=0;$i<sizeof($books);$i++) { ?>
<?php echo '<tr id="books_tr"><td>'.$books[$i].'</td><td align="center"><button id="cross" onmouseover="redcross()" onmouseout="blackcross()" onclick="deletebook(this)">X</button></td><td><button onclick="readbook('.$i.')">Читать</button></td></tr>' ?>
<?php } ?>
<?php } else {?>
<?php echo "Сначала зарегистрируйтесь" ?>
<?php } ?>
</table>
</div>
<form action='delete.php' method='post' name='tophpd'>
<input type=hidden name=idd id=idd value=''>
<input type=hidden name=fnd id=fnd value=''>
</form>
<form action='index.php' method='post' name='tophpr'>
<input type=hidden name=idr id=idr value=''>
<input type=hidden name=fnr id=fnr value=''>
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
</body>
<script language="javascript" type="text/javascript">
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
{
  menu_refer.style.visibility='visible';
}
else
{
  menu_refer.style.visibility='hidden';
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
 var f = document.forms['tophpd'];
 document.getElementById("idd").value = '<?php echo $id ?>';
 document.getElementById("fnd").value = fileName;
 f.submit();
}
function readbook(num)
{
 table=document.getElementById("bookslist");
 fileName=table.rows[num].cells[0].innerHTML;
 var f = document.forms['tophpr'];
 document.getElementById("idr").value = '<?php echo $id ?>';
 document.getElementById("fnr").value = fileName;
 f.submit();
 }
 function buttonload()
{
id="<?php echo $id ?>";
if(id)
 document.getElementById("mylib").disabled=false;
}
</script>        
</html>