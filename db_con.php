<?php

	
	class DBConn
	{
		public $conn;

		function __construct()
		{
			//connect
			$this->conn = new mysqli("localhost","root","","students");
			if (!$this->conn)
			{
	  			echo "Failed to connect to MySQL";
	  		}
		}

	  	function sign_up($username, $password, $index_no, $role)
	  	{
	  		//prevent sql injection
	  		$username = $this->conn->real_escape_string($username);
	  		$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "budweiser");

	  		//secound prevention from mysql injection
	  		//nema potrebe sad ovako jer samo admin unosi ali nema veze
	  		$stmt = $this->conn->prepare("INSERT INTO user (username, password, index_no, role) VALUES (?, ?, ?, ?)");	
	  		$stmt->bind_param("sssi", $username, $password, $index_no, $role);
	  		$stmt->execute();

	  		$id=$this->conn->query("SELECT id FROM user where index_no='$index_no'")->fetch_object();
	  		$this->conn->query("INSERT INTO result(uid) VALUES($id->id)");
	  		

			echo "<script>alert(\'Dodat je novi korisnik\');</script>";
	  		
	  	}

	  	function sign_in($username, $password)
	  	{
	  		$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "budweiser");
	  		$username = $this->conn->real_escape_string($username);
	  	
	  		
	  		$res = $this->conn->query("SELECT id, username, password, index_no, role FROM user WHERE username = '$username' AND password = '$password' ")
	  		->fetch_object();	
	  		
	  		if($res)
	  		{
	  			//start session

	  			session_start();

				if(!isset($_SESSION['reg']))
				{
					$_SESSION['reg'] = true;
				}

				if(isset($_SESSION['reg']))
				{
					if($res->role == 1)
	  					header('location: home.php');
					else
						header("location: korisnik.php");
				}
	  		}

	  		
	  	}

  		function add_activity($index_no, $activity, $value){
  			
  			if (!$_SESSION['reg']) 
  			{
			 	header('Location: login.php');   
			}
			else
			{
				
				$query = "SELECT id FROM user WHERE index_no = '$index_no'";

				$result=$this->conn->query($query) -> fetch_object();

					
				$query="UPDATE `result` SET ";
				switch ($activity) 
				{
					case '1':
						$query .= "hw1 = '$value' WHERE uid = '$result->id'";
						break;
					case '2':
						$query .= "hw2 = '$value' WHERE uid = '$result->id'";
						break;
					case '3':
						$query .= "hw3 = '$value' WHERE uid = '$result->id'";
						break;
					case '4':
						$query .= "hw4 = '$value' WHERE uid = '$result->id'";
						break;
					case '5':
						$query .= "bonus = '$value' WHERE uid = '$result->id'";
						break;
					case '6':
						$query .= "t_test  = '$value' WHERE uid = '$result->id'";
						break;
					case '7':
						$query .= "p_test  = '$value' WHERE uid = '$result->id'";
						break;
					case '8':
						$query .= "project  = '$value' WHERE uid = '$result->id'";
						break;
				}
				
				
				$this->conn->query($query);

			}
  		
  		}

  		function sign_out(){
  			session_start();
  			session_unset();
  			session_destroy();
  			header("Location: login.php");
  		}

  		//nije gotova funkcija
  		function delete($username, $password, $index_no)
	  	{
	  		//prevent sql injection
	  		

	  		$username = $this->conn->real_escape_string($username);
	  		$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "budweiser");

	  		//secound prevention from mysql injection
	  		$query = "DELETE FROM `user` WHERE username='$username' and password = '$password' and index_no = '$index_no' ";

	  		$this->conn->query($query);

			echo "<script>console.log('Korisnik je uspesno obrisan!');</script>";
	  		
	  	}	

	  	function delete_i($index_no)
	  	{
	  		$query = "DELETE FROM `user` WHERE index_no = '$index_no' ";
	  		
	  		$this->conn->query($query);
	  	}
	  	
	  	/*function change($username, $password, $index_no, $role)
	  	{
	  		

	  		$query = "SELECT id FROM user WHERE index_no = '$index_no'";

	  		if($ret = $this->conn->query($query)->fetch_object())
	  		{
	  			header("location: change.php/v=");
	  		}
	  		
	  		$id=$ret->id;

	  		$username = $this->conn->real_escape_string($username);
	  		$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "budweiser");

	  		$query="UPDATE `user` SET `username` = '$username', password='$password',index_no='$index_no',role='$role' WHERE `id` = '$id'";

	  		$this->conn->query($query);
	  	}*/
 	}


  $db = new DBConn();
?>