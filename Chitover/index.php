<!DOCTYPE html>
<script language="javascript" type="text/javascript">
var IsStopped = false;
var mas;
var timeoutID;
var timeinmillis;
function begin(t)
{
if (t !== null)
{
 mas=t.split(" ");
 timeinmillis = 0;
 jQuery("#slider1").slider({  min: 0,  max: mas.length - 1,  range: false });  
 $('#slider3').slider('value', 1);
 readword();
}

}

function readword()
{                   
  var i = $('#slider1').slider("option", "value"); 
  clearTimeout(timeoutID);
  var size = $('#slider2').slider("option", "value");
  if(i < mas.length && !IsStopped)
  {
   document.getElementById("text1").value="                                       "+mas[i];i++;
   var speed = $('#slider3').slider("option", "value");
   speed = 50 * (speed + 1); 
   $('#slider1').slider('value', i);
   var lefttimeinminutes = (mas.length - i) / speed;
   lefttimeinminutes = Math.floor(lefttimeinminutes);
   
   /*
        всего слов           10000
	прочитано слов    2000
	осталось слов     8000
	всего времени     2часа 40мин
	прочитано времени 35 минут
	осталось времени  2 часа 05 мин
        скорость чтения   250 слов.мин 	
  */

   var fulltime = Math.floor(timeinmillis / 60000) + lefttimeinminutes;
   document.getElementById("textarea_stat1").value="всего слов                  " + mas.length;
   document.getElementById("textarea_stat2").value="прочитано слов              " + i; 
   document.getElementById("textarea_stat3").value="осталось слов               " + (mas.length - i);
   document.getElementById("textarea_stat4").value="всего времени               " + Math.floor(fulltime / 60) + "часа " + fulltime % 60 + "мин"; 
   document.getElementById("textarea_stat5").value="прочитано времени           " + Math.floor(timeinmillis / 60000 / 60) + "часа " + Math.floor(timeinmillis / 60000) % 60 + "мин"; 
   document.getElementById("textarea_stat6").value="осталось времени            " + Math.floor(lefttimeinminutes / 60) + "часа " + lefttimeinminutes % 60 + "мин";
   document.getElementById("textarea_stat7").value="скорость чтения             " + speed + "слов/мин";
   timeinmillis += 60000 / speed;
   timeoutID = setTimeout(function() {readword()}, 60000 / speed);
  }
}

function begin_docx(t)
{
alert(t);
document.getElementById("text1").value="                                       "+t
}

</script>
                         
<?php
$fileName=$_GET['b'];
$id=$_GET['id'];
if($fileName != "")
{
  //$file_name="./lib/".$fileName;
 $file_name="/home/virtwww/w_calc-w2you-r_f81af168/http/reader1/lib/".$id."/".$fileName;
  $fd = fopen($file_name,"r");
  if (!$fd)   {
   echo "Error! Could not open the file.";
   die;
  }
  $ft=file_get_contents($file_name);
  fclose ($fd); 
  if(strstr($file_name,".txt"))
  {
  $str=json_encode($ft);
  echo('<script type="text/javascript" language="javascript">this.onload=function() {begin('.$str.')}</script>');
  }
else
{
$content = read_file_docx($file_name);
if($content !== false) {
 $str=nl2br($content);
 $str=json_encode($str);
 echo ('<script type="text/javascript" language="javascript">this.onload=function() {begin('.$str.')}</script>'); 
}
else {
    echo 'Couldn\'t read the file. Please check that file.';
} 
}
}

function read_file_docx($filename){
    $striped_content = '';
    $content = '';
    if(!$filename || !file_exists($filename)) return false;
    $zip = zip_open($filename);
    if (!$zip || is_numeric($zip)) return false;
    while ($zip_entry = zip_read($zip)) {
        if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
        if (zip_entry_name($zip_entry) != "word/document.xml") continue;
        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
        zip_entry_close($zip_entry);
    }
    zip_close($zip);
    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);
	return $striped_content;
}



?>
<html>
<head>
	<meta charset="utf-8" />
	<link href="style.css" rel="stylesheet">
	<link href="slider.css" rel="stylesheet">
<script type="text/javascript" src="//vk.com/js/api/openapi.js?112"></script>

<script type="text/javascript">
  VK.init({apiId: API_ID, onlyWidgets: true});
</script>

<style>
 .aligner {
    text-align: center; 
   }
</style>


</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript" src="jquery-1.6.1.min.js" ></script>  
<script type="text/javascript" src="jquery.ui-slider.js"></script> 


<div id="menu" align="right">
 <ul>
  <li id="m1"><a href="entr.htm"><img src="images/entr.jpg" border="0"></a></li>
  <li><a href="info.htm"><img src="images/info.jpg" border="0"></a></li>
  <li><a href="#"  onclick="refer()"><img src="images/zoom.jpg" border="0"></a></li>
  <li><a href="./phpBB3/index.php"><img src="images/forum.jpg" border="0"></a></li>
  <li><a id="alib"><img src="images/lib.jpg" border="0"></a></li>
  <li><a href="./wordpress/wp-admin"><img src="images/bl.jpg" border="0"></a></li>
  <li><a href="face.php"><img src="images/face.jpg" border="0"></a></li>
 </ul>
</div>
<canvas id="canvas" width="1000" height="40" style="visibility:hidden" ></canvas>

<div id="menu_refer" align="right" style="visibility:hidden">
 <ul>
  <li id="r1">вход</li>
  <li>блог с комментариями и статьями</li>
  <li>справка</li>
  <li>форум</li>
  <li>библиотека</li>
  <li>блог</li>
  <li>личный кабинет</li>
 </ul>
</div>
<p class="aligner">
<!--<div id="content" style="transform: scale(2); -webkit-transform: scale(2); -webkit-transform-origin: 0 0; -moz-transform: scale(2); -moz-transform-origin: 0 0; -o-transform: scale(2); -o-transform-origin: 0 0; -ms-transform: scale(2); -ms-transform-origin: 0 0;">            -->
<div id="content">	
   <img id="logo" src="images/chitover_logo.jpg" ><br>
   <p id="params" style="display:none">
   <?php
     for ($i = 1; $i <= 7; $i++)
       echo "<textarea readonly id=\"textarea_stat".$i."\" name=\"textarea_stat".$i."\" cols=\"40\" rows=\"1\" ></textarea><br>";
   ?>
   </p>
   <button id="up" onclick="openparams()"><img src="images/up.jpg"></button>
   <p>
   <a href="fold.php?id=<?php echo $id ?>"><img id="fold" src="images/fold.jpg" border="0"></a>
   <textarea id="text1" readonly name="textarea1" cols="40" rows="1"></textarea>
   </p>
    <br><br><br><br><br>
    <button onclick="startstop()"><img width="20" height="20" id="arrow" src="images/arrow.jpg"></button>
	<div id="slider1"></div>
    <a href="#"><img id="bird" src="images/bird.jpg" border="0" height="15px"></a>
    <div id="slider2"></div>
    <div id="slider3"></div>
   <button id="down" onclick="opentext()"><img src="images/down.jpg"></button>
  <p id="text" style="visibility:hidden"><textarea readonly name="textarea1" cols="40" rows="5">
    Бар - песчаная подводная отмель; 
    образуется в море на некотором расстоянии от устья реки под 
    действием морских волн.
   </textarea></p>

</div>
</p>
<div id="footer" align="center">
 <div class="fb-like" data-href="http://calc-w2you-r.1gb.ru/reader1/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

 <ul>
  <li><a href="http://www.yandex.ru"><img src="images/ya.jpg" border="0" onmouseover="this.src='images/ya1.jpg'" onmouseout="this.src='images/ya.jpg'"></a></li>
  <li><a href="http://www.google.com"><img src="images/colbw.jpg" border="0" onmouseover="this.src='images/col.jpg'" onmouseout="this.src='images/colbw.jpg'"></a></li>
  <li><a href="http://www.vk.com"><img src="images/b.jpg" border="0" onmouseover="this.src='images/b1.jpg'" onmouseout="this.src='images/b.jpg'"></a></li>
  <!--<li><a href="http://www.facebook.com"><img src="images/f.jpg" border="0" onmouseover="this.src='images/f1.jpg'" onmouseout="this.src='images/f.jpg'"></a></li>-->
  <li><a href="http://www.twitter.com"><img src="images/t.jpg" border="0" onmouseover="this.src='images/t1.jpg'" onmouseout="this.src='images/t.jpg'"></a></li>
  <li><a href="http://www.livejournal.com"><img src="images/pen.jpg" border="0" onmouseover="this.src='images/pen1.jpg'" onmouseout="this.src='images/pen.jpg'"></a></li>
  <li><a href="http://www.mail.ru"><img src="images/mail.jpg" border="0" onmouseover="this.src='images/mail1.jpg'" onmouseout="this.src='images/mail.jpg'"></a></li>
  <li><a href="http://www.instagram.com"><img src="images/photo.jpg" border="0" onmouseover="this.src='images/photo1.jpg'" onmouseout="this.src='images/photo.jpg'"></a></li>
  <li><a href="http://www.odnoklassniki.ru"><img src="images/man.jpg" border="0" onmouseover="this.src='images/man1.jpg'" onmouseout="this.src='images/man.jpg'" ></a></li>
  <li><a href="http://www.foursquare.com"><img src="images/point.jpg" border="0" onmouseover="this.src='images/point1.jpg'" onmouseout="this.src='images/point.jpg'"></a></li>
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
min: 1,  
max: 3, 
value: 1,  
range: false 
}); 
jQuery("#slider3").slider({  
min: 1,  
max: 5,
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
  IsStopped = !IsStopped;
  readword();
} 
function refer()
{
if(menu_refer.style.visibility == 'hidden')
{
  menu_refer.style.visibility='visible';
  var x_begin=document.getElementById("r1").offsetLeft;
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
  canvas.style.visibility='visible';
}
else
{
  menu_refer.style.visibility='hidden';
  var canvas = document.getElementById("canvas"); 
  var cvs = canvas.getContext("2d");
  canvas.style.visibility='hidden';
}
}
</script>             	
</html>