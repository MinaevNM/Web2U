<!DOCTYPE html>
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
<body onload="buttonload()">
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
function char_random(str) {
 var elem=str.split("");
 var exit_str="";
 var colors=new Array(
 "00","11","22","33","44","55","66","77","88","99","AA","BB","CC","DD","EE","FF");

 for (var n=0;n<=(elem.length-1);n++) {
  if (elem[n]==" ") { exit_str+=" "; }
  if (elem[n]!=" ") {
    var col1=Math.round(Math.random()*(colors.length-1));
    var col2=Math.round(Math.random()*(colors.length-1));
    var col3=Math.round(Math.random()*(colors.length-1));
    var size=Math.round(Math.random()*4)+3;
    exit_str+="<font color=\"#"+colors[col1]+colors[col2]+colors[col3]+
    "\" size=\""+size+"\">"+elem[n]+"</font>";
  }
 }
 text1.innerHTML=exit_str;
}
function readword()
{                   
  var i = $('#slider1').slider("option", "value"); 
  clearTimeout(timeoutID);
  var size = $('#slider2').slider("option", "value");
  if(i < mas.length && !IsStopped)
  {      
   str=mas[i].slice(1);
  // document.getElementById("text01").value=mas[i][0];
  // document.getElementById("text02").value=str1;
  // document.getElementById("text1").value="                                       "+document.getElementById("text01").value+document.getElementById("text02").value;
 //char_random(mas[i]);
 //document.getElementById("text1").innerHTML=mas[i];
 //document.getElementById("text1").write="                                       "+str;
 space="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
 text1.innerHTML=space+"<font color='red'>"+mas[i][0]+"</font>"+str;
   i++;
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
   var curstring ="";
   for (var j = 0; j < 60; j++)
     curstring = curstring.concat(mas[i + j], " ");
   document.getElementById("textarea1").value=curstring;
   timeinmillis += 60000 / speed;
   timeoutID = setTimeout(function() {readword()}, 60000 / speed);
  }
}


function begin_docx(t)
{
//alert(t);
 str=mas[i].slice(1);
 space="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
 text1.innerHTML=space+t;//"<font color='red'>"+mas[i][0]+"</font>"+str;
//document.getElementById("text1").value="                                       "+t
}

</script>
                         
<?php
$fileName=$_POST['fnr'];
$id=$_POST['idr'];
if($fileName != "")
{
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

<div id="menu" align="right" onload="buttonload()">
 <ul>
  <li id="m1"><a href="#" onclick="exit()" title="выход" ><img src="images/entr.jpg" border="0"></a></li>
  <li><a href="#" onclick="info()" title="блог с комментариями и статьями"><img src="images/info.jpg" border="0"></a></li>
  <li><a href="#" title="справка" onclick="refer()"><img src="images/zoom.jpg" border="0"></a></li>
  <li><a href="./phpBB3/index.php" title="форум"><img src="images/forum.jpg" border="0"></a></li>
 <!-- <li><a href="#" onclick="lib()"  title="библиотека" class="dis"><img src="images/lib.jpg" border="0"></a></li>-->
  <li><button id="mylib" disabled onclick="lib()" title="библиотека" ><img src="images/lib.jpg" border="0"></button></li>
  <li><a href="#" onclick="blog()" title="блог" ><img src="images/bl.jpg" border="0"></a></li>
  <li><a title="личный кабинет" onclick="face()"><img src="images/face.jpg" border="0"></a></li>
 </ul>
</div>

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
   <button title="вывод поля параметров чтения" id="up" onclick="openparams()"><img src="images/up.jpg"></button>
   <p>
   <a href="#" onclick="fold()" ><img title="перечень книг" id="fold" src="images/fold.jpg" border="0"></a>
   
   <span title="основная область для чтения" id="text1" readonly name="textarea1" cols="40" rows="1"></span>
 <!--  <textarea title="основная область для чтения" id="text01"  readonly name="textarea1" cols="40" rows="1"></textarea>
   <textarea title="основная область для чтения" id="text02" style="visibility:hidden" readonly name="textarea1" cols="40" rows="1"></textarea>
   --></p>
    <br><br><br><br><br>
    <button title="старт/пауза" onclick="startstop()"><img width="20" height="20" id="arrow" src="images/arrow.jpg"></button>
	<div id="slider1"></div>
    <a href="#"><img id="bird" src="images/bird.jpg" border="0" height="15px"></a>
    <div id="slider2"></div>
    <div id="slider3"></div>
   <button title="вывод области где находится текст" id="down" onclick="opentext()"><img src="images/down.jpg"></button>
  <p id="text" style="visibility:hidden">
   <textarea readonly id="textarea1" name="textarea1" cols="40" rows="10">
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
max: 19,
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