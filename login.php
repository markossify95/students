<?php
	
	session_start();
  	session_unset();
  	session_destroy();
	
	if(!empty($_POST['user']) and !empty($_POST['pass']) and isset($_POST['user']) and isset($_POST['pass']))
	{
		//stop XSS
		$username=htmlspecialchars($_POST['user']);
		$password=htmlspecialchars($_POST['pass']);
		require('db_con.php');
		$db = new DBConn();
		$db->sign_in($username, $password);		
		
	}	

?>

<!DOCTYPE HTML>

<html>
	<head>

		<link rel="stylesheet" type="text/css" href="static/main.css">
		<title>Login</title>
	
	</head>
	<body>


	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    	  <div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Login</h1><br>
					  <form method="post" action="login.php">
						<input type="text" name="user" placeholder="Username">
						<input type="password" name="pass" placeholder="Password">
						<input type="submit" name="login" class="login loginmodal-submit" value="Login">
					  </form>
						
					  <div class="login-help">
							<a href="#">Forgot Password</a>
					  </div>
					</div>
				</div>
			  </div>
	</body>

</html>