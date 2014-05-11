<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <link href="lib.css" rel="stylesheet">
</head>
<body>
<br>
<a href="index.php"><img src="images/chitover_logo.jpg" border="0"></a>
<div id="title" align="center">
<h2>Готовая библиотека книг</h2>
</div>
<div id="menu" align="center">
 <ul >
  <li><button onclick="book_title()">Книги</button></li>
  <li><button onclick="periodicals()">Периодика</button></li>
  <li><button onclick="favourites()">Любимые</button></li>
  <li><button onclick="collection()">Коллекция</button></li>
 </ul>
</div>

<div id="sort">
<?php
  $dblocation = "localhost";
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
  $sort=$_GET['sort'];
  
  echo "<div id='sort' align='right'>";
  echo "<p>Отсортировать по&nbsp&nbsp";
  /*this.options[this.selectedIndex].value*/
  echo "<select size='1' name='SORT' onchange='book_title()'>";
  switch($sort)
  {
   case "auther":
   {
    echo "<option selected value='auther' >Автору </option>";
    echo "<option value='title' >Названию</option>";
    echo "<option value='date_read'>Недавно прочитанные</option>";
    echo "<option value='date_add'>Недавно добавленные</option>";
	$query = "SELECT * FROM $table WHERE title != ' ' ORDER BY auther ";
	break;
   }
    case "title":
   {
    echo "<option value='auther' >Автору </option>";
    echo "<option selected value='title' >Названию</option>";
    echo "<option value='date_read'>Недавно прочитанные</option>";
    echo "<option value='date_add'>Недавно добавленные</option>";
	$query = "SELECT * FROM $table WHERE title != ' ' ORDER BY title ";
	break;
   } 
  case "date_read":
   {
    echo "<option value='auther' >Автору </option>";
    echo "<option value='title' >Названию</option>";
    echo "<option selected value='date_read'>Недавно прочитанные</option>";
    echo "<option value='date_add'>Недавно добавленные</option>";
	$query = "SELECT * FROM $table WHERE title != ' ' ORDER BY date_read ";	
	break;
   }   
     case "date_add":
   {
    echo "<option value='auther' >Автору </option>";
    echo "<option value='title' >Названию</option>";
    echo "<option value='date_read'>Недавно прочитанные</option>";
    echo "<option selected value='date_add'>Недавно добавленные</option>";
	$query = "SELECT * FROM $table WHERE title != ' ' ORDER BY date_add ";	
	break;
   }  
   default:
     {
    echo "<option selected value='auther' >Автору </option>";
    echo "<option value='title' >Названию</option>";
    echo "<option value='date_read'>Недавно прочитанные</option>";
    echo "<option value='date_add'>Недавно добавленные</option>";
	$query = "SELECT * FROM $table WHERE title != ' ' ORDER BY auther ";	
	break;
   }  
   }
  echo "</select>";
  echo "</p>";
  ?>
  </div>
  <div id="content">
  <?php
  $res = mysql_query($query) or die(mysql_error()); 
  $number = mysql_num_rows($res);
  
  if ($number == 0) { 
   echo "<CENTER><p>Нет книг</p></CENTER>";
  } 
  else
  {
   $ul .= "<ul>";
   for($i=0;$i<$number;$i++)
   {
    $row=mysql_fetch_array($res);
    $str=$row[5];
	$ul .= "<li><button><img src='".$row[img]."' ></button></li>";
   } 
   $ul .= "</ul>";
   echo $ul;
  }
 ?>
 
 
 </div>
 
 <div id="footer" align="center">
 <ul>
  <li><a href="#">Добавить в любимые</a></li>
  <li><a href="#">Добавить в коллекцию</a></li>
 </ul>
 </div>
</body>
</html>
<script language="javascript" type="text/javascript">

function periodicals()
{
document.getElementById("content").innerHTML = 'Периодика'
}
function favourites()
{
document.getElementById("content").innerHTML = 'Любимые'
}
function collection()
{
document.getElementById("content").innerHTML = 'Коллекция'
}
function book_title()
{
var str=document.all.SORT.options[document.all.SORT.selectedIndex].value;
document.location='lib.php?sort='+str;
}

</script>




