<?php

	session_start();
	require ('db_con.php');
	

	if(!isset($_SESSION['reg']))
	{
		header('Location: login.php');
	}
	if(isset($_POST['add']))
	{
		if(!empty($_POST['uname']) and isset($_POST['uname']) and isset($_POST['pwd']) and !empty($_POST['pwd']) and !empty($_POST['ind']) and isset($_POST['ind']) and ($_POST['role'] == 1 or $_POST['role'] == 0) )
		{
			$db -> sign_up($_POST['uname'], $_POST['pwd'], $_POST['ind'], $_POST['role']);
		}
		else
		{
			echo "<script>alert('Nije uspelo');</script>";
		}
	}
	else if (isset($_POST['delete']))
	{
		if(!empty($_POST['uname']) and isset($_POST['uname']) and isset($_POST['pwd']) and !empty($_POST['pwd']) and !empty($_POST['ind']) and isset($_POST['ind']) and ($_POST['role'] == 1 or $_POST['role'] == 0) )
		{	
			//delete nije gotova funkcija
			//$db -> delete($_POST['uname'], $_POST['pwd'], $_POST['ind'], $_POST['role']);
		}
		else
		{
			echo "<script>alert('Nije uspelo');</script>";
		}
	}
	else if (isset($_POST['search']))
	{
		//code
	}
	else if(isset($_POST['change']))
	{
		//code
	}
	
?>


<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="static/home.css">
				

		<title>Novi korisnik</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h2>Unos novog korisnika</h2>
					<form action="user_conf.php"  method="POST">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="uname" id="username"  placeholder="username"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="pwd" id="password"  placeholder="password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Broj indeksa</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="ind" id="ind"  placeholder="broj indeksa/godina"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label  for="name" class="cols-sm-2 control-label">Student/Admin</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<select class="form-control" id="role" name="role">
										<option value="0">Student</option>
										<option value="1">Admin</option>
										
									</select>
								</div>
							</div>
						</div>
						<div>
							<span class="form-group ">
								<input type="submit" id="button" value="Dodaj" name="add" class="btn btn-primary btn-lg btn-block login-button"/>
							</span>

							<span class="form-group ">
								<input type="submit" id="button" value="Obrisi" name="delete" class="btn btn-primary btn-lg btn-block login-button"/>
							</span>
							<span class="form-group ">
								<input type="submit" id="button" value="Izmeni" name="search" class="btn btn-primary btn-lg btn-block login-button"/>
							</span>
							<span class="form-group ">
								<input type="submit" id="button" value="Pretrazi" name="change" class="btn btn-primary btn-lg btn-block login-button"/>
							</span>
						<div>
						<br>
						<span class="form-group">
							<a href="home.php" class="link_home" >Unesi obaveze</a>
							
						</span>
						<span class="form-group" id="logout">
							<a href="login.php" action="logout.php" class="link_home" >Logout</a>
						</span>
						
					</form>
				</div>
			</div>
		</div>
	</body>
</html>