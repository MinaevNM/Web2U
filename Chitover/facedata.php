<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href="facedata.css" rel="stylesheet">
</head>
<body onload="buttonload()">
<?php
  $id=$_POST['idfd'];
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Cache-Control: post-check=0,pre-check=0", false);
  header("Cache-Control: max-age=0", false);
  header("Pragma: no-cache");


  $change=$_POST['fnfd'];
  $dblocation = "mysql48.1gb.ru";
  $dbname = "gb_wst_test1";
  $dbuser = "gb_wst_test1";
  $dbpasswd = "10910916aghj";
  $dbcnx = mysql_connect($dblocation, $dbuser, $dbpasswd);
  if (!$dbcnx)
  {
    echo "Server is unavailable. Error: ".mysql_error();
	exit();
  }
  if (!mysql_select_db($dbname, $dbcnx))
  {
    echo "datebase is unavailable.";
	exit();
  }

  mysql_query("set character_set_client='cp1251'");
  mysql_query("set character_set_results='cp1251'");
  mysql_query("set character_set_collation_connection='cp1251'");
  mysql_query("set character_set_connection='cp1251'");
  mysql_query("set character_set_datebase='cp1251'");
  mysql_query("set character_set_server='cp1251'");
  mysql_query("set character_set_system='cp1251'");
  mysql_query("set character_set_collation_datebase='cp1251'");
  mysql_query("set character_set_collation_server='cp1251'"); 
  $table="face";
  if($change == 1)
  {
 $textarea_name=$_POST['textarea_name']; 
 $textarea_mainmail=$_POST['textarea_mainmail']; 
 $textarea_phone=$_POST['textarea_phone'];
 $query1 = "UPDATE $table SET name1='$textarea_name',mainmail1='$textarea_mainmail',phone1=$textarea_phone WHERE id=".$id;
 $res1 = mysql_query($query1);
 $query = "SELECT * FROM $table WHERE id=".$id; 
 $res = mysql_query($query);
 $row=mysql_fetch_array($res,MYSQL_ASSOC); 
 }
else
{ 
 $query = "SELECT * FROM $table WHERE id=".$id; 
 $res = mysql_query($query);
 $row=mysql_fetch_array($res,MYSQL_ASSOC); 
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
 <!--  <li><a href="#" onclick="lib()"  title="библиотека"><img src="images/lib.jpg" border="0"></a></li>-->
 <li><button id="mylib" disabled onclick="lib()" title="библиотека" ><img src="images/lib.jpg" border="0"></button></li>
  <li><a href="#" onclick="blog()" title="блог" ><img src="images/bl.jpg" border="0"></a></li>
  <li><a title="личный кабинет" onclick="face()"><img src="images/face.jpg" border="0"></a></li>
 </ul>
 </div></td>
 </tr></table>

<div id="menu" align="center" >
<ul><table width="100%" ><tr><td width="50%" align="center">
 <li><a href="#">Личные данные</a></li></td>
 <td width="50%" align="center"><li><a href="javascript: lib()">Библиотека</a></li></td>
</ul></tr></table>
</div>
<hr id="hr">
<br>
<div id="content_left">
<form  method=POST action="facedata.php">
<input type=hidden name=idfd id=idfd value='<?php echo $id ?>'>
<input type=hidden name=fnfd id=fnfd value=1>
Имя<br>
<p><textarea  name="textarea_name" id="textarea_name" cols="40" rows="1"><?php echo $row[name1] ?></textarea></p><br>
</div>
<div id="content_right">
E_mail<br>
<p><textarea id="ta_mainmail" name="textarea_mainmail" cols="40" rows="1"><?php echo $row[mainmail1] ?></textarea></p><br>
Телефон<br>
<p><textarea id="ta_phone" name="textarea_phone" cols="40" rows="1"><?php echo $row[phone1] ?></textarea></p>
<br><br>
<input type=submit name=sbmtAccaunt value="Изменить">
</form>
</div> 
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
<form action='index.php' method='post' name='tophp_ind'>
<input type=hidden name=idr id=idr value=''>
</form>

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
	var f = document.forms['tophp_ind'];
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
function buttonload()
{
id="<?php echo $id ?>";
if(id)
 document.getElementById("mylib").disabled=false;
}
</script>
</html>
  