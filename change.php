<?php
	session_start();

	require('db_con.php');	

	$old_index=$_GET['v'];
	$id=$db->conn->query("SELECT id FROM user WHERE index_no='$old_index'")->fetch_object();
	
	if($id)
	{
		if(isset($_POST['uname']) and !empty($_POST['uname']))
		{
			$username=$_POST['uname'];
			$db->conn->query("UPDATE `user` SET `username` = '$username' WHERE id='$id->id'");	
					
		}
		if(isset($_POST['pwd']) and !empty($_POST['pwd']))
		{
			$password=$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "budweiser");
			$db->conn->query("UPDATE `user` SET password='$password' WHERE id='$id->id'");			
		}
		if(!empty($_POST['ind']) and isset($_POST['ind']))
		{
			$ind=$_POST['ind'];
			$db->conn->query("UPDATE `user` SET index_no='$ind' WHERE id='$id->id'");	
		} 
		if(isset($_POST['role']))
		{
			if($_POST['role'] == 1) 
			{
				$db->conn->query("UPDATE `user` SET role='1' WHERE id='$id->id'");
			}
			else if($_POST['role'] == 0)
			{
				$db->conn->query("UPDATE `user` SET role='0' WHERE id='$id->id'");
			}
		}
	}
	else
	{
		echo "baja ne postoji";
	}


?>

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="static/home.css">
				

		<title>Promena podataka</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h2>Promeni podatke</h2>
					<form action=<?php echo "\"change.php?v=". $_GET['v'] . "\""?>  method="POST">
						
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
								<input type="submit" id="button" value="Izmeni" name="search" class="btn btn-primary btn-lg btn-block login-button"/>
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