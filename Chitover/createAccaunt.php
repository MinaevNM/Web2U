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
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Cache-Control: post-check=0,pre-check=0", false);
  header("Cache-Control: max-age=0", false);
  header("Pragma: no-cache");
  
if(isset($_POST['login']))
 $login=$_POST['login'];
if(isset($_POST['pswrd'])) 
 $pswrd=$_POST['pswrd'];
if(isset($_POST['repeatPswrd'])) 
 $repeatPswrd=$_POST['repeatPswrd'];
if(isset($_POST['cod'])) 
 $cod=$_POST['cod'];
$textarea_name=$_POST['textarea_name'];
$textarea_mainmail=$_POST['textarea_mainmail'];
$textarea_phone=$_POST['textarea_phone'];
if($login != "" && $pswrd != "" && $repeatPswrd != "" && $cod != "")
{
  if(isset($login) && !preg_match('/^[a-zA-Z0-9]{6,10}$/',$login))
   echo "неверный логин <br>";
  else if(isset($pswrd) && !preg_match('/^[a-zA-Z0-9]{6,10}$/',$pswrd))
   echo "неверный пароль <br>";
  else if(isset($cod) && !preg_match('/^[a-zA-Z]{6,10}$/',$cod))
   echo "неверное кодовое слово <br>";
  else if(strcmp($pswrd,$repeatPswrd) != 0)
    echo "пароль повторен неверно <br>";
  else
  {
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

 
  
  $my_table="face";
  $query = "SELECT id FROM $my_table WHERE login='$login'";
  $res = mysql_query($query) or die(mysql_error());
  if (mysql_num_rows($res) != 0)
  {
    echo "Login already exists";
    exit();
  }
 
  
  echo "аккаунт создан"; 
  $query = "INSERT INTO $my_table(login,pswrd,repeatPswrd,cod,name1,mainmail1,phone1,admin) VALUES ('$login','$pswrd','$repeatPswrd','$cod','$textarea_name','$textarea_mainmail',$textarea_phone, 0)";
  $res = mysql_query($query)or die(mysql_error());  
  $query = "SELECT id FROM $my_table WHERE login='$login'";
  $res = mysql_query($query)or die(mysql_error());  
  $id=mysql_fetch_array($res,MYSQL_ASSOC);
  $tablename = "books".$id['id'];
  $query = "CREATE TABLE $tablename (book VARCHAR(100) NOT NULL,word INT(10));";
  mysql_query($query)or die(mysql_error());
  echo "<script type=\"text/javascript\"> formtoindex(".$id['id'].");</script>";
 }
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<link href="face.css" rel="stylesheet">
</head>

<div id="newAccaunt" align="center">
  <form width="100%" name=enter  method=POST action="createAccaunt.php">
      <br>
      <img id="logotip" src="images/chitover_avatar.jpg" ><br>
	  <table cellspacing="10" cellpadding="0">
      <tr><td>Введите Логин (от 6 до 10 латинских букв/цифр)</td><td><input type=text name=login ></td></tr>	
	  <tr><td>Введите Пароль (от 6 до 10 латинских букв/цифр)</td><td><input type=password name=pswrd ></td></tr>
	  <tr><td>Повторите Пароль </td><td><input type=password name=repeatPswrd ></td></tr>	
	  <tr><td>Введите кодовое слово для восстановления пароля (от 6 до 10 латинских букв)</td><td><input type=text name=cod ></td></tr>		  
      <tr><td>Имя</td><td><textarea  name="textarea_name" id="textarea_name" cols="40" rows="1"></textarea></p><br></td></tr>	
      <tr><td>Основной E_mail</td><td><textarea id="ta_mainmail" name="textarea_mainmail" cols="40" rows="1"></textarea></p><br></td></tr>	
      <tr><td>Телефон</td><td><textarea id="ta_phone" name="textarea_phone" cols="40" rows="1"></textarea></p></td></tr>	
	  <tr><td></td><td align="right"><input type=submit name=sbmtAccaunt value="Подтверждение ввода"></td></tr>
	  </table>
</form>
<br>
</html>
