<?php
  include("dbconnect.php");
  dbconnect();

  $table="clients";

  $surname         = $_POST['surname'];
  $name            = $_POST['name'];                                          
  $patronymic      = $_POST['patronymic'];
  $sex             = $_POST['sex'];
  $phone           = $_POST['phone'];
  $city            = $_POST['city'];
  $address         = $_POST['address'];
  $locations       = $_POST['locations'];   
  $name_competitor = $_POST['name_competitor'];   
  $how_give        = $_POST['How_give'];
  $datepicker      = $_POST['datepicker'];
  $add_venue       = $_POST['add_venue'];
  $status          = $_POST['status'];
  $where_know_us   = $_POST['where_know_us'];
  $messages_manager= $_POST['messages_manager'];
  $fio=$_GET['fio'];
  $id=$_GET['id'];
  $query = "INSERT INTO $table(Surname, Name, Patronymic, Sex, Phone, City, Address, Locations, NameCompetitor, HowGive, DatePicker, AddVenue, Status, WhereKnow, Message) VALUES ('$surname','$name','$patronymic','$sex','$phone','$city','$address','$locations','$name_competitor','$how_give','$datepicker','$add_venue','$status','$where_know_us','$messages_manager')";
  mysql_query($query);
  
  $ref = 'Location: /clientlist.php?fio='.$fio.'&id='.$id;
  header($ref);

 ?>