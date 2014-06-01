<!doctype html>
<?php
  include 'dbconnect.php';
?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Родные Просторы</title>
	<script src="jquery-2.1.1.min.js"></script>
	<script src="jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="jquery.ui.datepicker-ru.js"></script>
	<script src="all.js"></script>
	<link rel="stylesheet" href="all.css">
	<link rel="stylesheet" href="redmond/jquery-ui-1.10.4.custom.min.css">
</head>
<body class="client">
	<div class="wrap">
		<div class="head">
			<div class="logo">
				<a href="#"><img src="logo.png" alt="" border="0"></a>
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
				<span class="name"><?php echo $_GET['fio'];?></span>
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
  echo "<li><a href=\"#\">Аудиторы (".mysql_num_rows($res).")</a></li>"; 
  $id=$_GET['id'];
  $fio=$_GET['fio'];
  $str="add-client.php?id=".$id."&fio=".$fio;
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
					<h1>Клиентская карточка (поля для заполнения менеджером)</h1>
					<form action="<?php echo $str ?>" method="POST" id="client">
						<fieldset class="left">
							<div class="surname">
								<label for="surname">Фамилия</label>
                                                                <input type="text" name="surname" id="surname" size="30" value="">
							</div>
							<div class="name">
								<label for="name">Имя</label>
                                                                <input type="text" name="name" id="name" size="30" value="">
							</div>
							<div class="patronymic">
								<label for="patronymic">Отчество</label>
                                                                <input type="text" name="patronymic" id="patronymic" size="30" value="">
							</div>
							<div class="sex">
								<label for="sex">Пол</label>
								<select name="sex" id="sex">
									<option value="male">мужской</option>
									<option value="female">женский</option>
								</select>						
							</div>
							<div class="phone">
								<label for="phone">Телефон</label>
								<input type="text" name="phone" id="phone" size="20" value="">
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
							<div class="locations">
								<label for="locations">Место проживания</label>
								<select name="locations" id="locations">
									<option value="1">Квартира</option>
									<option value="2">Загородный дом</option>
								</select>
							</div>
							<div class="name_competitor">
								<label for="name_competitor">Название конкурента</label>
								<input type="text" name="name_competitor" id="name_competitor" size="20" value="">
							</div>
							<div class="How_give">
								<label for="How_give">Сколько готов отдать</label>
								<input type="text" name="How_give" id="How_give" size="20" value="">
							</div>
						</fieldset>
						<fieldset class="right">
							<div class="date">
							<label for="datepicker_audit">Дата звонка менеджеру:</label>
								<input name="datepicker" type="text" id="datepicker">
								<div id="date"></div>
							</div>
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
							<div class="messages_manager">
								<label for="messages_manager">Рабочие примечания (комментарии которые будут вносится менеджером)</label>
								<textarea name="messages_manager" id="" cols="30" rows="10"></textarea>
							</div>
						</fieldset>
						<div class="actions">
							<input type="submit" class="button" value="Сохранить">
						</div>
					</form>
<?php
  $id = $_GET['id'];
  	
  dbconnect();
                                                                                                               
  $table="staff";

  $res = mysql_query("SELECT * FROM $table WHERE ID = '$id'");
 
  $row = mysql_fetch_array($res);
  if ($row['Position'] == '2')
     include("client.html");

?>
				</div>
			</div>
		</div>
	</div>
</body>
<script>

	$('#date').datepicker({
	    inline: true,
	    altField: '#datepicker',
	    dateFormat: "d M yy",
	    changeMonth: true,
        changeYear: true,
	});

	$('#datepicker').change(function(){
	    $('#date').datepicker('setDate', $(this).val());
	});


	$('#date_audit').datepicker({
	    inline: true,
	    altField: '#datepicker_audit',
	    dateFormat: "d M yy",
	    changeMonth: true,
        changeYear: true,
	});

	$('#datepicker_audit').change(function(){
	    $('#date_audit').datepicker('setDate', $(this).val());
	});



  </script>
</html>