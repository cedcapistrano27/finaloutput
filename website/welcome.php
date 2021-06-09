<?php

	session_start();
	include 'connect.php';


	if (!isset($_SESSION["loggedin"]) &&  $_SESSION["loggedin"] !== TRUE) {
		header("location: index.php");
		exit();
	}


		if (isset($_SESSION["admin_user"])) {
			header("location: adminpage.php");
			exit();	
		}

	if (!isset($_SESSION["username"])) {
			header("location: index.php");
			exit();	
		}


    	if (isset($_GET['logout'])) {

    	$db = new mysqli('localhost', 'root', '', 'account');
    	$event = mysqli_query($db, "INSERT INTO event_log(event_user, event_act, date) VALUES('".$_SESSION['username']."', 'Signed-Out', current_timestamp())");

    	if (isset($_SESSION['username'])) {
    		

    	session_destroy();
	  	unset($_SESSION['username']);
	  	header("location: index.php");
    	}
    	
    	}
   

   
	  
  
  


?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>

<style type="text/css">
	
body {

	background: url(1.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	font-family: Gadugi;


}



h1{

	color: white;
	background-color: tomato;
	border: 5px solid;
	border-radius: 7px;
	border-color: #18F710;
	width: 50%;
}


.content{

	width: 400px;
	height: auto;
	padding: 30px;
	background-color: white;
	margin-left: auto;
	margin-right: auto;
	border-radius: 10px;
	border: 5px solid;



}

.lorem{
	background-color: black;
	color: white;
	border-radius: 10px;
	width: 90%;
	padding: 20px;



}

a:hover {

	color: #18F710;
}

</style>
<body>

<center>
	<h1>Hi <?php echo $_SESSION['username']; ?></h1>
</center>

<div class="content">

<?php if (isset($_SESSION['success'])): ?>

			<div class="error success">
				<h3>
					<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
				</h3>			
			</div>
		<?php endif	?>

		   <?php  if (isset($_SESSION['username'])) : ?>
    	<center><p style="font-size: 20px;">Welcome ! <strong style="color: #17d60d; "><?php echo $_SESSION['username']; ?></strong></p></center>
      <br>
    <?php endif ?>

    	<span><a href="welcome.php?logout='1'" style="height: 35px; width: 150; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #DBBDF9; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;" >logout</a></span>



    

<br><br>


<div class="lorem">

	<p><strong>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


</strong></p>
</div>

</div>
	

</body>
</html>

<script>
$(document).ready(function(){
 $('#submit').click(function(){
  var count = 0;
  $('.checkbox_table').each(function(){
   if($(this).is(':checked'))
   {
    count = count + 1;
   }
  });
  if(count > 0)
  {
   $('#export_form').submit();
  }
  else
  {
   alert("Please Select Atleast one table for Export");
   return false;
  }
 });
});
</script>
	
	