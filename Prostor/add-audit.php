<?php
  include 'dbconnect.php';
  dbconnect();

  $table="clients";

  $auditmessages         = $_POST['messages_audit'];
  $auditdatepicker       = $_POST['datepicker_audit'];
  $plotnumber            = $_POST['plot_number'];
  $contractnumber        = $_POST['contract_number'];
  $landarea              = $_POST['land_area'];
  $parameters_the_deal_1 = $_POST['parameters_the_deal_1'];
  $parameters_the_deal_2 = $_POST['parameters_the_deal_2'];
  $parameters_the_deal_3 = $_POST['parameters_the_deal_3'];
  $utensils              = $_POST['utensilis'];
  $contract_value        = $_POST['contract_value'];
  $kv                    = $_POST['kv'];
  $id                    = $_GET['id'];
  $fio                   = $_GET['fio'];
  
  $query = "UPDATE $table SET AuditMessages='$auditmessages', AuditDatepicker='$auditdatepicker', PlotNumber='$plotnumber', ContractNumber='$contractnumber', LandArea='$landarea', ParamDeal1='$parameters_the_deal_1', ParamDeal2'=$parameters_the_deal_2', ParamDeal3'=$parameters_the_deal_3', Utensils='$utensils', ContractValue='$contract_value', KV='$kv' WHERE ID='$id'";
  mysql_query($query);

  $ref = 'Location: /clientlist.php?fio='.$fio.'&id='.$id;
  header($ref);
 ?>