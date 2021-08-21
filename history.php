<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<title>History</title>
<style>
body
{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: white;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: green;
  color: white;
}

.cancel {
    border: 2px solid #3498db; 
    background-image:linear-gradient(to right,  #9980FA,#D980FA);
    color: white; 
	font-size:18px;
    box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6); 
	cursor:pointer;
}
.cancel:hover
{
	background-image:linear-gradient(to right, #00a8ff ,#ecf0f1);
	color:black;
}
</style>
<head>
<link rel="stylesheet" type="text/css" href="css/v6.css">
<link rel="stylesheet" type="text/css" href="css/v9.css">
</head>
<body style="background-image:url('imgs/check.JPG');">
<div class="sidebar" id="sidenavbar">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<center>
			<img src="imgs/homepage.JPG" class="IWMS"/><br><br>
			<font color="#e67e22" size="6">Welcome
		<?php echo $_SESSION['loginid'] ?>
		</font><br>
	</center>
	<hr style="height:2px;border-width:0;background-color:red">

	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="homepage2.php">Home</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="halls.php">Book</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="alogout.php">Logout</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	</div>
	
	<div id="main">
	<button class="openbtn" onclick="openNav()">☰ </button>
<center><h1>Your Booking History</h1>
	<form class="final" action="final.php" method="post">
	<p align="right">

	</p>
	</form>

	<?php
		if(isset($_POST['logout2']))
		{
			session_destroy();
			header('location:index.php');
		}
	?>
<table id="customers">
<tr style="color:black;background:#0984e3">
<th>Login Id</th><th>Booking ID</th><th>Payment ID</th><th>Confirmation ID</th><th>Full name</th><th>Strength</th><th>From Date</th><th>To Date</th><th>Booking Date</th><th>Email ID</th><th>Phone number</th><th>Fare</th><th>Cancel Booking</th>
</tr>
<?php
	$user=$_SESSION['loginid'];
	$query="SELECT b.booking_id,p.payment_id,c.c_id,b.full_name,b.strength,b.from_date,b.to_date,b.b_date,be.email_id,bp.ph_no,p.fare FROM booking2 as b INNER JOIN payment as p ON b.payment_id=p.payment_id INNER JOIN confirmed2 as c ON p.c_id=c.c_id INNER JOIN booking_email_id as be ON b.booking_id=be.booking_id INNER JOIN booking_ph_no as bp ON b.booking_id=bp.booking_id where b.booking_id in (SELECT booking_id from booking_workspace where login_id='$user')";
	$query_run=mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
		while($row=mysqli_fetch_array($query_run))
		{
?>
			<tr style="color:black;background-color:#dfe6e9">
			<td><?php echo $user?><td><?php echo $row['booking_id']?></td><td><?php echo $row['payment_id']?></td><td><?php echo $row['c_id']?></td><td><?php echo $row['full_name']?></td><td><?php echo $row['strength']?></td><td><?php echo $row['from_date']?></td><td><?php echo $row['to_date']?></td><td><?php echo $row['b_date']?></td><td><?php echo $row['email_id']?></td><td><?php echo $row['ph_no']?></td><td><?php echo $row['fare']?></td><?php $bid = "cancel.php?bid=".$row['booking_id'];?><td><button class="cancel"><a href=" <?php echo $bid ?> " style="text-decoration:none;">Cancel</a></button></td>
			</tr>
<?php
		}
	}
	else
	{
		echo '<script type="text/javascript"> alert("No Bookings Done!") </script>';
	}
?>
</table><br><br><br><br><br><a href="homepage2.php"><input type="button" id="back_btn" value="Return to Home Page"/></a><br>
	<h1 style="color:#eb2f06">Note:</h1>
	<font size="5" color="#212121">
		1)Your booking history shows the data of your bookings done with your respective login id.<br>
		2)If payment is not done for your booking, please kindly do the payment to add the booking to your booking history.<br>
		3)You can check your booking status in check booking status link available in the Home Page.
	</font>
	</center>
</center>
</div>

<script>
function openNav() {
  document.getElementById("sidenavbar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("sidenavbar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<a href="user2.php" target="_blank"><button class="bottom">Live Chat with Admin</button></a>
</body>
</html>