<?php
//required paramter to establish a cnnoection with the database
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->

<head>

    <title>"Library System" </title>

    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- //Meta-Tags -->

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/sketchy/bootstrap.min.css"
        integrity="sha384-RxqHG2ilm4r6aFRpGmBbGTjsqwfqHOKy1ArsMhHusnRO47jcGqpIQqlQK/kmGy9R" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <!-- //Fonts -->

    <style>
        #footer {
            position: fixed;
            text-align: center;
            padding: 24px 24px 0px 24px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/ 
            height: 40px;
            background: white;
        }
    </style>
    
</head>
<!-- //Head -->

<!-- Body -->

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<h1>Library System</h1>
      <p style="text-align:center"></p>  

    
  </div>
</nav>
<div id="footer"><p> &copy; 2021 Library System Login. All Rights Reserved </a></p>
                  </div>

    
    <div class="container">

        <div class="login">
            <h2>Sign In Here</h2> <!--declaring a heading -->
            <form action="index.php" method="post"><!--declaring HTM page type form -->
                <input type="text" Name="Code" placeholder="User Code" required=""> <!-- declaring input form -->
                <input type="password" Name="Password" placeholder="Password" required="">


                <div class="send-button">
                    <!--<form>-->
                    <input type="submit" name="signin" ; value="Sign In">
            </form>
        </div>

        <div class="clear"></div>
    </div>

    <div class="register">
        <h2>Sign Up Here</h2><!--declaring a heading -->
        <form action="index.php" method="post"><!--declaring HTM page type form -->
        <!-- declaring  various input forms -->
            <input type="text" Name="Name" placeholder="Name" required="">
            <input type="text" Name="Email" placeholder="Email" required="">
            <input type="password" Name="Password" placeholder="Password" required="">
            <input type="text" Name="PhoneNumber" placeholder="Phone Number" required="">
            <input type="text" Name="Code" placeholder="User Code" required="">

                <!-- declaring radio button -->
            <select name="Category" id="Category">
                <option value="GR">general readers</option>
                <option value="SubR">subject readers</option>
                <option value="SpecR">special readers</option>
                <option value="NaR">non- reading</option>
            </select>
            <br>


            <br>
            <!-- declaring submission button -->
            <div class="send-button">
                <input type="submit" name="signup" value="Sign Up">
        </form>
    </div>
    <p>By creating an account, you agree to our <a class="underline" href="terms.html">Terms</a></p>
    <div class="clear"></div>
    </div>

    <div class="clear"></div>

    </div>

    

    <?php
    
   // check for the emptiness of the -signIn_form
if(isset($_POST['signin']))
{$u=$_POST['Code'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 //fetching and returning the data in 
 //accordance with the declared valriable 
 $sql="select * from LMS.user where Code='$u'";

 // send a query to the MySQL server
 $result = $conn->query($sql);

 //// output data of each row
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['Code']=$u;
   

// if row type y is Admin,direct to the Admin module
//else to the user module
  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
  //otherwise print out a faileur message
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect Code or Password')</script>";
}
   

}

// check for the emptiness of the -signUp_form
if(isset($_POST['signup']))
{

	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$Code=$_POST['Code'];
	$category=$_POST['Category'];
	$type='Student';

    
 //fetching and entring the data in 
 //accordance with the declared valriable
	$sql="insert into LMS.user (Name,Type,Category,Code,EmailId,MobNo,Password) values ('$name','$type','$category','$Code','$email','$mobno','$password')";

    //if the asked request to the database is permitted
	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>


</body>
<!-- //Body -->

</html>