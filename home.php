<?php
	
	session_start();

	require('db_con.php');

	if (!isset($_SESSION['reg']))
	{
		header("Location: login.php");
	}
	if(isset($_POST['update']))
	{
		if(isset($_POST['index_no']) and !empty($_POST['index_no']) and isset($_POST['value']) and $_POST['value'] != 0 and !empty($_POST['value']))
		{
			$index=$_POST['index_no'];
			$act=$_POST['activity'];
			$val=$_POST['value'];

			$db->add_activity($index, $act, $val);	
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="static/home.css">
				

		<title>Admin</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h2>Unos aktivnosti</h2>
					<form  action="home.php" method="post" >
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Broj indeksa</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="index_no" id="indeks_no"  placeholder="broj indeksa/godina"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Aktivnost</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<select class="form-control" id="activity" name="activity">
										<option value="0"></option>
										<option value="1">Domaci 1</option>
										<option value="2">Domaci 2</option>
										<option value="3">Domaci 3</option>
										<option value="4">Domaci 4</option>
										<option value="5">Bonus</option>
										<option value="6">Teorijski test</option>
										<option value="7">Prakticni test</option>
										<option value="8">Projekat</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Broj bodova</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="value" id="value"  placeholder="Broj bodova"/>
								</div>
							</div>
						</div>

						
						<div class="form-group ">
							<input type="submit" id="button" value="Update" name="update" class="btn btn-primary btn-lg btn-block login-button"/>
						</div>
						<span class="form-group ">
							<a href="user_conf.php" class="link_home" >Dodaj korisnika</a>
							
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