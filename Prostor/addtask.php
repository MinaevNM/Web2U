<?php 
  include("dbconnect.php");
  dbconnect();

  $table="tasks";

  $dayAct = $_POST['day'];
  $monthAct = $_POST['month'];
  $dayDead = $_POST['dday'];
  $monthDead = $_POST['dmonth'];
  $executor = $_POST['Executor'];
  $creator = $_POST['Creator'];
   
  $query = "INSERT INTO $table(dayAct, monthAct, dayDead, monthDead, Executor, Creator) VALUES ('$dayAct','$monthAct','$dayDead','$monthDead','$executor','$creator')";
  mysql_query($query);
  $ref = 'Location: /tasks.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);

?>