<?php
  include("dbconnect.php");
  dbconnect();
                                                                                                               
  $table="staff";

  $del = $_GET['del'];
  $res = mysql_query("DELETE FROM $table WHERE ID = '$del'");

  $ref = 'Location: /staff.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);
?>