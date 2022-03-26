<?php
session_start();

$con = mysqli_connect('localhost', 'root', '123456');
mysqli_select_db($con, 'userregistration');

$name = $_POST['username'];
$pass = $_POST['pwd'];

$s = "select * from usertable where Username = '$name' && Password='$pass'";

$result =   mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1)
{
    header('location:home.php');
}
else
{
    header('location:login.php');
}
?>
