<?php
session_start();
$loginFail = "";
$finally = $_GET["thePostID"];
$con = mysqli_connect('sg2plzcpnl489762', 'z4pptcz2gz9t', '123456');
mysqli_select_db($con, 'userregistration');

$e = "select Title,Content from titleandcontent where postID = $finally";
$res = mysqli_query($con, $e);
$PageDetails = mysqli_fetch_row($res);

if(isset($_GET["theMainComments"])){
    $comment = $_GET["theMainComments"];
    $id = $_GET["thePostID"];
    $con = mysqli_connect('localhost', 'cpses_z4prnsdxsa', '123456');

    mysqli_select_db($con, 'userregistration');
	if(isset($_SESSION['theUsername']))
	{
		$username = $_SESSION['theUsername'];
        mysqli_select_db($con, 'userregistration');
        $adder = "insert into thecomments(ForumID, Comment, Username) values('$id', '$comment', '$username')";
        mysqli_query($con, $adder);

        header("Location:singleForum.php?thePostID=$id");
	}
	else {

        $loginFail = "Need to login first. <a href='login.php'>Login?</a>";
	}
}

?>
<html>
<head>
    <style>
        .td{
            vertical-align: top; padding-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title><?php echo $PageDetails[0]?></title>
<body class="forum">

    <div class="upper-index">
        <span class="logo" style="width: 50%; display: inline; align-items: center; margin-left: 5px"><img src="logo.png" width="50px" style="margin-top: 5px"></span>
        <span class="upper-index-all-hrefs"><a href="CodingForBeginners.html" class="upper-index-a">Home</a><a href="contact.html" class="upper-index-a">Contact</a><a href="forums.php" class="upper-index-a">Forums</a><a href="login.php" class="upper-index-a btn btn-primary" style="background-color: #0cf">Login</a><a href="registration.php" class="upper-index-a btn btn-primary" style="background-color: #fff; color: #008fb3">Register</a></span>
    </div>
    <table border="1px solid #000" class="tables">
        <tr style="height: 80px;"><td style="border-bottom: 1px solid #000; padding: 0px"><h1 class="forum-h1"><?php echo $PageDetails[0];?></h1></td></tr>
        <tr><td class="td"><p><?php echo $PageDetails[1];?></p></td></tr>
        <tr><td class="td" style="height: 80px"><h2>Comments</h2></td></tr>

        <tr><td class="td"><form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <textarea rows="5" cols="50" type="text" name="theMainComments" required></textarea>
            <input type="text" class="hidden" value="<?php echo $finally;?>" name="thePostID"><br>
            <button class="btn btn-primary" style="margin-top: 10px;">Submit</button></form></td></tr>
            <tr><td><p class="error"><?php echo ($loginFail);?></p></td></tr>
            <tr><td class="td" style="width: 80%"><h4>Comment</h4></td><td class="td" style="width: 20%"><h4>Username</h4></td></tr>
            <?php
            mysqli_select_db($con, 'userregistration');
            $f = "select ForumID,Comment,Username from thecomments where ForumID=$finally";
            $comments = mysqli_query($con, $f);
            $lenRow = mysqli_num_rows($comments);
            for($i = 0; $i<$lenRow; $i++)
            {
                $temp = mysqli_fetch_row($comments);
                echo("
                <tr>
                    <td class='td' style='width:80%'><p>$temp[1]</p></td>
                    <td class='td' style='width: 20%'><p>$temp[2]</p></td>
                </tr>
                ");
            }
            ?>

            <tr><td><button onclick="location.href='forums.php'" class="btn btn-secondary">Go to forums</button></td></tr>
</table>
</body>
</html>
