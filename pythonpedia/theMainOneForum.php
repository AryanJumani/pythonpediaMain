<?php
if(isset($_POST["Comment"])){
    $comment = $_POST["Comment"];
    $id = $_POST["nyeh"];
    $con = mysqli_connect('localhost', 'root', '123456');
    mysqli_select_db($con, 'forums');
    $adder = "insert into theComments(ForumID, Comment) values('$id', '$comment')";
    mysqli_query($con, $adder);
}
?>
