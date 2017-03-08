<?php
	
	if(!empty($_POST['user']) and !empty($_POST['pass']) and isset($_POST['user']) and isset($_POST['pass']))
	{
		$username=htmlspecialchars(mysql_real_escape_string($_POST['user']));
		$password=htmlspecialchars(mysql_real_escape_string($_POST['pass']));

		
	}	

?>









