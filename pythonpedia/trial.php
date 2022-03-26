<?php
$con = mysqli_connect('localhost', 'root', '123456');
mysqli_select_db($con, 'userregistration');
$d = "select Username from usertable where Email = 'aryanjumani10@gmail.com'";
$result = mysqli_query($con, $d);
echo(mysqli_fetch_row($result)[0]);
?>
