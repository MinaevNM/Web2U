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
				<span class="logout"><a href="/logout.php">Выйти</a></span>
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
  echo "<li><a href=\"#\">Аудитор (".mysql_num_rows($res).")</a></li>"; 
  $id=$_GET['id'];
  $fio=$_GET['fio'];
  $str="addtodb.php?id=".$id."&fio=".$fio;
  ?>

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
					<h1>Добавление сотрудника</h1>
					<form action=<?php echo $str ?> method="post" id="add_staff">
						<div class="surname">
							<label for="surname">Фамилия</label>
							<input type="text" name="surname" id="surname" size="20" value="">
						</div>
						<div class="name">
							<label for="name">Имя</label>
							<input type="text" name="name" id="name" size="20" value="">
						</div>
						<div class="patronymic">
							<label for="patronymic">Отчество</label>
							<input type="text" name="patronymic" id="patronymic" size="20" value="">
						</div>
						<div class="sex">
							<label for="sex">Пол</label>
							<select name="sex" id="sex">
								<option value="male">мужской</option>
								<option value="female">женский</option>
							</select>						
						</div>
						<fieldset class="date">
							<legend>Дата Рождения</legend>
							<div class="year">
								<label for="year">Год</label>
								<select name="year" id="year">
                                                                        <?php 
                                                                          for ($i = 1900; $i < 2014; $i++)
									     echo "<option value=\"".$i."\">".$i."</option>";
                                                                         ?>
								</select>						
							</div>
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
						<div class="phone">
							<label for="phone">Телефон</label>
							<input type="text" name="phone" id="phone" size="20" value="">
						</div>
                          	        	<div class="mail">
							<label for="mail">Почта</label>
							<input type="text" name="mail" id="mail" size="30" value="">
               					</div>
               					<div class="city">
							<label for="city">Город</label>
							<select name="city" id="city">
								<option value="Киев">Киев</option>
								<option value="Москва">Москва</option>
							</select>						
						</div>
						<div class="address">
							<label for="address">Адрес</label>
							<input type="text" name="address" id="address" size="20" value="">
						</div>
						<div class="position">
							<label for="position">Должность</label>
							<select name="position" id="position">
								<option value="1">Менеджер</option>
								<option value="2">Аудитор</option>
							</select>						
						</div>
						<input type="submit" class="button" value="Добавить контакт и соханить объект">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>