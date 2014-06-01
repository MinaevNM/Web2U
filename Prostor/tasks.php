<!doctype html>
<?php
  include 'dbconnect.php';
?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Родные Просторы</title>
	<script src="jquery-2.1.1.min.js"></script>
	<script src="all.js"></script>
	<link rel="stylesheet" href="all.css">
</head>
<body>
	<div class="wrap">
		<div class="head">
			<div class="logo">
				<a href="#"><img src="logo.png"  border="0" alt=""></a>
			</div>
			<div class="main_menu">
				<ul>
					<li class="staff"><a href="staff.php?fio=<?php echo $_GET['fio'];?>&id=<?php echo $_GET['id'];?>">Сотрудники</a></li>
					<li class="tasks"><a href="tasks.php?fio=<?php echo $_GET['fio'];?>&id=<?php echo $_GET['id'];?>">Задачи</a></li>
					<li class="invoice"><a href="invoice.php?fio=<?php echo $_GET['fio'];?>&id=<?php echo $_GET['id'];?>">Счета</a></li>
					<li class="statistics"><a href="statistics.php?fio=<?php echo $_GET['fio'];?>&id=<?php echo $_GET['id'];?>">Статистика</a></li>
					<li class="filters"><a href="filters.php?fio=<?php echo $_GET['fio'];?>&id=<?php echo $_GET['id'];?>">Фильтры</a></li>
				</ul>
			</div>
			<div class="profile">
				<span class="name">
<?php
  echo $_GET['fio'];
?>
</span>
				<span class="logout"><a href="/logout.php">Выйти</a></span>
			</div>
		</div>
		<div class="container">
			<div class="sidebar">
				<div class="search_add_remove">
                                        <a href="add-task.php?fio=<?php echo $_GET['fio']; ?>&id=<?php echo $_GET['id'];?>" class="add_user">Создать задачу</a>
				</div>
				<div class="block menu">
					<h2>Все сотрудники:</h2>
					<div class="content">
						<ul>
                                                        <?php

  dbconnect();
                                                                                                               
  $table="staff";
                               
  $res = mysql_query("SELECT * FROM $table");

  for ($i = 0; $i < mysql_num_rows($res); $i++)
  {
         echo "<li><a href=\"#\">";
 
         $row = mysql_fetch_array($res, MYSQL_ASSOC);
          
         $obj = mysql_fetch_field($res, 2);
         echo $row[$obj->name]." ";
         $obj = mysql_fetch_field($res, 1);
         echo $row[$obj->name];
         echo "</a></li>";     
  }                



                                                        ?>
						</ul>
					</div>
				</div>
				<div class="block menu">
					<h2>Категории сотрудников:</h2>
					<div class="content">
						<ul>
                                                        <?php
 // include("dbconnect.php");
  dbconnect();
                                                                                                               
  $table="staff";
                               
  $res = mysql_query("SELECT * FROM $table WHERE POSITION = 1");
  echo "<li><a href=\"#\">Менеджеры (".mysql_num_rows($res).")</a></li>";
  $res = mysql_query("SELECT * FROM $table WHERE POSITION = 2");
  echo "<li><a href=\"#\">Аудиторы (".mysql_num_rows($res).")</a></li>"; ?>

						</ul>
					</div>
				</div>
				<div class="block menu">
				  <div class="content">
				    <a href="clientlist.php?fio=<?php echo $_GET['fio']; ?>&id=<?php echo $_GET['id'];?>">Список покупателей:</a>
				  </div>
				</div>

			</div>
			<div id="content">
				<div class="title_page">
					<h1>Мои задачи</h1>
					<table class="tg">
					  <thead>
					  	<tr>
<?php
 dbconnect();
 $table="staff";
 $id = $_GET['id'];
 $res = mysql_query("SELECT * FROM $table WHERE ID = '$id'");
 $row = mysql_fetch_array($res);
 if ($row['Position'] == "2")
  echo "<th>Удалить</th><th>Редактировать</th>";
?>
					  	  <th>Задача</th>
					  	  <th>Активность</th>
					  	  <th>Дедлайн</th>
					  	  <th>Исполнитель</th>
					  	  <th>Постановщик</th>
					  	</tr>
					  </thead>
					  <tbody>
                                          <?php
           
//  include("dbconnect.php");
  dbconnect();
                                                                                                               
  $table="tasks";
                               
  $res = mysql_query("SELECT * FROM $table");

  for ($i = 0; $i < mysql_num_rows($res); $i++)
  {
         $row = mysql_fetch_array($res);
         echo "<tr>";
         $id = $_GET['id'];
         $table2 = "staff";
         $res2 = mysql_query("SELECT * FROM $table2 WHERE ID = '$id'");
         $row2 = mysql_fetch_array($res2);
         if ($row2['Position'] == "2")
         {
           echo "<td><a border=\"0\" href=\"delete_task.php?fio=".$_GET['fio']."&id=".$_GET['id']."&del=".$row['id']."\"><img src=\"i\icon_x.png\"></a></td>";
           echo "<td><a border=\"0\" href=\"edit_task.php?fio=".$_GET['fio']."&id=".$_GET['id']."&edit=".$row['id']."\"><img width=\"20\" height=\"20\" src=\"i\edit.png\"></a></td>";
         }
          
         echo "<td>Задача".$row['id']."</td>";
         echo "<td>".$row['dayAct']." ";
         switch ($row['monthAct'])
         {
         case 1:
           echo "Января";
           break;
         case 2:
           echo "Февраля";
           break;
         case 3:
           echo "Марта";
           break;
         case 4:
           echo "Апреля";
           break;
         case 5:
           echo "Мая";
           break;
         case 6:
           echo "Июня";
           break;
         case 7:
           echo "Июля";
           break;
         case 8:
           echo "Августа";
           break;
         case 9:
           echo "Сентября";
           break;
         case 10:
           echo "Октября";
           break;
         case 11:
           echo "Ноября";
           break;
         case 12:
           echo "Декабря";
           break;
         }
         echo "</td><td>".$row['dayDead']." ";
         switch ($row['monthDead'])
         {
         case 1:
           echo "Января";
           break;
         case 2:
           echo "Февраля";
           break;
         case 3:
           echo "Марта";
           break;
         case 4:
           echo "Апреля";
           break;
         case 5:
           echo "Мая";
           break;
         case 6:
           echo "Июня";
           break;
         case 7:
           echo "Июля";
           break;
         case 8:
           echo "Августа";
           break;
         case 9:
           echo "Сентября";
           break;
         case 10:
           echo "Октября";
           break;
         case 11:
           echo "Ноября";
           break;
         case 12:
           echo "Декабря";
           break;
         }

         echo "</td><td>".$row['Executor']."</td>";
         echo "<td>".$row['Creator']."</td>";
  
         echo "</tr>";     
  }                
?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>