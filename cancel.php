<?php
	session_start();
	require 'dbconfig/config.php';
	$bid=$_GET['bid'];
	$query="delete from booking_workspace where booking_id=$bid";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		$query="delete from booking_ph_no where booking_id=$bid";
		$query_run=mysqli_query($con,$query);
		if($query_run)
		{
			$query="delete from booking_email_id where booking_id=$bid";
			$res=mysqli_query($con,$query);
			if($res)
			{
				$sql = "select payment_id FROM booking2 where booking_id=$bid";
				$result = mysqli_query($con,$sql);
				if($result)
				{
					$value = mysqli_fetch_object($result);
					$_SESSION['pid']= $value->payment_id;
					$pid=$_SESSION['pid'];
					$query="delete from booking2 where booking_id=$bid";
					$res=mysqli_query($con,$query);
					if($res)
					{
						$sql = "select c_id FROM payment where payment_id=$pid";
						$result = mysqli_query($con,$sql);
						if($result)
						{
							$value = mysqli_fetch_object($result);
							$_SESSION['cid']= $value->c_id;
							$cid=$_SESSION['cid'];
							$query="delete from payment where payment_id=$pid";
							$res=mysqli_query($con,$query);
							if($res)
							{
								$query="delete from confirmed2 where c_id=$cid";
								$res=mysqli_query($con,$query);
								if($res)
								{
									echo '<script type="text/javascript"> alert("Cancellation Successfull!") </script>';
									header('location:history.php');
								}
							}
						}
					}
				}
			}
		}
	}
?>










