<?php
	session_start();
	require 'dbconfig/config.php';

?>
<?php
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