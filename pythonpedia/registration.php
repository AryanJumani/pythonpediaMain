<html>
<head>
	<title>User Registration</title>
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
$nameErr = $pwdErr = $emailErr = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['username'];
	$pass = $_POST['pwd'];
    $email = $_POST['Email'];
	if (empty($_POST["username"]))
	{
    	$nameErr = "Name is required";
	}
	if (empty($_POST["pwd"]))
	{
    	$pwdErr = "Password is required";
	}
    if (empty($_POST["Email"]))
	{
    	$emailErr = "Email is required";
	}
    else
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
    }
	$con = mysqli_connect('sg2plzcpnl489762', 'z4pptcz2gz9t', 'Easybell1');
	mysqli_select_db($con, 'userregistration');


	$s = "select * from usertable where Username = '$name'";
	$result =   mysqli_query($con, $s);
	$num = mysqli_num_rows($result);

    $t = "select * from usertable where Email = '$email'";
    $resultat = mysqli_query($con, $t);
    $num1 = mysqli_num_rows($resultat);
	if($num>0)
	{
	    $nameErr = "Username already taken";
	}
    else if($num1>0)
    {
        $emailErr = "Email already used";
    }
	else
	{
		if($nameErr == "" && $emailErr == ""){
		    $reg = "insert into usertable(Username, Password, Email) values ('$name', '$pass', '$email')";
		    mysqli_query($con, $reg);
		    $success = "Registration Successful!";
		}
	}
}
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
		<div class="col-md-6">
			<h2>Register</h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group">
					<label>Username</label><br>
					<input type="text" name="username" class="form-control">
					<span class="error"> * <?php echo $nameErr;?></span>
				</div>
				<div class="form-group">
					<label>Password</label><br>
					<input type="password" name="pwd" class="form-control">
					<span class="error"> * <?php echo $pwdErr;?></span>
				</div>
                <div class="form-group">
					<label>Email address</label><br>
					<input type="email" name="Email" class="form-control">
					<span class="error"> * <?php echo $emailErr;?></span>
				</div>
				<button type="submit" class="btn btn-primary"> Register </button><br>
				<span class="done"> <?php echo $success?> </span>
			</form>
		</div>
		</div>
		<p>Already registered? <a href="login.php">Login</a></p>
	</div>
</body>
</html>
