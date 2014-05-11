<!DOCTYPE html>
<?php
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Cache-Control: post-check=0,pre-check=0", false);
  header("Cache-Control: max-age=0", false);
  header("Pragma: no-cache");

  $id=$_GET['id'];
  $change=$_GET['change'];
 // $dblocation = "localhost";
 // $dbname = "chitover";
 // $dbuser = "root";
 // $dbpasswd = "root";
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

 $textarea_surname=$_POST['textarea_surname'];
 $textarea_name=$_POST['textarea_name']; 
 $textarea_f=$_POST['textarea_f']; 
 $textarea_mainmail=$_POST['textarea_mainmail']; 
 $textarea_mail=$_POST['textarea_mail'];
 $textarea_phone=$_POST['textarea_phone'];
 $query = "UPDATE $table SET surname='$textarea_surname',name='$textarea_name',father='$textarea_f',mainmail='$textarea_mainmail',mail='$textarea_mail',phone='$textarea_phone' WHERE id=".$id;
 $res = mysql_query($query);
 $row=mysql_fetch_array($res,MYSQL_ASSOC); 
 $query = "SELECT * FROM $table WHERE id=".$id; 
 $res = mysql_query($query)or die(mysql_error());
 $row=mysql_fetch_array($res,MYSQL_ASSOC); 
 }
else
{ 
 $query = "SELECT * FROM $table WHERE id=".$id; 
 $res = mysql_query($query)or die(mysql_error());
 $row=mysql_fetch_array($res,MYSQL_ASSOC); 
 }
 ?>

<html>
<head>
	<meta charset="utf-8" />
	<link href="facedata.css" rel="stylesheet">
</head>

<table><tr>
 <td><div id="logo"><a href="index.php"><img src="images/chitover_logo.jpg" border="0" ></a></div></td>
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
 <li><a href="#">Личные данные</a></li></td>
 <td width="50%" align="center"><li><a href="javascript: lib()">Библиотека</a></li></td>
</ul></tr></table>
</div>
<hr id="hr">
<br>
<div id="content_left">
<form  method=POST action="facedata.php?change=1&id=<?php echo $id ?>">
Ф. И. О.<br><br>
Фамилия<br>
<p><textarea  name="textarea_surname" id="textarea_surname" cols="40" rows="1"><?php echo $row[surname] ?></textarea></p><br>
Имя<br>
<p><textarea  name="textarea_name" id="textarea_name" cols="40" rows="1"><?php echo $row[name] ?></textarea></p><br>
Отчество<br>
<p><textarea  name="textarea_f" id="textarea_f" cols="40" rows="1"><?php echo $row[father] ?></textarea></p><br>
</div>
<div id="content_right">
E_mail и  телефон<br><br>
Основной E_mail<br>
<p><textarea id="ta_mainmail" name="textarea_mainmail" cols="40" rows="1"><?php echo $row[mainmail] ?></textarea></p><br>
Резервный E_mail<br>
<p><textarea id="ta_mail" name="textarea_mail" cols="40" rows="1"><?php echo $row[mainmail] ?></textarea></p><br>
Телефон<br>
<p><textarea id="ta_phone" name="textarea_phone" cols="40" rows="1"><?php echo $row[phone] ?></textarea></p>
<br><br>
<input type=submit name=sbmtAccaunt value="Изменить">
</form>
</div> 

<script language="javascript" type="text/javascript"> 

function lib()
{
 window.location.href="http://"+window.location.host+"/reader1/lib.php?id=<?php echo $id ?>";
}
</script>
</html>
  