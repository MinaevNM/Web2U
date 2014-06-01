<?php 
  include("dbconnect.php");
  dbconnect();

  $table="tasks";

  $dayAct = $_GET['day'];
  $monthAct = $_GET['month'];
  $dayDead = $_GET['dday'];
  $monthDead = $_GET['dmonth'];
  $executor = $_GET['Executor'];
  $creator = $_GET['Creator'];
   
  $query = "INSERT INTO $table(dayAct, monthAct, dayDead, monthDead, Executor, Creator) VALUES ('$dayAct','$monthAct','$dayDead','$monthDead','$executor','$creator')";
  mysql_query($query);
  $ref = 'Location: /tasks.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);

?>