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
<body class="filters">
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
				<span class="name"><?php echo $_GET['fio']?></span>
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
					<h1>Фильтры/Фильтр по названию</h1>
					<form action="start_filter.php?fio=<?php echo $_GET['fio']; ?>&id=<?php echo $_GET['id']; ?>" id="filters">
						<fieldset class="left">
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
							<div class="city">
								<label for="city">Город</label>
								<select name="city" id="city">
									<option value="Киев">Киев</option>
									<option value="Москва">Москва</option>
								</select>						
							</div>
							<div class="locations">
								<label for="locations">Место проживания</label>
								<select name="locations" id="locations">
									<option value="1">Квартира</option>
									<option value="2">Загородный дом</option>
								</select>
							</div>
							<div class="utensils">
								<label for="utensils">Принадлежность</label>
								<select name="utensils" id="utensils">
									<option value="1">Мега-инвест</option>
									<option value="2">Альфа-инвест</option>
									<option value="3">Астра-инвест</option>
									<option value="4">ИП</option>
								</select>
							</div>
							<div class="land_area">
								<label for="land_area">Площадь участка</label>
								<select name="land_area" id="land_area">
									<option value="1">6 соток</option>
									<option value="2">12 соток</option>
									<option value="3">17 соток</option>
								</select>
							</div>
						</fieldset>
						<fieldset class="right">
							<div class="add_venue">
								<label for="add_venue">Добавить место встречи</label>
								<select name="add_venue" id="add_venue">
									<option value="1">Офис</option>
									<option value="2">Просмотр</option>
								</select>
							</div>
							<div class="status">
								<label for="status">Статус</label>
								<select name="status" id="status">
									<option value="1">Активная проработка</option>
									<option value="2">В работе</option>
									<option value="3">Купил</option>
									<option value="4">Дохлый</option>
									<option value="5">Перспективный</option>
								</select>
							</div>
							<div class="where_know_us">
								<label for="where_know_us">Откуда о нас узнали?</label>
								<select name="where_know_us" id="where_know_us">
									<option value="1">Радио</option>
									<option value="2">Телевидение</option>
									<option value="3">Исходящий звонок</option>
									<option value="4">Рекламные щиты</option>
									<option value="5">Реклама на транспорте</option>
									<option value="6">Реклама в метро</option>
								</select>
							</div>
							<div class="parameters_the_deal">
								<label for="parameters_the_deal_1">Параметры сделки</label>
								<select name="parameters_the_deal_1" id="parameters_the_deal_1">
									<option value="1">Купля/Продажа</option>
									<option value="2">Инвест. договор</option>
									<option value="3">Общедолевая стоимость</option>
									<option value="4">ОДС</option>
									<option value="5">договор (газ)</option>
								</select>
								<select name="parameters_the_deal_2" id="parameters_the_deal_2">
									<option value="1">Подводки</option>
									<option value="2">Электричество</option>
									<option value="3">Газ</option>
									<option value="4">Вода</option>
								</select>
								<select name="parameters_the_deal_3" id="parameters_the_deal_3">
									<option value="1">ДНП</option>
									<option value="2">Взнос</option>
									<option value="3">Членство</option>
								</select>
							</div>
						</fieldset>
						<div class="actions">
							<input type="submit" class="button" value="фильтровать">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>