<!DOCTYPE html>
<form action='index.php' method='post' name='tophp'>
<input type=hidden name=idr id=idr value=''>
</form>
<form action='facedata.php' method='post' name='tophp_fd'>
<input type=hidden name=idfd id=idfd value=''>
</form>
<script language="javascript" type="text/javascript"> 
function formtofd(id)
{
 var f = document.forms['tophp_fd'];
 document.getElementById('idfd').value=id;
 f.submit();
}

function formtoindex(id)
{
 var f = document.forms['tophp'];
 document.getElementById('idr').value=id;
 f.submit();
}
</script>
<?php
if(isset($_POST['login']))
 $login=$_POST['login'];
if(isset($_POST['pswrd'])) 
 $pswrd=$_POST['pswrd'];
$id = $_POST['idf'];

if($id)
{
 echo "<script type=\"text/javascript\">formtofd(".$id.");</script>";
}
if($login != "" && $pswrd != "" )
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
  $table="face";
  $query = "SELECT * FROM $table WHERE login='$login' AND pswrd='$pswrd'";
  $res = mysql_query($query)or die(mysql_error()); 
  $row=mysql_fetch_array($res,MYSQL_ASSOC);
  $id=$row[id];
  echo "<script type=\"text/javascript\"> formtoindex(".$id.");</script>";
}
 ?>
<html>
<head>
	<meta charset="utf-8" />
	<link href="face.css" rel="stylesheet">
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="logo" align="center">
   <br>
   <a href="#" onclick="formtoindex(<?php echo $id ?>)"><img src="images/chitover_logo.jpg" border="0" ></a><br><br>
  Войдите в аккаунт, чтобы перейти к Читовер  <br><br><br><br> 
</div>
<div id="content" align="center">
  <form width="100%" name=enter method=POST action="face.php">
      <br>
      <img id="logotip" src="images/chitover_avatar.jpg" ><br>
	  <table cellspacing="10" cellpadding="0">
      <tr><td>Логин</td><td><input type=text name=login ></td></tr>	
	  <tr><td>Пароль</td><td><input type=password name=pswrd ></td></tr>
	  <tr><td></td><td align="right"><input type=submit name=sbmt value="Войти"></td></tr>
	 <!-- <tr><td></td><td align="right"><a href="">Забыли пароль?</a></td></tr>-->
	  </table>
</form>
<br>
<a href="createAccaunt.php">Создать аккаунт</a><br>
</div>
<br><br>
<div id="footer" align="center">
 <div class="fb-like" data-href="http://calc-w2you-r.1gb.ru/reader1/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

 <ul>
  <li><a href="http://www.yandex.ru"><img src="images/ya.jpg" border="0" onmouseover="this.src='images/ya1.jpg'" onmouseout="this.src='images/ya.jpg'"></a></li>
  <li><a href="http://www.google.com"><img src="images/colbw.jpg" border="0" onmouseover="this.src='images/col.jpg'" onmouseout="this.src='images/colbw.jpg'"></a></li>
  <li><a href="http://www.vk.com"><img src="images/b.jpg" border="0" onmouseover="this.src='images/b1.jpg'" onmouseout="this.src='images/b.jpg'"></a></li>
  <li><a href="http://www.facebook.com"><img src="images/f.jpg" border="0" onmouseover="this.src='images/f1.jpg'" onmouseout="this.src='images/f.jpg'"></a></li>
  <li><a href="http://www.twitter.com"><img src="images/t.jpg" border="0" onmouseover="this.src='images/t1.jpg'" onmouseout="this.src='images/t.jpg'"></a></li>
  <li><a href="http://www.livejournal.com"><img src="images/pen.jpg" border="0" onmouseover="this.src='images/pen1.jpg'" onmouseout="this.src='images/pen.jpg'"></a></li>
  <li><a href="http://www.mail.ru"><img src="images/mail.jpg" border="0" onmouseover="this.src='images/mail1.jpg'" onmouseout="this.src='images/mail.jpg'"></a></li>
  <li><a href="http://www.instagram.com"><img src="images/photo.jpg" border="0" onmouseover="this.src='images/photo1.jpg'" onmouseout="this.src='images/photo.jpg'"></a></li>
  <li><a href="http://www.odnoklassniki.ru"><img src="images/man.jpg" border="0" onmouseover="this.src='images/man1.jpg'" onmouseout="this.src='images/man.jpg'" ></a></li>
  <li><a href="http://www.foursquare.com"><img src="images/point.jpg" border="0" onmouseover="this.src='images/point1.jpg'" onmouseout="this.src='images/point.jpg'"></a></li>
 </ul>
</div> 

</html>
