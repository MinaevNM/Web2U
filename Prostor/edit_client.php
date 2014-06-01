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
					<h1>Клиентская карточка (поля для заполнения менеджером)</h1>
					<form action="add-client.php" id="client">
						<fieldset class="left">
							<div class="surname">
								<label for="surname">Фамилия</label>
                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['Surname'];
								   
								 ?>
							</div>
							<div class="name">
								<label for="name">Имя</label>
                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['Name'];
								   
								 ?>
							</div>
							<div class="patronymic">
								<label for="patronymic">Отчество</label>
                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['Patronymic'];
								   
								 ?>
							</div>
							<div class="sex">
								<label for="sex">Пол</label>
								                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  if ($row['Sex'] == 'm')
    echo "мужской";
  else
    echo "женский";  
								 ?>

								</div>
							<div class="phone">
								<label for="phone">Телефон</label>
								                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['Phone'];
  							 ?>
							</div>
							<div class="city">
								<label for="city">Город</label>
									                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['City'];
								 ?>
						</div>
							<div class="address">
								<label for="address">Адрес</label>
									                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['Address'];
								 ?>
						</div>
							<div class="locations">
								<label for="locations">Место проживания</label>
																                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  if ($row['Locations'] == 1)
    echo "Квартира";
  else
    echo "Загородный дом";  
								 ?>

							</div>
							<div class="name_competitor">
								<label for="name_competitor">Название конкурента</label>
														                                 <?php
  dbconnect();
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['NameCompetitor'];
								 ?>
	</div>
							<div class="How_give">
								<label for="How_give">Сколько готов отдать</label>
								                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['HowGive'];
								 ?>
							</div>
						</fieldset>
						<fieldset class="right">
							<div class="date">
							<label for="datepicker_audit">Дата звонка менеджеру:</label>
								                                 <?php
  dbconnect();
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['DatePicker'];
								 ?>
							</div>
							<div class="add_venue">
								<label for="add_venue">Добавить место встречи</label>
																                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  if ($row['AddVenue'] == 1)
    echo "Офис";
  else
    echo "Просмотр";  
								 ?>

							</div>
							<div class="status">
								<label for="status">Статус</label>
																                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  switch ($row['Status'])
  {
  case 1:
    echo "Активная проработка";
	break;
  case 2:
    echo "В работе";
	break;
  case 3:
    echo "Купил";
	break;
  case 4:
    echo "Дохлый";
	break;
  case 5:
    echo "Перспективный";
	break;

	}  
  ?>

							</div>
							<div class="where_know_us">
								<label for="where_know_us">Откуда о нас узнали?</label>
																								                                 <?php
  dbconnect();
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  switch ($row['Status'])
  {
  case 1:
    echo "Радио";
	break;
  case 2:
    echo "Телевидение";
	break;
  case 3:
    echo "Исходящий звонок";
	break;
  case 4:
    echo "Рекламные щиты";
	break;
  case 5:
    echo "Реклама на транспорте";
	break;
  case 6:
    echo "Реклама в метро";
	break;

	}  
  ?>	</div>
							<div class="messages_manager">
								<label for="messages_manager">Рабочие примечания (комментарии которые будут вносится менеджером)</label>
													                                 <?php
  dbconnect();
                                                                                                               
  $table="clients";
                       
  $edit = $_GET['edit'];					   
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$edit'");
  $row = mysql_fetch_array($res);
  echo $row['Message'];
								 ?>

							</div>
						</fieldset>
					</form>
<?php
  $id = $_GET['id'];
  dbconnect();
  $table="staff";

  $res = mysql_query("SELECT * FROM $table WHERE ID = '$id'");
 
  $row = mysql_fetch_array($res);
  $ref = "client2.php";
  if ($row['Position'] == '2')
     include($ref);

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