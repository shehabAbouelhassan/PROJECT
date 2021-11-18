<?php
require('dbconn.php');

$rid=$_GET['id1'];

$Code=$_GET['id2'];

$sql="delete from  LMS.recommendations WHERE Code='$Code' and RID='$rid'";

if($conn->query($sql) === TRUE)
{
	$sql1="insert into LMS.message (Code,Msg,Date,Time) values ('$Code','Your book recommendation number: $rid 
	 has been accepted',curdate(),curtime())";
 $result=$conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=recommendations.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=recommendations.php", true, 303);

}




?>



<?php
require('dbconn.php');

$rid=$_GET['id1'];

$Code=$_GET['id2'];

$sql="delete from LMS.recommendations where Code='$Code' and RID='$rid'";

if($conn->query($sql) === TRUE)
{
	$sql1="insert into LMS.message (Code,Msg,Date,Time) values ('$Code','Your book recommendation number: $rid  has been rejected',curdate(),curtime())";
 $result=$conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=recommendations.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=recommendations.php", true, 303);

}




?>