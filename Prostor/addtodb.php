<?php 
  include("dbconnect.php");
  dbconnect();

  $table="staff";


  $surname    = $_POST['surname'];
  $name       = $_POST['name'];                                          
  $patronymic = $_POST['patronymic'];
  $sex        = $_POST['sex'];
  $year       = $_POST['year'];
  $month      = $_POST['month'];
  $day        = $_POST['day'];
  $birthday   = date(DATE_ATOM, mktime(0, 0, 0, (int)$month, (int)$day, (int)$year));
  $phone      = $_POST['phone'];
  $city       = $_POST['city'];
  $address    = $_POST['address'];
  $position   = $_POST['position'];
  $mail       = $_POST['mail'];
  $fio        = $_GET['fio'];
  $id         = $_GET['id'];

  mysql_query("DELETE FROM $table WHERE SURNAME = '$surname'");
   
  $query = "INSERT INTO $table(Surname, Name, Patronymic, Sex, Birthday, Phone, City, Address, Position, Mail) VALUES ('$surname','$name','$patronymic','$sex','$birthday','$phone','$city', '$address', '$position', '$mail')";
  mysql_query($query);
 
  $ref = "Location: /staff.php?id=".$id."&fio=".$fio;
  header($ref);

?>