<?php
	session_start();
	require 'dbconfig/config.php';	
	if(isset($_POST['cubicle']))
	{	
		
		if(!empty($_POST['city']))
		{
			$selected=$_POST['city'];
		$query="select sum(strength) as sum from booking2 where location='$selected' and type='cubicle'";
		$query_run=mysqli_query($con,$query);
		if($query_run)
		{
			$row = mysqli_fetch_assoc($query_run);
			$sum=$row['sum'];

			if($sum<200)
			{
				$_SESSION['su']=$sum;
				$_SESSION['type']="cubicle";
				$_SESSION['location']=$selected;
				header('location:homepage3.php');
			}
			else
			{
				echo '<script type="text/javascript"> alert("No vacancy available!Please try after some time.") </script>';
			}		
		}
		else
		{
			echo '<script type="text/javascript"> alert("Error1!") </script>';
		}
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Please select a City!") </script>';
		}
	}
	
	
	elseif(isset($_POST['meeting']))
	{
		
		if(!empty($_POST['city']))
		{
			$selected=$_POST['city'];
		$query="select sum(strength) as sum from booking2 where location='$selected' and type='meeting'";
		$query_run=mysqli_query($con,$query);
		if($query_run)
		{
			$row = mysqli_fetch_assoc($query_run);
			$sum=$row['sum'];
			if($sum<200)
			{
				$_SESSION['su']=$sum;
				$_SESSION['type']="meeting";
				$_SESSION['location']=$selected;
				header('location:homepage3.php');
			}
			else
			{
				echo '<script type="text/javascript"> alert("No vacancy available!Please try after some time.") </script>';
			}		
		}
		else
		{
			echo '<script type="text/javascript"> alert("Error1!") </script>';
		}
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Please select a City!") </script>';
		}
	}
	
	
	elseif(isset($_POST['seminar']))
	{
		
		if(!empty($_POST['city']))
		{
			$selected=$_POST['city'];
		$query="select sum(strength) as sum from booking2 where location='$selected' and type='seminar'";
		$query_run=mysqli_query($con,$query);
		if($query_run)
		{
			$row = mysqli_fetch_assoc($query_run);
			$sum=$row['sum'];
			if($sum<200)
			{
				$_SESSION['su']=$sum;
				$_SESSION['type']="seminar";
				$_SESSION['location']=$selected;
				header('location:homepage3.php');
			}
			else
			{
				echo '<script type="text/javascript"> alert("No vacancy available!Please try after some time.") </script>';
			}		
		}
		else
		{
			echo '<script type="text/javascript"> alert("Error1!") </script>';
		}
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Please select a City!") </script>';
		}
	}
	
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" type="text/css" href="css/v9.css">

<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {

 background-image:url('imagesback.png');
  background-position: center;
  width:100%;
  
  min-height: 100%;
 
  padding: 40px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}
.tangerine {
  font-family: "Comic Sans MS", cursive, sans-serif;
  font-size:20px;
 

}

/* Style the topnav links */
.topnav  {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
  width:100%;
}

/* Change color on hover */


.datas{
	padding:60px;
    text-align:center;
    margin: 0 auto;
    text-align: center;

  
}

div.gallery {
  margin-right:20px;
  border: 1px solid #BFBFBF;
  width: 350px;
  box-shadow: 10px 10px 5px #aaaaaa;
  transition: transform .2s;
  
      display: inline-block;
    vertical-align:top;
  

}

div.gallery:hover {
  transform: scale(1.10); 
}

div.gallery img {
padding:none;
    width:350px;
	 height:290px;
	 
}



div.desc {
  padding: 15px;
  text-align: center;
  background-color:white;
}
img{

     width:200px;
	 height:300px;

}
.choose
{
	background-image:linear-gradient(to bottom right,#9980FA,#D980FA);
	width:40%;
	padding-top:5px;
	padding-bottom:5px;
	padding-left:5px;
	padding-right:1px;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	color:white;
	outline:none;
	border-radius:20px;
}

.dropdown{

background-color: #4CAF50;
  width:40%;
  color: white;
  padding: 8px;
  font-size: 16px;
  border: none;
  cursor: pointer;

}

.dropdown-content{
  color: black;
  padding: 12px 16px;
}



</style>
</head>
<body>

<div class="header" >
  <h1> &nbsp;&nbsp;</h1>
</div>

<div class="topnav">
  <div class="tangerine">Integrated Workplace Management System</div>
  
</div><br><br>
  <form class="halls" action="halls.php" method="post">
  
<div class="datas" style="background-image:linear-gradient(to bottom right,#079992,#b8e994);">
<div class="gallery">
  <a target="_blank" href="cubicle.html">

  <div  class="img-box">
 
   <iframe width="347px" height="330px" frameborder="0" src="https://momento360.com/e/u/cbbea7743fd241e1bb7225ef7acfd551?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=78.75&size=medium"></iframe>
  
  </div>
   </a>
  
  <div class="desc">
  <a href="https://momento360.com/e/u/cbbea7743fd241e1bb7225ef7acfd551?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=78.75&size=medium" style="text-decoration:none;" target="_blank">Click Here To View the Above Image</a>
<font style="font-size:20px;font-weight:bold;">Cubicles</font><br><br>
  <select class="dropdown" name="city">
    <option value="" disabled selected>Select City</option>
    <option value="Delhi">Delhi</option>
    <option value="Banglore">Banglore</option>
    <option value="Chennai">Chennai</option>
    <option value="Mumbai">Mumbai</option>
  </select>&nbsp;&nbsp;
  <input class="choose" type="submit" name="cubicle" value="Book">
  
  </div>
   
</div>

<div class="gallery">
   <div  class="img-box">
   <iframe width="347px" height="330px" frameborder="0" src="https://momento360.com/e/u/7f69183404cf44d3854a4e3d250902b2?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium"></iframe>
  
  </div>
  <div class="desc">
    <a href="https://momento360.com/e/u/7f69183404cf44d3854a4e3d250902b2?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium" style="text-decoration:none;" target="_blank">Click Here To View the Above Image</a>
  <font style="font-size:20px;font-weight:bold;">Meeting Halls</font><br><br>
  <select class="dropdown" name="city">
	<option value="" disabled selected>Select City</option>
    <option value="Delhi">Delhi</option>
    <option  value="Banglore">Banglore</option>
    <option   value="Chennai">Chennai</option>
    <option  value="Mumbai">Mumbai</option>
  </select>&nbsp;&nbsp;
  <input class="choose" type="submit" name="meeting" value="Book">
  
  </div>
</div>

<div class="gallery">
  <div  class="img-box">
   <iframe width="347px" height="330px" frameborder="0" src="https://momento360.com/e/u/b418f833475d4e81ab3f3869cc45391a?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=100&size=medium"></iframe>
  
  </div>
  <div class="desc">
  <a href="https://momento360.com/e/u/b418f833475d4e81ab3f3869cc45391a?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=100&size=medium" style="text-decoration:none;" target="_blank">Click Here To View the Above Image</a>
<font style="font-size:20px;font-weight:bold;">Seminar Halls</font><br><br>
  <select class="dropdown" name="city">
  <option value="" disabled selected>Select City</option>
    <option value="Delhi">Delhi</option>
    <option value="Banglore">Banglore</option>
    <option value="Chennai">Chennai</option>
    <option value="Mumbai">Mumbai</option>
  </select>&nbsp;&nbsp;
  <input class="choose" type="submit" name="seminar" value="Book">
  
  
  </div>
</div>


</div>

</form>
<a href="user2.php" target="_blank"><button class="bottom">Live Chat with Admin</button></a>
</body>
</html>
