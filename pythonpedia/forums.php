<?php session_start(); ?>
<html>
<head>
<title>Forums</title>

<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<style type="text/css">
.auto-style1 {

	margin: auto;
	text-align: left;
	margin-top: 10px;
}

.error{
	color: #f00;
	text-align: top;
	vertical-align: top;
}
.form-control{
	width: 50%;
	display: inline-block;
}
.form-group{
	margin-left: 10px;
	margin-right: 0px;
	margin-top: 30px;
	margin-bottom: 30px;
}
.done{
	color: #228C22;
}

</style>
<script>
 	function titleAndContent()
 	{
 		var x = document.getElementById('titleContent');
 		x.style.display = "block";
 	}
	function hideDiv()
 	{
 		var x = document.getElementById('titleContent');
 		x.style.display = "none";
 	}
	function addRows() {
		var x = document.getElementById("theTitle").value;
		sessionStorage.setItem("titleMain", x);
	}
</script>
</head>
<body class="forum">
	<div class="upper-index">
	    <span class="logo" style="width: 50%; display: inline; align-items: center; margin-left: 5px"><img src="logo.png" width="50px" style="margin-top: 5px"></span>
	    <span class="upper-index-all-hrefs"><a href="CodingForBeginners.html" class="upper-index-a">Home</a><a href="contact.html" class="upper-index-a">Contact</a><a href="forums.php" class="upper-index-a">Forums</a><a href="login.php" class="upper-index-a btn btn-primary" style="background-color: #0cf">Login</a><a href="registration.php" class="upper-index-a btn btn-primary" style="background-color: #fff; color: #008fb3">Register</a></span>
	</div>
<?php

$con = mysqli_connect('sg2plzcpnl489762', 'z4pptcz2gz9t', '123456');
$titleErr = $contentErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$title = $_POST["title"];
	$content = $_POST["content"];

	if($titleErr == "" && $contentErr == ""){
		mysqli_select_db($con, 'userregistration');
		$a = "insert into titleandcontent(Title, Content) values('$title', '$content')";
		mysqli_query($con, $a);
	}



	/*

*/

}


 ?>
<link rel="stylesheet" href="stylesheet.css">

<table style="width: 60%" id="thisWeirdTable" class="auto-style1">
	<tr>
		<td class="trForum">Title</td>
		<td class="trSmol">postID</td>
	</tr>
	<?php
	mysqli_select_db($con, 'userregistration');
	$b = "select postID,Title from titleandcontent";
	$tableTitles = mysqli_query($con, $b);
	$rowLen = mysqli_num_rows($tableTitles);
	for($i = 0; $i<$rowLen; $i++)
	{
		$temp = mysqli_fetch_row($tableTitles);
		//$temp1 = mysqli_fetch_row($tableTitles)[1];
		echo("
		<tr>
			<td class='trForum'><form method='get' action='singleForum.php' style='width: 100%; height:100%; margin: 0px'><button type='submit' class='hello'>$temp[1]</button></td><td class='trSmol'><input type='text' name='thePostID' class='postIDClass' value='$temp[0]' readonly></input></form></td>
		</tr>
		");
	}
	?>
	<tr>
		<td class="trForum" style="border: 0px"><button class="btn" onclick="location.href='registration.php'" style="z-index: 0; background-color: #6c757d; color: #fff;">Go to Registration Page</button>
</td>
	</tr>
</table><br>
<button type="button" class="forum-add" onclick="titleAndContent()"><p class="forum-p"> + </p></button>
<div id="titleContent" style="z-index: 100">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group">
	<label>Title</label><br>
	<input type="text" name="title" class="form-control" placeholder="Enter title..." id="theTitle" required>
	<span class="error"> * <?php echo $titleErr;?></span>
</div>
<div class="form-group">
	<textarea rows="10" cols="50" name="content" placeholder="Enter text here..." class="form-control" id="theContent" required></textarea>
	<span class="error"> * <?php echo $contentErr;?></span>
</div>
<button class="btn btn-primary form-group" type="submit">Submit</button><button class="btn btn-secondary form-group" type="button" onclick="hideDiv()">Cancel</button>
</form>
</div>
</span>
</body>
</html>
