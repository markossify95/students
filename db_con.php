<?php

	
	class DBConn{
		public $conn;

		function __construct(){
			$this->conn = new mysqli("localhost","root","","students");
			if (!$this->conn){
	  			echo "Failed to connect to MySQL: " . $this->conn->connect_error;
	  		}
		}

		// Check connection
		//$sql="select * from person where username=$username and password = $password";

		//	if($valid = mysql_query($sql))
		//	{
		//		if($fetch = mysql_fetch_assoc($valid))
		//		{
		//			$uid = $fetch['id'];
		//			$index_num = $fetch['index_num'];
	  	//
		//		}
		//	}

	  	function sign_up($username, $password, $index_no){
	  	
	  		$username = $this->conn->real_escape_string($username);
	  		$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "kuracpickagovnosisa");

	  		$stmt = $this->conn->prepare("INSERT INTO user (username, password, index_no) VALUES (?, ?, ?)");	
	  		$stmt->bind_param("sss", $username, $password, $index_no);
	  		$stmt->execute();
	  		

			echo "<script>console.log(\'New records created successfully\');</script>";
	  	}

	  	function sign_in($username, $password, $role)
	  	{
	  		$password = hash_hmac ( "sha1",  $this->conn->real_escape_string($password), "kuracpickagovnosisa");
	  		$username = $this->conn->real_escape_string($username);
	  		
	  		$res = $this->conn->query("SELECT id, username, password, index_no, role FROM user WHERE username = '$username' AND password = '$password' ")
	  		->fetch_object();	
	  		
	  		if($res){
	  			session_start();

				if(!isset($_SESSION['reg'])){
					$_SESSION['reg'] = true;
				}

	  			header('location: http://localhost/students/home.php');
	  		}
	  	}
  		function add_activity($index_no, $activity, $value){
  			session_start();
  			if (!$_SESSION['reg']) {
			 	header('Location: http://localhost/students/login.php');   
			}else{
				print_r($_SESSION);
				echo "MOZETE DA UNOSITE, WORKING ON IT DUVAJ GAAAAAA RADIIIIIIIII!!!!!!!!!!";
			}
  		}

  		function sign_out(){
  			session_start();
  			session_unset();
  			session_destroy();
  			header("Location: login.php");
  		}
  }


  $db = new DBConn();
?>