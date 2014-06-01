<!doctype html>
<?php 
include 'dbconnect.php';
?>
<head>
	<meta charset="UTF-8">
         <title>Родные просторы</title>	
	<script src="jquery-2.1.1.min.js"></script>
	<script src="all.js"></script>
	<link rel="stylesheet" href="all.css">
</head>
<body link="#4B8EB7" alink="#4B8EB7"  class="staff">
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
                                    <h2><a href="clientlist.php?fio=<?php echo $_GET['fio']; ?>&id=<?php echo $_GET['id'];?>">Список покупателей:</a></h2>
				  </div>
				</div>

			</div>
			<div id="content">
				<div class="title_page">
					<h1>Покупатели</h1>
					<form action="search_client.php" class="search_add_remove">
						<div class="search">
							<input type="text" name="search" id="search" size="20" value="<?php echo $_GET['search']; ?>">
							<input type="submit" class="button" value="Поиск">
						</div>
						<?php
  dbconnect();
                                                                                                               
  $table="staff";

  $id = $_GET['id'];  
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$id'");
 
  $row = mysql_fetch_array($res);
  if ($row['Position'] == '1')
	echo "<a href=\"client.php?fio=".$_GET['fio']."&id=".$_GET['id']."\" class=\"add_user\">Создать покупателя</a>";
						?>
					
					</form>
					<form action="" class="search_add_remove">
					<table>
					  <thead>
					  	<tr>
						<?php
  dbconnect();
                                                                                                               
  $table="staff";

  $id = $_GET['id'];  
  $res = mysql_query("SELECT * FROM $table WHERE ID = '$id'");
 
  $row = mysql_fetch_array($res);
  if ($row['Position'] == '2')
     echo  "<th>Удалить</th><th>Редактировать</th>";
						  ?>
					  	  <th>ФИО</th>
					  	  <th>Статус</th>
					  	  <th>Дата заказа</th>
					  	  <th>Телефон</th>
					  	</tr>
					  </thead>
					  <tbody>
                                                <?php
           
  dbconnect();
                                                                                                               
  $table="clients";
                               
  $res = mysql_query("SELECT * FROM $table");

  $search = $_GET['search'];
  for ($i = 0; $i < mysql_num_rows($res); $i++)
  {
         $row = mysql_fetch_array($res, MYSQL_ASSOC);
       
         $flag = false;
		 if ($search == "" || ($row['Status'] == 1 && substr_count("Активная проработка", $search) > 0))
		   $flag = true;
         if ($search == "" || ($row['Status'] == 2 && substr_count("В работе", $search) > 0))
		   $flag = true; 
		 if ($search == "" || ($row['Status'] == 3 && substr_count("Купил", $search) > 0))
		   $flag = true; 
		 if ($search == "" || ($row['Status'] == 4 && substr_count("Дохлый", $search) > 0))
		   $flag = true; 
		 if ($search == "" || ($row['Status'] == 5 && substr_count("Перспективный", $search) > 0))
		   $flag = true; 

		   if ($flag || substr_count($row['DatePicker'], $search) > 0 || substr_count($row['Name'], $search) > 0 || substr_count($row['Surname'], $search) > 0 || substr_count($row['Patronymic'], $search) > 0 || substr_count($row['Phone'], $search) > 0)
         {

         echo "<tr>";
 

		 $table="staff";
		 $id = $_GET['id'];
         $res2 = mysql_query("SELECT * FROM $table WHERE ID = '$id'");
         $row2 = mysql_fetch_array($res2);
         if ($row2['Position'] == '2')
		 {
		 	 echo "<td><a border=\"0\" href=\"delete_client.php?fio=".$_GET['fio']."&id=".$_GET['id']."&del=".$row['id']."\"><img src=\"i\icon_x.png\"></a></td>";
			 echo "<td><a border=\"0\" href=\"edit_client.php?fio=".$_GET['fio']."&id=".$_GET['id']."&edit=".$row['id']."\"><img width=\"20\" height=\"20\" src=\"i\edit.png\"></a></td>";
	     }
		 echo "<td>".$row['Surname']." ".$row['Name']." ".$row['Patronymic']."</td>";
		 echo "<td>";
         switch ($row['Status'])
         {
         case '1':
           echo "Активная проработка";
           break;
         case '2':
           echo "В работе";
           break;
         case '3': 
           echo "Купил";
           break;
         case '4': 
           echo "Дохлый";
           break;
         case '5': 
           echo "Перспективный";
           break;
         }
         echo "</td>";
	 echo "<td>".$row['DatePicker']."</td>";
	 echo "<td>".$row['Phone']."</td>";
         
         echo "</tr>";     
		 }
  
}  


                                                 ?>
					  </tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>