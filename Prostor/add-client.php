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

  $table="clients";

  $surname         = $_GET['surname'];
  $name            = $_GET['name'];                                          
  $patronymic      = $_GET['patronymic'];
  $sex             = $_GET['sex'];
  $phone           = $_GET['phone'];
  $city            = $_GET['city'];
  $address         = $_GET['address'];
  $locations       = $_GET['locations'];   
  $name_competitor = $_GET['name_competitor'];   
  $how_give        = $_GET['How_give'];
  $datepicker      = $_GET['datepicker'];
  $add_venue       = $_GET['add_venue'];
  $status          = $_GET['status'];
  $where_know_us   = $_GET['where_know_us'];
  $messages_manager= $_GET['messages_manager'];

  $query = "INSERT INTO $table(Surname, Name, Patronymic, Sex, Phone, City, Address, Locations, NameCompetitor, HowGive, DatePicker, AddVenue, Status, WhereKnow, Message) VALUES ('$surname','$name','$patronymic','$sex','$phone','$city','$address','$locations','$name_competitor','$how_give','$datepicker','$add_venue','$status','$where_know_us','$messages_manager')";
  mysql_query($query);
 ?>