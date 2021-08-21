<?php
	session_start();
	require 'dbconfig/config.php';
	
?>
<!DOCTYPE html>
<html>
<title>Book Page</title>
<head>

<h1 align="center"><font color="#EA2027">Integrated Workplace Management System</font></h1>
<link rel="stylesheet" type="text/css" href="css/v7.css">
<link rel="stylesheet" type="text/css" href="css/v9.css">
<style>
body {
    font-family: 'Montserrat';
	font-size: 18px;
	color:black;
}
</style>
</head>
<body style="background-image:url('imgs/home3.JPG');">
<form class="homepage3" action="homepage3.php" method="post">
<p align="right">
<input name="logout2" type="submit" id="logout_btn2" value="Log Out"/>
</p>
</form>

<?php
		if(isset($_POST['logout2']))
		{
			session_destroy();
			header('location:login.php');
		}
	?>
<center>
<div id="main-wrapper2">
	<form class="homepage2" action="homepage3.php" method="post">
	<h2>Enter the following details to Book</h2><br>
	Enter your full name:&nbsp&nbsp<br>
	<input name="fullname" type="text" class="inputbookvalues" placeholder="Enter Full name" required/>&nbsp<br><br>
	From Date:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	To Date:<br>
	<input name="fromdate" type="date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="2020-12-30" required/>&nbsp
	<input name="todate" type="date"  min="<?php echo date('Y-m-d'); ?>" max="2020-12-30" required/><br><br>
	Only 
	<?php echo 200-$_SESSION['su'] ?> Vacancies left!
	<br><br>
	Enter Strength:<br>
	<input name="strength" type="number" min="1" required/><br><br>
	Enter Email Address:<br>
	<input name="mail" type="email" id="email" pattern=".+@gmail.com" size="30" required/><br><br>
	Enter phone number:<br>
	<input type="tel" id="phone" name="phone" pattern="[1-9]{1}[0-9]{9}" required/><br><br>
	<input name="book1" type="submit" id="book_btn" value="Book"/><br><br>
	<a href="homepage2.php"><input name="bthp" type="button" id="bthp2" value="Back To Home Page"/></a><br><br>
	</b>
	</form>
	</div>
	</center>
<?php
	if(isset($_POST['book1']))
	{
		
		$fullname=$_POST['fullname'];
		$bodate=date('Y-m-d');
		$rawdate3=htmlentities($bodate);
		$bdate=date('Y-m-d', strtotime($rawdate3));
		$todate=$_POST['todate'];
		$fromdate=$_POST['fromdate'];
		$fromdate=date('Y-m-d');
		$rawdate2=htmlentities($_POST['todate']);
		$todate=date('Y-m-d', strtotime($rawdate2));
		$rawdate=htmlentities($_POST['fromdate']);
		$fromdate=date('Y-m-d', strtotime($rawdate));
		$strength=$_POST['strength'];
		$mail=$_POST['mail'];
		$phone=$_POST['phone'];
		$v1=$_SESSION['loginid'];
		$sum=$_SESSION['su'];
		$rem=200-$sum;
		$location=$_SESSION['location'];
					$type=$_SESSION['type'];
		echo $fullname.$fromdate.$todate.$bdate.$mail.$phone.$v1.$rem.$strength.$location.$type;
		if($todate>$fromdate)
		{
			if($rem>$strength)
			{
					
					
					$query="insert into booking2(strength,to_date,from_date,full_name,location,b_date,type) values($strength,'$todate','$fromdate','$fullname','$location','$bdate','$type')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						$sql = "select booking_id FROM booking2 where strength=$strength and to_date='$todate' and from_date='$fromdate' and full_name='$fullname' and location='$location' and b_date='$bdate' and type='$type'";
						$result = mysqli_query($con,$sql);
						if($result)
						{
							$value = mysqli_fetch_object($result);
							$_SESSION['boid']= $value->booking_id;
							$boid=$_SESSION['boid'];
							$query="insert into booking_email_id(booking_id,email_id) values($boid,'$mail')";
							$res=mysqli_query($con,$query);
							if($res)
							{
								$query="insert into booking_ph_no(booking_id,ph_no) values($boid,'$phone')";
								$query_run=mysqli_query($con,$query);
								if($query_run)
								{
									$query="insert into booking_workspace(login_id,booking_id) values('$v1',$boid)";
									$query_run=mysqli_query($con,$query);
									if($query_run)
									{
										echo '<script type="text/javascript"> alert("Data Entered successfully") </script>';
										$date1 = $_POST['fromdate'];
										$date2 = $_POST['todate'];
										$diff = (abs(strtotime($date2) - strtotime($date1)))/86400;
										$_SESSION['days']=$diff;
										$_SESSION['strength']=$strength;
										$_SESSION['boid']=$boid;
										header('location:payment.php');
									}
									else
									{
										echo '<script type="text/javascript"> alert("Error4!") </script>';
										
									}
								}
							}
							else
							{
								echo '<script type="text/javascript"> alert("Error3!") </script>';
							}
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error2!") </script>';
						}
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error1!") </script>';
					}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Your required strength doesnt match the vacancies available ") </script>';
			} 
		}
		else
		{
			echo '<script type="text/javascript"> alert("Enter Dates in correct order") </script>';
		}
	}
?>
<a href="user2.php" target="_blank"><button class="bottom">Live Chat with Admin</button></a>
</body>
</html>