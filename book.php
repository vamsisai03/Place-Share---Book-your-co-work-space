<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
	$query="select sum(strength) as sum from booking";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		$row = mysqli_fetch_assoc($query_run);
		$sum=$row['sum'];
		if($sum<200)
		{
			$_SESSION['su']=$sum;
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
?>
</body>
</html>