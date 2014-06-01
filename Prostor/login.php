<?php
  $login = $_GET['login'];
  $pass  = $_GET['pass'];

  include("dbconnect.php");
  dbconnect();

  $table="staff";

  $res = mysql_query("SELECT * FROM $table WHERE SURNAME = '$login'");

  if (mysql_num_rows($res) > 0 && $pass == 'root')
  {
    $row = mysql_fetch_array($res);
    $fio = $row['Surname']." ".$row['Name'][0].$row['Name'][1].". ".$row['Patronymic'][0].$row['Patronymic'][1].".";
    $id  = $row['id'];
    $ref = 'Location: /tasks.php?fio='.$fio."&id=".$id;
    header($ref);
  }
  else
    echo "<a href=\"index.php\">Неправильные логин и пароль</a>";
?>
