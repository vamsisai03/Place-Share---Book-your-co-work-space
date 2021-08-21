<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<title>Home Page</title>
<head>
<link rel="stylesheet" type="text/css" href="css/v6.css">
<link rel="stylesheet" type="text/css" href="css/v9.css">
<style>
body {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
.hello {
    border: 2px solid #3498db; 
    background-color: #222f3e; 
    height: 40px; 
    width: 400px; 
    color: #3498db; 
	font-size:25px;
    box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6); 
	cursor:pointer;
	border-radius:20px;
	outline:none;
}
.hello:hover
{
	background-image:linear-gradient(to right, #00a8ff ,#ecf0f1);
	color:black;
}

.openbtn2 {
  font-size: 30px;
  font-weight:bold;
  background-color: #1289A7;
  color: white;
  padding: 10px 140px;
  border: none;
  
}


</style>
</head>
<body bgcolor="#ecf0f1" style="background-image:url('imgs/homepage3.JPG');">

		<div class="sidebar" id="sidenavbar">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
	<center>
			<img src="imgs/homepage.JPG" class="IWMS"/><br><br>
			<font color="#e67e22" size="6">Welcome 
		<?php echo $_SESSION['loginid'] ?>
		</font><br>
	</center>
	<hr style="height:2px;border-width:0;background-color:red">
	<a href="history.php">History</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	<a href="logout.php">Logout</a>
	<hr style="height:1px;border-width:0;color:gray;background-color:gray">
	</div>
	
	<div id="main">
<button class="openbtn" onclick="openNav()">☰ </button><center><span class="openbtn2">Integrated Workplace Management System</span></center>
	<h1 align="center">
	<br><br>
	<center>
<a href="halls.php"><input type="button" class="hello" value="Click Here to Book"/></a><br><br>
<a href="track.php"><input type="button" class="hello" value="Click Here to check booking details"/></a>
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