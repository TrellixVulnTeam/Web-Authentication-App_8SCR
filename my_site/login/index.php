<?php
  session_start();
require 'dbconfig/config.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page </title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style ="background-color:#535c68">
	<div id="main-wrapper">
	
	<center><h2>Login Page</h2></center>
	<center>
	<img src="imgs/logo.jpg" class="logo"/>
</center>

<form  class="myform" action="index.php" method="post">
	<label><b>Username</b></label>
	<input name="username" type="text" class="inputvalues" placeholder="Type your username" required>
	<br>
	<label><b>Password</b></label>
	<input name="password" type="password" class="inputvalues" placeholder="Type your password" required>
	<br>
	<input type="submit" id="login_btn" value="Login"/><br>
	<a href="registration.php"><input type="button" id="register_btn" value="Register"/>
</form>
<?php
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query ="select * from user WHERE username='$username' AND password ='$password'";
	$query_run = mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
//valid
	$_SESSION['username']=$username;
	header('location:home.php');
	}
	else
	{
		echo '<script type ="text/javascript">alert("Invalid creddentials")</script>';
	}
}
else
{
	'<script type ="text/javascript">alert("Invalid creddentials...................................")</script>';

}
?>
</div>


</body>
</html>