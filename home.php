<?php
	require('db_con.php');
	$index=$_POST['index_no'];
	$act=$_POST['activity'];
	$val=$_POST['value'];

	$db->add_activity($index, $act, $val);
?>

<!DOCTYPE html>

<html>
<head>
</head>
<body>
	<form method="POST">
		<input type="text" name = "index_no" placeholder="broj indeksa">
		<input type="text" name = "activity" >
		<input type="text" name = "value"><br>
		<input type="submit" value="gori!">    
	</form>
</body>
</html>