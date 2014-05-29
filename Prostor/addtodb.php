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

  $surname    = $_GET['surname'];
  $name       = $_GET['name'];                                          
  $patronymic = $_GET['patronymic'];
  $sex        = $_GET['sex'];
  $year       = $_GET['year'];
  $month      = $_GET['month'];
  $day        = $_GET['day'];
  $birthday   = date(DATE_ATOM, mktime(0, 0, 0, (int)$month, (int)$day, (int)$year));
  $phone      = $_GET['phone'];
  $city       = $_GET['city'];
  $address    = $_GET['address'];
  $position   = $_GET['position'];
  $mail       = $_GET['mail'];
  
   
  $query = "INSERT INTO $table(Surname, Name, Patronymic, Sex, Birthday, Phone, City, Address, Position, Mail) VALUES ('$surname','$name','$patronymic','$sex','$birthday','$phone','$city', '$address', '$position', '$mail')";
  mysql_query($query);
?>