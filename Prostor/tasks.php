<!doctype html>
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
					<li class="staff"><a href="staff.php?fio=<?php echo $_GET['fio'];?>">Сотрудники</a></li>
					<li class="tasks"><a href="tasks.php?fio=<?php echo $_GET['fio'];?>">Задачи</a></li>
					<li class="invoice"><a href="invoice.php?fio=<?php echo $_GET['fio'];?>">Счета</a></li>
					<li class="statistics"><a href="statistics.php?fio=<?php echo $_GET['fio'];?>">Статистика</a></li>
					<li class="filters"><a href="filters.php?fio=<?php echo $_GET['fio'];?>">Фильтры</a></li>
				</ul>
			</div>
			<div class="profile">
				<span class="name">
<?php
  echo $_GET['fio'];
?>
</span>
				<span class="logout"><a href="/logout">Выйти</a></span>
			</div>
		</div>
		<div class="container">
			<div class="sidebar">
				<div class="add_task">
					<input id="add_task" type="button" value="Создать задачу">
				</div>
				<div class="block menu">
					<h2>Все сотрудники:</h2>
					<div class="content">
						<ul>
                                                        <?php
  $dblocation = "mysql47.1gb.ru";
  $dbname = "gb_x_newcrm";
  $dbuser = "gb_x_newcrm";
  $dbpasswd = "ed6cd0b3tyu";
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
  $dblocation = "mysql47.1gb.ru";
  $dbname = "gb_x_newcrm";
  $dbuser = "gb_x_newcrm";
  $dbpasswd = "ed6cd0b3tyu";
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
				    <a href="clientlist.php?fio=<?php echo $_GET['fio']; ?>">Список покупателей:</a>
				  </div>
				</div>

			</div>
			<div id="content">
				<div class="title_page">
					<h1>Мои задачи</h1>
					<table class="tg">
					  <thead>
					  	<tr>
					  	  <th>Задача</th>
					  	  <th>Активность</th>
					  	  <th>Дедлайн</th>
					  	  <th>Исполнитель</th>
					  	  <th>Постановщик</th>
					  	</tr>
					  </thead>
					  <tbody>
					  	<tr>
					  	  <td>Задача 1</td>
					  	  <td>12 января</td>
					  	  <td>20 января</td>
					  	  <td>Петрова И.В</td>
					  	  <td>Сидорова К.О</td>
					  	</tr>
					  	<tr>
					  	  <td>Задача 1</td>
					  	  <td>12 января</td>
					  	  <td>20 января</td>
					  	  <td>Петрова И.В</td>
					  	  <td>Сидорова К.О</td>
					  	</tr>
					  	<tr>
					  	  <td>Задача 1</td>
					  	  <td>12 января</td>
					  	  <td>20 января</td>
					  	  <td>Петрова И.В</td>
					  	  <td>Сидорова К.О</td>
					  	</tr>
					  	<tr>
					  	  <td>Задача 1</td>
					  	  <td>12 января</td>
					  	  <td>20 января</td>
					  	  <td>Петрова И.В</td>
					  	  <td>Сидорова К.О</td>
					  	</tr>
					  	<tr>
					  	  <td>Задача 1</td>
					  	  <td>12 января</td>
					  	  <td>20 января</td>
					  	  <td>Петрова И.В</td>
					  	  <td>Сидорова К.О</td>
					  	</tr>
					  	<tr>
					  	  <td>Задача 1</td>
					  	  <td>12 января</td>
					  	  <td>20 января</td>
					  	  <td>Петрова И.В</td>
					  	  <td>Сидорова К.О</td>
					  	</tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>