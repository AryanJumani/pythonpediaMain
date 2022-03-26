<html>
<head>
	<title>User login</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body class="forum">
	<div class="upper-index">
	    <span class="logo" style="width: 50%; display: inline; align-items: center; margin-left: 5px"><img src="logo.png" width="50px" style="margin-top: 5px"></span>
	    <span class="upper-index-all-hrefs"><a href="CodingForBeginners.html" class="upper-index-a">Home</a><a href="contact.html" class="upper-index-a">Contact</a><a href="forums.php" class="upper-index-a">Forums</a><a href="login.php" class="upper-index-a btn btn-primary" style="background-color: #0cf">Login</a><a href="registration.php" class="upper-index-a btn btn-primary" style="background-color: #fff; color: #008fb3">Register</a></span>
	</div>
<?php
session_start();
$emailErr = $pwdErr = $success = $fail = "";
$con = mysqli_connect('sg2plzcpnl489762', 'z4pptcz2gz9t', 'Easybell1');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['Email'];
	$pass = $_POST['pwd'];
	if (empty($_POST["Email"]))
	{
    	$nameErr = "Email is required";
	}
	if (empty($_POST["pwd"]))
	{
    	$pwdErr = "Password is required";
	}

	$con = mysqli_connect('sg2plzcpnl489762', 'z4pptcz2gz9t', 'Easybell1');

	mysqli_select_db($con, 'userregistration');


	$s = "select * from usertable where Email = '$email' && Password = '$pass'";


	$result =   mysqli_query($con, $s);

	$num = mysqli_num_rows($result);


	$t = "select * from usertable where Email='$email'";
	$result1 = mysqli_query($con, $t);
	$num2 = mysqli_num_rows($result1);
	if($num2==1)
	{
	    if($num==1)
		{
			if($emailErr==""){
				$success = "Login Successful";
				$d = "select Username from usertable where Email = '$email'";
				$res = mysqli_query($con, $d);
				$username = mysqli_fetch_row($res)[0];
				$_SESSION['theUsername'] = $username;
			}
		}
		else
		{
			$fail = "Password is incorrect";
		}
	}
	else if($num2==0)
		$fail = "Email is unregistered/incorrect. <a href='registration.php'>Register?</a>";
}
//main starts

?>
<style type="text/css">
.error{
	color: #f00;
}
.form-control{
	width: 50%;
	display: inline-block;
}
.form-group{
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 30px;
	margin-bottom: 30px;
}
.done{
	color: #228C22;
}
</style>
<div class="container" style="width: 80%">
	<div class="row">
		<div class="col-md-6" >
			<h2>Login</h2>
			<p class="error"><?php echo $fail;?></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group">
					<label>Email</label><br>
					<input type="email" name="Email" class="form-control">
					<span class="error"> * <?php echo $emailErr;?></span>
				</div>
				<div class="form-group">
					<label>Password</label><br>
					<input type="password" name="pwd" class="form-control">
					<span class="error"> * <?php echo $pwdErr;?></span>
				</div>
				<button type="submit" class="btn btn-primary"> Login </button><br>
				<span class="done"> <?php echo $success?> </span>
			</form>
		</div>
		</div>
		<p>Not yet registered? <a href="registration.php">Register</a><br>
		<button class="btn btn-secondary" onclick="location.href='forums.php'">Go to Forums</button>
	</div>

</body>
</html>
