<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/v6.css">
<link rel="stylesheet" type="text/css" href="css/v9.css">
<style>
body{
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
  background-color: #e67e22;
  color: white;
}
#searchinput {
  width: 20%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 2px solid black;
  margin-bottom: 12px;
}
.hello {
    border: 2px solid #3498db; 
    background-color: #222f3e; 
    height: 40px; 
    width: 500px; 
    color: #3498db; 
	font-size:25px;
    box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6); 
	cursor:pointer;
}
.hello:hover
{
	background-image:linear-gradient(to right, #00a8ff ,#ecf0f1);
	color:black;
}
</style>

</head>
<body style="background-image:linear-gradient(to right,  #9980FA,#D980FA);">

<div class="sidebar" id="sidenavbar">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<center>
			<img src="imgs/homepage.JPG" class="IWMS"/><br><br>
			<font color="#e67e22" size="6">Welcome Admin 
		<?php echo $_SESSION['loginid'] ?>
		</font><br>
	</center>
	<hr style="height:2px;border-width:0;background-color:red">

	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="viewuserdata.php">User's Data</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="viewbookingdata.php">Booking's Data</a>
			<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="admin.php" target="_blank">Live chat with users</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="alogout.php">Logout</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	</div>
	
	
	<div id="main">
	<button class="openbtn" onclick="openNav()">☰ </button>
	<center><font style="font-size:35px;font-weight:bold;">Payment Data</font></center>
<br><br>
<table id="customers">
  <tr>
    <th>Payment Id</th>
	<th>Payment Date</th>
    <th>Card Number</th>
	<th>Cardholder's Name</th>
	<th>Fare</th>
    <th>Conformation Id</th>

	
  </tr>
<?php
		$payid=$_GET['payid'];
		$query="SELECT * FROM payment where payment_id=$payid";
				$query_run=mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
		while($row=mysqli_fetch_array($query_run))
		{
?>
			<tr>
			<td><?php echo $row['payment_id']?><td><?php echo $row['p_date']?></td><td><?php echo $row['chnum']?></td><td><?php echo $row['chn']?></td><td><?php echo $row['fare']?></td><td><?php echo $row['c_id']?></td>
			</tr>
<?php
		}
	}

?>
 
  
</table><br><br><center>
<a href="ahomepage.php"><input type="button" class="hello" value="Click Here to go back to Homepage"/></a></center>
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
</body>
</html>