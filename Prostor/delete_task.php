<?php
  include("dbconnect.php");
  dbconnect();
                                                                                                               
  $table="tasks";

  $del = $_GET['del'];
  $res = mysql_query("DELETE FROM $table WHERE ID = '$del'");

  $ref = 'Location: /tasks.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);
?>