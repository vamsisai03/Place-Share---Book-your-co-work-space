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
body {
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

.pay {
    border: 2px solid #3498db; 
    background-image:linear-gradient(to right,  #9980FA,#D980FA);
    color: #3498db; 
	font-size:18px;
    box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6); 
	cursor:pointer;
}
.pay:hover
{
	background-image:linear-gradient(to right, #00a8ff ,#ecf0f1);
	color:black;
}
</style>
<script type="text/javascript">
function search() {
  var input, uc, table, tr, td, i, value;
  input = document.getElementById("searchinput");
  uc = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      value = td.innerText;
      if (value.indexOf(uc) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
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
<center><font style="font-size:35px;font-weight:bold;">Booking's Data</font></center>
<input type="text" id="searchinput" onkeyup="search()" placeholder="Search for Booking Id" title="Type in a name">
<table id="customers">
  <tr>
    <th>Booking Id</th>
	<th>Booking Date</th>
    <th>Full Name</th>
	<th>From Date</th>
	<th>To Date</th>
    <th>Location</th>
	<th>Strength</th>
	<th>Type</th>
    <th>Email ID</th>
    <th>Phone Number</th>
	<th>View Payment info</th>
	
  </tr>
<?php
		$query="SELECT b.booking_id,b.b_date,b.full_name,b.from_date,b.to_date,b.location,b.strength,b.type,be.email_id,bp.ph_no,b.payment_id FROM booking2 as b INNER JOIN booking_email_id as be ON b.booking_id=be.booking_id INNER JOIN booking_ph_no as bp ON b.booking_id=bp.booking_id";
				$query_run=mysqli_query($con,$query);
	if(mysqli_num_rows($query_run)>0)
	{
		while($row=mysqli_fetch_array($query_run))
		{
?>
			<tr>
			<td><?php echo $row['booking_id']?><td><?php echo $row['b_date']?></td><td><?php echo $row['full_name']?></td><td><?php echo $row['from_date']?></td><td><?php echo $row['to_date']?></td><td><?php echo $row['location']?></td><td><?php echo $row['strength']?></td><td><?php echo $row['type']?></td><td><?php echo $row['email_id']?></td><td><?php echo $row['ph_no']?></td><?php $payid = "viewpaymentdata.php?payid=".$row['payment_id'];?><td><button class="pay"><a href=" <?php echo $payid ?> " style="text-decoration:none;">View Payment Info</a></button></td>

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