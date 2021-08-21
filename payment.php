<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Page</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
<meta name="robots" content="noindex,follow" />
</head>
<body>
<form class="paymentpage" action="payment.php" method="post">
  <div class="checkout-panel">
    <div class="panel-body">
      <h2 class="title">Checkout</h2>

      <div class="progress-bar">
        <div class="step active"></div>
        <div class="step active"></div>
		<div class="step "></div>
         <div class="step "></div>
       
      </div>

      <div class="payment-method">
          <div class="card-logos">
            <img src="img/visa_logo.png"/>
            <img src="img/mastercard_logo.png"/>
          </div>



      </div>
		<font color="#27ae60" size="34">Total Fare:RS.
	<?php	echo $_SESSION['strength']*$_SESSION['days']*300 ?>
	</font><br><br>
      <div class="input-fields">
        <div class="column-1">
          <label for="cardholder">Cardholder's Name</label>
          <input type="text" id="cardholder" name="chn"/>

          <div class="small-inputs">
            <div>
              <label for="date">Valid thru</label>
              <input type="text" id="date" placeholder="MM / YY" name="valid" />
            </div>

            <div>
              <label for="verification">CVV*</label>
              <input type="password" id="verification" name="cvv"/>
            </div>
          </div>

        </div>
        <div class="column-2">
          <label for="cardnumber">Card Number</label>
          <input type="text" id="cardnumber" name="chnum"/>

          <span class="info">* CVV is the card security code, unique three digits number on the back of your card separate from its number.</span>
        </div>
      </div>
    </div>

    <div class="panel-footer">
      <button class="btn back-btn">Back</button>
      <button class="btn next-btn" name="proceed">Next Step</button>
    </div>
  </div>
</form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="script.js"></script>
  <?php
		if(isset($_POST['proceed']))
		{
			$cvv=$_POST['cvv'];
			$valid=$_POST['valid'];
			$chn=$_POST['chn'];
			$chnum=$_POST['chnum'];
			$fare=$_SESSION['strength']*$_SESSION['days']*300;
			$padate=date('Y-m-d');
			$rawdate4=htmlentities($padate);
			$pdate=date('Y-m-d', strtotime($rawdate4));
			$query="select * from accounts where chn='$chn' and chnum='$chnum' and valid='$valid' and cvv='$cvv'";
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				$query="insert into payment(chn,p_date,fare,chnum) values('$chn','$pdate',$fare,'$chnum')";
				$query_run=mysqli_query($con,$query);
				if($query_run)
				{
					$sql = "select balance FROM accounts where chnum='$chnum'";
					$result = mysqli_query($con,$sql);
					if($result)
					{
						$value = mysqli_fetch_object($result);
						$_SESSION['up']= $value->balance;
						$up=$_SESSION['up'];
						$di=$up-$fare;
						$query="update accounts set balance=$di where chnum='$chnum'";
						$query_run=mysqli_query($con,$query);
						if($query_run)
						{
							$sql = "select payment_id FROM payment where chn='$chn' and p_date='$pdate' and fare='$fare' and chnum='$chnum'";
							$result = mysqli_query($con,$sql);
							if($result)
							{
								$value = mysqli_fetch_object($result);
								$_SESSION['paid']= $value->payment_id;
								$pid=$_SESSION['paid'];
								$_SESSION['pid']=$pid;
								$_SESSION['chnum']=$chnum;
								$_SESSION['chn']=$chn;
								$_SESSION['pdate']=$pdate;
								$_SESSION['fare']=$fare;
								header('location:final.php');
							}
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}
					
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error:Transaction Failed.Please try after some time") </script>';
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Error:Bank details incorrect!Please enter correct details") </script>';
			}
		}
	?>
</body>
</html>