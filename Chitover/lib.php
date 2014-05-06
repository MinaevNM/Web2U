<!DOCTYPE html>
<?php
$id=$_GET['id'];

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
<body>

<!--<form style="display:none" id="choosefile" method="get">-->
 <div id="choosefile" style="display:none"><p><input  type="file" name="f" id="fid" size="50">
 <input type="submit" value="Отправить" onclick="loadfile()"></p></div>
<!--</form> -->
  
<table><tr>
 <td><div id="logo"><img src="images/chitover_logo.jpg" ></div></td>
 <td width="80%" align="right" valign="top"><div id="topright_menu">
  <ul>
   <li><a href="entr.htm"><img src="images/entr.jpg"></a></li>
   <li><a href="info.htm"><img src="images/info.jpg"></a></li>
   <li><a href="refer.htm"><img src="images/zoom.jpg"></a></li>
   <li><a href="forum.htm"><img src="images/forum.jpg"></a></li>
   <li><a href="lib.php"><img src="images/lib.jpg"></a></li>
   <li><a href="plus.htm"><img src="images/plus.jpg"></a></li>
   <li><a href="face.php"><img src="images/face.jpg"></a></li>
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
<div id="logomini" ><img src="images/chitover_logomini.jpg" ></div>
<div id="text">- это универсальная программа для чтения книг в новом формате. Чтобы загрузить книгу, просто выберите файл.
</div>
<button id="select" onclick="choose()">Выберите файл</button>
<input id="selection"> </input>
<button id="read" onclick="read()">Приступить к чтению</button>
<div id="form">
<p><b>Перечень загруженных книг</b></p><br>
<form action='' method='post'>
<table id="bookslist">
<td></td><td>Удалить</td><td></td>
<tr><td>Как закалялась сталь.doc</td><td align="center"><input type='checkbox' name='check[]' value=''/></td><td><button>Читать</button></td></tr>
<tr><td>Кавказский пленник.</td><td align="center"><input type='checkbox' name='check[]' value=''/></td><td><button>Читать</button></td></tr>
<tr><td>Архипелаг ГУЛАГ.doc</td><td align="center"><input type='checkbox' name='check[]' value=''/></td><td><button>Читать</button></td></tr>
<tr><td>Преступление и наказание.doc</td><td align="center"><input type='checkbox' name='check[]' value=''/></td><td><button>Читать</button></td></tr>
<tr><td>История России.</td><td align="center"><input type='checkbox' name='check[]' value=''/></td><td><button>Читать</button></td></tr>
<!--<input type='submit' name='check[]' value='Удалить' />-->
</table>
</form>
</div>
</body>

<script language="javascript" type="text/javascript"> 
function dan()
{
 window.location.href="http://"+window.location.host+"/reader1/facedata.php?change=0&id=<?php echo $id ?>";
}
function read()
{
 fileName=document.getElementById("fid").value;
 var pos = fileName.lastIndexOf("\\");
 fileName = fileName.substr(pos+1);
 window.location.href="http://"+window.location.host+"/reader1/index1.php?id=<?php echo $id ?>&b="+fileName;
 
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