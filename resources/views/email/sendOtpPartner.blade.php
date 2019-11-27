<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Libro Service App - Account Verification</title>
<style type="text/css">
	body{
		font-family: "Open Sans", Tahoma, sans-serif; 
	}
</style>
</head>
<body>
	<?php
		$name = $user->pname ;
	?>
	<h3>Hello!!!</h3>
	<p>Dear, {{ ucwords($name) }}</p>
	<p>Please Enter This OTP For Verify your Account.</p>
	<p>You are signup as Partner.</p>
	<p> Your OTP is : <b>{{ $user->otp }}</b></p>
	<br><br>
	Thank you,<br>
	Libro Service App Team.
</body>
</html>