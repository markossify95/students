<?php
	
	if(!empty($_POST['user']) and !empty($_POST['pass']) and isset($_POST['user']) and isset($_POST['pass']))
	{
		$username=htmlspecialchars($_POST['user']);
		$password=htmlspecialchars($_POST['pass']);

		//mysql_real_escape_string
	}	

?>


<!DOCTYPE HTML>

<html>
<head>

<link rel="stylesheet" type="text/css" href="static/main.css">

</head>
<body>


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Ulogujte se za nastavak</h1><br>
				  <form method="post">
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
</body>

</html>