<?php
  include("dbconnect.php");
  dbconnect();
                                                                                                               
  $table="clients";

  $del = $_GET['del'];
  $res = mysql_query("DELETE FROM $table WHERE ID = '$del'");

  $ref = 'Location: /clientlist.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);
?>