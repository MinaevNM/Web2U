<!DOCTYPE html>
<script language="javascript" type="text/javascript">
function begin(t)
{
mas=t.split(" ");
readword(mas,0);
}
function readword(mas,i)
{
if(i<mas.length)
{
 document.getElementById("text1").value="                                       "+mas[i];i++;
 setTimeout(function() {readword(mas,i)}, 500);
}
}
</script>
<?php
//$word = new COM("Word.Application");
//$tempfile="C:\apache\localhost\www\reader1\lib\dam.doc";
//$word->Documents->Open($tempfile);
//echo $word->ActiveDocument->Content; 
//$word->ActiveDocument->Close(false); 
//$word->Quit(); 
//unset($word); 

$fileName=$_GET['b'];

if($fileName != "")
{

 /* $dblocation = "localhost";
  $dbname = "chitover";
  $dbuser = "root";
  $dbpasswd = "root";
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
  
  $table="library";
  $query = "SELECT * FROM $table WHERE id = 5";
  $res = mysql_query($query)or die(mysql_error()); 
  $number = mysql_num_rows($res);
  $row=mysql_fetch_array($res);
  
  $file_text = "";*/
  
  //$file_name="http://".$_SERVER['HTTP_HOST']."/".$row['text'];
  $file_name="lib/".$fileName;
  $fd = fopen($file_name,"r");
  if (!$fd)   {
   echo "Error! Could not open the file.";
   die;
  }
 
  $ft=file_get_contents($file_name);
  fclose ($fd); 
  $str=json_encode($ft);
  echo('<script type="text/javascript" language="javascript">this.onload=function() {begin('.$str.')}</script>');
}

?>
<html>
<head>
	<meta charset="utf-8" />
	<link href="style.css" rel="stylesheet">
	<link href="slider.css" rel="stylesheet">
</head>
<body>
<script type="text/javascript" src="jquery-1.6.1.min.js" ></script>  
<script type="text/javascript" src="jquery.ui-slider.js"></script> 


<div id="menu" align="right">
 <ul>
  <li><a href="entr.htm"><img src="images/entr.jpg"></a></li>
  <li><a href="info.htm"><img src="images/info.jpg"></a></li>
  <li><a href="refer.htm"><img src="images/zoom.jpg"></a></li>
  <li><a href="forum.htm"><img src="images/forum.jpg"></a></li>
  <li><a id="alib"><img src="images/lib.jpg"></a></li>
  <li><a href="plus.htm"><img src="images/plus.jpg"></a></li>
  <li><a href="face.php"><img src="images/face.jpg"></a></li>
 </ul>
</div>
<div id="content">
   <img id="logo" src="images/chitover_logo.jpg" ><br>
   <p id="params" style="display:none"><textarea readonly name="textarea2" cols="40" rows=8">
        всего слов        10000
	прочитано слов    2000
	осталось слов     8000
	всего времени     2часа 40мин
	прочитано времени 35 минут
	осталось времени  2 часа 05 мин
        скорость чтения   250 слов.мин 	
   </textarea></p>
   <button id="up" onclick="openparams()"><img src="images/up.jpg"></button>
   <p>
   <a href="#"><img id="fold" src="images/fold.jpg"></a>
   <textarea id="text1" readonly name="textarea1" cols="40" rows="1"></textarea>
   </p>
    <button onclick="startstop()"><img id="arrow" src="images/arrow.jpg"></button>
	<div id="slider1"></div>
    <a href="#"><img id="bird" src="images/bird.jpg" height="15px"></a>
    <div id="slider2"></div>
    <div id="slider3"></div>
   <button id="down" onclick="opentext()"><img src="images/down.jpg"></button>
  <p id="text" style="visibility:hidden"><textarea readonly name="textarea1" cols="40" rows="5">
    Бар - песчаная подводная отмель; 
    образуется в море на некотором расстоянии от устья реки под 
    действием морских волн.
   </textarea></p>

</div>
<div id="footer" align="center">
 <ul>
  <li><a href="http://www.yandex.ru"><img src="images/ya.jpg" onmouseover="this.src='images/ya1.jpg'" onmouseout="this.src='images/ya.jpg'"></a></li>
  <li><a href="http://www.google.com"><img src="images/colbw.jpg" onmouseover="this.src='images/col.jpg'" onmouseout="this.src='images/colbw.jpg'"></a></li>
  <li><a href="http://www.vk.com"><img src="images/b.jpg" onmouseover="this.src='images/b1.jpg'" onmouseout="this.src='images/b.jpg'"></a></li>
  <li><a href="http://www.facebook.com"><img src="images/f.jpg" onmouseover="this.src='images/f1.jpg'" onmouseout="this.src='images/f.jpg'"></a></li>
  <li><a href="http://www.twitter.com"><img src="images/t.jpg" onmouseover="this.src='images/t1.jpg'" onmouseout="this.src='images/t.jpg'"></a></li>
  <li><a href="http://www.livejournal.com"><img src="images/pen.jpg" onmouseover="this.src='images/pen1.jpg'" onmouseout="this.src='images/pen.jpg'"></a></li>
  <li><a href="http://www.mail.ru"><img src="images/mail.jpg" onmouseover="this.src='images/mail1.jpg'" onmouseout="this.src='images/mail.jpg'"></a></li>
  <li><a href="#"><img src="images/rib.jpg"></a></li>
  <li><a href="#"><img src="images/eye.jpg"></a></li>
  <li><a href="#"><img src="images/ph.jpg" onmouseover="this.src='images/ph1.jpg'" onmouseout="this.src='images/ph.jpg'"></a></li>
  <li><a href="http://www.instagram.com"><img src="images/photo.jpg" onmouseover="this.src='images/photo1.jpg'" onmouseout="this.src='images/photo.jpg'"></a></li>
  <li><a href="http://www.odnoklassniki.ru"><img src="images/man.jpg" onmouseover="this.src='images/man1.jpg'" onmouseout="this.src='images/man.jpg'" ></a></li>
  <li><a href="#"><img src="images/point.jpg" onmouseover="this.src='images/point1.jpg'" onmouseout="this.src='images/point.jpg'"></a></li>
  <li><a href="#"><img src="images/left.jpg"></a></li>
  <li><a href="#"><img src="images/right.jpg"></a></li>
 </ul>
</div> 

</body>

<?php 
$id=$_GET['id'];
if($id)
{
 echo "<script language='javascript' type='text/javascript'>document.getElementById('alib').href='lib.php?id=".$id."';</script>";
}
?>

<script language="javascript" type="text/javascript">  
jQuery("#slider1").slider({  
min: 0,  
max: 1000,   
range: false 
});  
jQuery("#slider2").slider({  
min: 0,  
max: 3, 
value: 2,  
range: false 
}); 
jQuery("#slider3").slider({  
min: 100,  
max: 3000,   
range: false 
}); 
</script> 
<script language="javascript" type="text/javascript">

function opentext()
{
if(text.style.visibility == 'hidden')
  text.style.visibility='visible';
else
  text.style.visibility='hidden';
 }
function openparams()
{
if(params.style.display == 'none')
{
  params.style.display = 'block';
  logo.style.display ='none';
}
else
{
  params.style.display='none';
  logo.style.display ='block'; 
}
}
function startstop()
{
 alert("Start/Stop");
} 
</script>
</html>