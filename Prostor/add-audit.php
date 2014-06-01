<?php
  include 'dbconnect.php';
  dbconnect();

  $table="clients";

  $auditmessages         = $_GET['messages_audit'];
  $auditdatepicker       = $_GET['datepicker_audit'];
  $plotnumber            = $_GET['plot_number'];
  $contractnumber        = $_GET['contract_number'];
  $landarea              = $_GET['land_area'];
  $parameters_the_deal_1 = $_GET['parameters_the_deal_1'];
  $parameters_the_deal_2 = $_GET['parameters_the_deal_2'];
  $parameters_the_deal_3 = $_GET['parameters_the_deal_3'];
  $utensils              = $_GET['utensilis'];
  $contract_value        = $_GET['contract_value'];
  $kv                    = $_GET['kv'];
  $id                    = $_GET['id'];
  
  
  $query = "UPDATE $table SET AuditMessages='$auditmessages', AuditDatepicker='$auditdatepicker', PlotNumber='$plotnumber', ContractNumber='$contractnumber', LandArea='$landarea', ParamDeal1='$parameters_the_deal_1', ParamDeal2'=$parameters_the_deal_2', ParamDeal3'=$parameters_the_deal_3', Utensils='$utensils', ContractValue='$contract_value', KV='$kv' WHERE ID='$id'";
  mysql_query($query);
  
  echo $_GET['id'];
  $ref = 'Location: /clientlist.php?fio='.$_GET['fio'].'&id='.$_GET['id'];
  header($ref);
 ?>