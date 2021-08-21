<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
	session_destroy();
	header('location:adminlogin.php');
?>
</body>
</html>