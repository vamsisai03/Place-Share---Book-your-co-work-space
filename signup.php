<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>SignUp Page</title>

<h1 align="center"><font color="#d63031">Integrated Workplace Management System</font></h1>
<link rel="stylesheet" type="text/css" href="css/v6.css">
<link rel="stylesheet" type="text/css" href="css/v9.css">
<style>
/*CSS style sheet*/
body {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
@import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
.textbox{
	width:80%;
	overflow:hiddeen;
	font-size:20px;
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
    outline:none;
    text-align:none;
}

#main-wrapper3
{
	width:600px;
	margin: 0 auto;
	background:white;
	padding:5px;
	border-radius:10px;
	border:2px solid orange;
	opacity:0.90;
}

</style>
</head>


<body style="background-image:url('imgs/su.JPEG');">
	<div id="main-wrapper3">
	<center>
		<font color="red"><h2>Signup Credentials</h2></font>
	
	  <form class="myform" action="signup.php" method="post">
		<font color="#c0392b"><label><b>Enter Login id:</b></label></font><br>
		<div class="textbox" >
		<i class="fa fa-user" aria-hidden="true"></i>
		<input name="loginid" type=text  class="inputvalues" pattern="[a-zA-z]{2,}" placeholder="Type login id" required/>
		</div><br>
	
		<font><b>Login id must contain:</b><br>1)Only lowercase and uppercase letters<br>2)No spaces<br>3)Minimum 2 characters</font><br><br>
		
		<font color="#c0392b"><label><b>Enter Password:</b></label></font><br>
		<div class="textbox" >
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input name="password" type=password class="inputvalues" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Type your password" required/>
		</div><br>
		<font color="#c0392b"><label><b>Confirm Password:</b></label></font><br>
		<div class="textbox" >
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input name="cpassword" type=password class="inputvalues" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm your password" required/>
		</div><font><b>Password must contain:</b><br>1)Atleast one lowercase letter<br>2)Atleast one uppercase letter<br>3)No spaces<br>4)Minimum 8 characters</font><br><br>
				<font color="#c0392b"><label><b>Email:</b></label><br></font>
			<div class="textbox" >
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<input name="email" type="email" class="inputvalues" placeholder="email address" required />
			</div><br>

		
		<font color="#c0392b"><label><b>Full Name:</b></label><br></font>
			<div class="textbox" >
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<input name="fullname" type="text" class="inputvalues" placeholder="Full Name" required />
			</div><br>
		<font color="#c0392b"><label><b>Phone Number:</b></label><br></font>
			<div class="textbox" >
			<i class="fa fa-phone-square" aria-hidden="true"></i>
			<input name="phno" type="text" class="inputvalues" placeholder="Enter phonenumber" required />
			</div><br>
		<font color="#c0392b"><label><b>Gender:</b></label></font>
			<input type="radio" class="radiobtns" name="gender" value="male" checked required> Male
			<input type="radio" class="radiobtns" name="gender" value="female" required> Female<br><br>
		<input name="signup_btn" type=submit id="signup_btn" value="Signup"/><br><br>
		<a href="login.php"><input type=button id="back_btn2" value="Back to Login Page"/></a>
		</form>

	</center>
	
	<?php
		if(isset($_POST['signup_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign Up Done Successfully") </script>';
			$loginid=$_POST['loginid'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$phno = $_POST['phno'];
			$fullname=$_POST['fullname'];
			if($password==$cpassword)
			{
				$query="select * from login where loginid='$loginid'";
				$query_run=mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					// there is already a user with same username
					echo '<script type="text/javascript"> alert("Loginid already exists try another loginid") </script>';
				}
				else
				{
					$query="insert into login values('$loginid','$password','$fullname','$email',$phno,'$gender')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("Signup Successfully done") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!") </script>';
					}
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Password and Confirm password doesnt match!") </script>';
			}
		}
	?>
		</div>
	<a href="user.php" target="_blank"><button class="bottom">Live Chat with Admin</button></a>
</body>
</html> 