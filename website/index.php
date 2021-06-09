<?php
session_start();

		if (isset($_SESSION["admin"])) {
			header("location: adminpage.php");
			exit();	
		}

	if (isset($_SESSION["username"])) {
			header("location: welcome.php");
			exit();	
		}

require_once 'connect.php';

$_SESSION["verify"] = false;
$_SESSION["code_access"] = false;

		$password = '';
		$username = '';
		$errors = $arrayName = array();



if (isset($_POST['signin'])) {

	$admin = 'admin';
	$member = '';
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = $password;
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'"; 
    $results = mysqli_query($db, $query);
 

    if (mysqli_num_rows($results) == 1) {
    	
    	$event = mysqli_query($db, "INSERT INTO event_log(event_user, event_act, date) VALUES('$username', 'Signed-In', current_timestamp())");
    	$user_results = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND user_id=user_id");
    	


		while ($row = mysqli_fetch_array($user_results)) {

			if ( $admin == $row["user_type"]) {
				$_SESSION['id'] = $row["user_id"];
				$_SESSION['admin'] = $row["user_type"];
				$_SESSION['admin_user'] = $row["username"];
				$_SESSION['admin'] = true;
				$_SESSION["verify"] = true;
        		$_SESSION["code_access"] = true;
        		$_SESSION['success'] = "You are now logged in";
        		header('location: verification.php');
	    exit();
			}elseif ($member == $row["user_type"]){


		$_SESSION['id'] = $row["user_id"];
		$_SESSION['username'] = $row["username"];
		$_SESSION["verify"] = true;
        $_SESSION["code_access"] = true;
	    $_SESSION['success'] = "You are now logged in";
	    header('location: verification.php');
	    exit();
			}else{
				echo "<script>alert('No Account Been Found!!!');</script>";
			}

		
	}

    }else {
      array_push($errors, "Invalid password/username. Please Try again");
    }


  }

  	
       
  		

}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign-In</title>
	<style type="text/css">
		

body {
	background: url(1.jpg) center fixed;
	background-repeat: no-repeat;
	background-size: cover;
}

div.login {

	font-size: 15px;
	background-color: white;
	width: 350px;
	height: auto;
	margin-left: 450px;
	margin-top: 100px;
	border-radius: 0px 0px 10px 10px;
	

	}

.header {

	text-align: center;
	padding: 20px;
	font-family: cursive;
	background-color: #1F44D3;
	color: white;
	border-radius: 10px 10px 0px 0px;
	border: 5px dashed;
}




input[type=text]{

height: 25px;
width: 170px;
border-radius: 5px;
padding: 10px;
margin-top: 10px;
margin-left: 80px;




}

label	{

	
	padding: 10px;
	text-align: center;	
	margin-left: 80px;

}

input[type=password]{

height: 25px;
width: 170px;
border-radius: 5px;
padding: 10px;
margin-top: 10px;
margin-left: 80px;

}



input[type=submit]{

		float: right;
		width: 100px;
		height: 35px;
		margin-right: 70px;
		background-color: #45EE0D;
		border-radius: 4px;
		font-family: cursive;
}

input[type=submit]:hover {

	background-color: #35AB0E;
}


a:hover{
	color: #AB210E;
}

.error{

	width: 92%; 
  	margin: 0px auto; 
  	padding: 10px; 
  	border: 1px solid #a94442; 
 	color: #a94442; 
  	background: #f2dede; 
  	border-radius: 5px; 
 	text-align: center;


}



	</style>
</head>
<body>


<div class="login">

<div class="header">
	<h1>Log-In Form</h1>
</div>

	<form action="index.php" method="post">
		<?php include('error.php')?>

			<div class="username">
				<input type="text" name="username" placeholder="Username">
			</div>
<br>	<div class="pass">
				<input type="password" name="password" placeholder="Password">
			</div>
<br>
			<div class="btn-login">
				<input type="submit" name="signin" value="Sign-In">
			</div>
	
	<br><br>
	<br><br>
	<center>
	<span>Forgot Password?<a href="forgot.php">Click Here</a></span><br>
	<span>Not a Member?<a href="register.php"> Register here</a></span>
		</center>
	<br><br>

	</form>

</div>






</body>
</html>