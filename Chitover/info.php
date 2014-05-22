<!DOCTYPE html>
<?php
  $id=$_POST['id'];
?>


</head>
<body>
<p class="aligner">
<a href="#" onclick="ind()" ><img src="images/chitover_logo.jpg" border="0"></a></p><br>
Блог с комментариями и статьями
<table border="1">
<tr><td>Статья Ивана Иванова</td></tr>
<tr><td>Текст статьи Ивана Иванова</td></tr>
<tr><td>Комментарий Петра Петрова</td></tr>
</table>
</body>
<form action='index.php' method='post' name='tophp'>
<input type=hidden name=idr id=idr value=''>
</form>
<script language="javascript" type="text/javascript">
function ind()
{
	var f = document.forms['tophp'];
    document.getElementById("idr").value = "<?php echo $id ?>";
    f.submit();
}
</script>
</html>
