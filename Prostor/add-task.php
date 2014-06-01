<!doctype html>
<?php
  include 'dbconnect.php'
?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Родные Просторы</title>
	<script src="jquery-2.1.1.min.js"></script>
	<script src="all.js"></script>
	<link rel="stylesheet" href="all.css">
</head>
<body class="add_staff">
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
				<span class="name"><?php echo $_GET['fio']; ?></span>
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
  echo "<li><a href=\"#\">Менеджер (".mysql_num_rows($res).")</a></li>";
  $res = mysql_query("SELECT * FROM $table WHERE POSITION = 2");
  echo "<li><a href=\"#\">Аудитор (".mysql_num_rows($res).")</a></li>"; ?>

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
					<h1>Добавление задачи</h1>
					<form action="addtask.php" method="GET" id="add_staff">
						<fieldset class="date">
							<legend>Активность </legend>
							<div class="month">
								<label for="month">Месяц</label>
								<select name="month" id="month">
                                                                        <option value="1">Январь</option>
									<option value="2">Февраль</option>
									<option value="3">Март</option>
									<option value="4">Апрель</option>
									<option value="5">Май</option>
									<option value="6">Июнь</option>
									<option value="7">Июль</option>
									<option value="8">Август</option>
									<option value="9">Сентябрь</option>
                                                                        <option value="10">Октябрь</option>
									<option value="11">Ноябрь</option>
									<option value="12">Декабрь</option>
								</select>						
							</div>
							<div class="day">
								<label for="day">День</label>
								<select name="day" id="day">
                                                                        <?php
                                                                          for ($i = 1; $i < 32; $i++)
									     echo "<option value=\"".$i."\">".$i."</option>";
                                                                        ?>
								</select>						
							</div>
						</fieldset>
						<fieldset class="date">
							<legend>Дедлайн </legend>
							<div class="month">
								<label for="month">Месяц</label>
								<select name="dmonth" id="dmonth">
                                                                        <option value="1">Январь</option>
									<option value="2">Февраль</option>
									<option value="3">Март</option>
									<option value="4">Апрель</option>
									<option value="5">Май</option>
									<option value="6">Июнь</option>
									<option value="7">Июль</option>
									<option value="8">Август</option>
									<option value="9">Сентябрь</option>
                                                                        <option value="10">Октябрь</option>
									<option value="11">Ноябрь</option>
									<option value="12">Декабрь</option>
								</select>						
							</div>
							<div class="day">
								<label for="day">День</label>
								<select name="dday" id="dday">
                                                                        <?php
                                                                          for ($i = 1; $i < 32; $i++)
									     echo "<option value=\"".$i."\">".$i."</option>";
                                                                        ?>
								</select>						
							</div>
						</fieldset>

						<div class="Executor">
							<label for="Executor">Исполнитель</label>
							<input type="text" name="Executor" id="Executor" size="20" value="">
						</div>
						<div class="Creator">
							<label for="Creator">Создатель</label>
							<input type="text" name="Creator" id="Creator" size="20" value="">
						</div>
						<input type="submit" class="button" value="Добавить задачу">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>