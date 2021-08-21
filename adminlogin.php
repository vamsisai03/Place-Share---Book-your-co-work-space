<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<title>Admin Login Page</title>
<head>
<link rel="stylesheet" type="text/css" href="css/v6.css">
<style>
@import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
body {
 font-size:16px;
 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
 color:#1B1464;
}
.textbox{
	width:80%;
	overflow:hidden;
	padding:8px 0;
	margin:8px 0;
	border-bottom:1px solid #4caf50;
}
.textbox i{
	width:26px;
	float:left;
	text-align:center;
}
.textbox input{
    border:none;
	width:300px;
    outline:none;
    text-align:none;
}
</style>
</head>
<body style="background-image:url('imgs/newlogin2.JPG');" >
	<div id="main-wrapper">
	<center>
		<font><h2>Enter Admin Login Credentials</h2></font>
		<img src="imgs/IWMSlogin.JPG" class="IWMS"/><br><br>
	<form class="loginpage" action="adminlogin.php" method="post">
		<label><b>Enter Login id:</b></label><br>
		<div class="textbox" >
		<i class="fa fa-user" aria-hidden="true"></i>
		<input name="loginid" type="text" class="inputvalue" placeholder="Type your username" required />
		</div><br>
		<label><b>Enter Password:</b></label><br>
		<div class="textbox" >
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input name="password" type="password" class="inputvalue" placeholder="Type your password" required />
		</div><br><br>
		<input name="login" type="submit" id="login_btn" value="Login"/><br><br>

		
		

	</form>
	</center>
	
	

	<?php
		if(isset($_POST['login']))
		{
			$loginid=$_POST['loginid'];
			$password=$_POST['password'];
			$query="select * from alogin where loginid='$loginid' and password='$password'";
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				  //valid
				$_SESSION['loginid']=$loginid;
				header('location:ahomepage.php');
			}
			else
			{
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
		}
	?>
	</div>
</body>
</html>   