<?php
require('dbconn.php');

$id=$_GET['id'];

$Code=$_SESSION['Code'];

$sql="insert into LMS.renew (Code,BookId) values ('$Code','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=current.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=current.php", true, 303);

}




?>