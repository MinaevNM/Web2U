<?php 
  include("dbconnect.php");
  dbconnect();
  $table = "payment";
  
  $target = $_GET['target'];
  $cat    = $_GET['cat'];
  $sum    = $_GET['sum'];

  $query = "INSERT INTO $table(target, cat, sum) VALUES ('$target','$cat','$sum')";
  mysql_query($query);
  $ref = 'Location: /invoice.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);

?>