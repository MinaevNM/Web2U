<?php
  $login = $_GET['login'];
  $pass  = $_GET['pass'];

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

  $res = mysql_query("SELECT * FROM $table WHERE SURNAME = '$login'");

  if (mysql_num_rows($res) > 0 && $pass == 'root')
  {
    $row = mysql_fetch_array($res);
    $fio = $row['Surname']." ".$row['Name'][0].$row['Name'][1].". ".$row['Patronymic'][0].$row['Patronymic'][1].".";
    $ref = 'Location: /tasks.php?fio='.$fio;
    header($ref);
  }
  else
    echo "<a href=\"index.php\">Неправильные логин и пароль</a>";
?>
