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
<body class="staff">
	<div class="wrap">
		<div class="head">
			<div class="logo">
				<a href="#"><img src="logo.png" border="0" alt=""></a>
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
				<span class="name"><?php echo $_GET['fio']?></span>
				<span class="logout"><a href="/logout">Выйти</a></span>
			</div>
		</div>
		<div class="container">
			<div class="sidebar">
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
					<h1>Платежи</h1>
					<form action="" class="search_add_remove">
						<div class="search">
							<input type="text" name="search" id="search" size="20" value="">
							<input type="submit" class="button" value="Поиск">
						</div>
						 <a href="add-payment.php?fio=<?php echo $_GET['fio'];?>&id=<?php echo $_GET['id']; ?>" class="add_user">Добавить платеж</a>
                                                
					</form>
					<table >
					  <thead>
					  	<tr>
					  	  <th>Цель платежа</th>
					  	  <th>Категория</th>
					  	  <th>Сумма</th>
					  	  </tr>
					  </thead>
					  <tbody>
					   <?php
  dbconnect();
  $table="payment";
                               
  $res = mysql_query("SELECT * FROM $table");

  for ($i = 0; $i < mysql_num_rows($res); $i++)
  {
         $row = mysql_fetch_array($res);
         echo "<tr>";
         echo "<td>".$row['target']."</td><td>".$row['cat']."</td><td>".$row['sum']."</td>";		 
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