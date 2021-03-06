<?php
ob_start();
//required paramter to establish a cnnoection with the database
require('dbconn.php');
?>

<?php 
//checking if the current user already registred 
//and start session connection to that user credintials 
if ($_SESSION['Code']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LS</title>
        <!-- bootStrap -->
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!-- styling -->
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <!-- Fonts -->
        <link type="text/css" href="images/icons/font-css/LineIcons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet"><!-- //Fonts -->
        <!-- /Fonts -->
    </head>
    <body>
      <!-- navBar -->
      <div class="navbar navbar-fixed-top">
        <!-- navbar-inner -->
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="index.php">LS </a>
                    <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                 <li class=""><a href="index.php"><i class="lni lni-home"></i>Home   </a></li>
                                <li><a href="message.php">  <i class="lni lni-inbox"></i></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="lni lni-consulting"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php" ><i class="lni lni-book"></i>All Books </a>
                                </li>
                                <li><a href="requests.php"><i class="lni lni-stackoverflow"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="lni lni-customer"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="lni lni-checkbox"></i>Currently Issued Books </a></li>
                                                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="lni lni-pointer-left"></i>Logout </a></li>
                     </ul>
                            </li>
                        </ul>
                         <!-- /Dropdown-toogle within the navbar -->
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="container" style="
    display: flex;
    align-content: center;
    justify-content: center;
    align-items: center;
">
            <div class="row">
  <div class="span3">
    <!-- sidebar with styled menu -->
    <div class="sidebar">
      <ul class="widget widget-menu styled">
      <!-- listing itmes within the sidebar menu -->
        
      </ul>
      
    </div>
    <!--/.sidebar-->
  </div>
  <!--/.span3-->    
                    <div class="span9" style="
    display: contents;
">
                        <div class="module">
                            <div class="module-head">
                                <h3>Update Details</h3>
                            </div>
                            <div class="module-body">


                                <?php
                                // check for the emptiness
                                $Code = $_SESSION['Code'];
                                //fetching and entring the data in 
                                //accordance with the declared valriable
                                $sql="select * from LMS.user where Code='$Code'";
                                $result=$conn->query($sql);
                                //// output data of each row
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                $pswd=$row['Password'];
                                ?>    
                                
                                <form class="form-horizontal row-fluid" action="edit_admin_details.php?id=<?php echo $Code ?>" method="post">
                                            <!--Bootstrap control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="Name"><b>Name:</b></label>
                                        <div class="controls">
                                        <!--Bootstrap input field -->
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8" required>
                                        </div>
                                    </div>
                                                <!--Bootstrap control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                                        <div class="controls">
                                        <!--Bootstrap input field -->
                                            <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8" required>
                                        </div>
                                    </div>
                                        <!--Bootstrap control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="MobNo"><b>Mobile Number:</b></label>
                                        <div class="controls">
                                        <!--Bootstrap input field -->
                                            <input type="text" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" class="span8" required>
                                        </div>
                                    </div>
                                                <!--Bootstrap control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="Password"><b>New Password:</b></label>
                                        <div class="controls">
                                        <!--Bootstrap input field -->
                                            <input type="password" id="Password" name="Password"  value= "<?php echo $pswd?>" class="span8" required>
                                        </div>
                                    </div>   
                                                <!--Bootstrap control-group -->
                                    <div class="control-group">
                                            <div class="controls">
                                            <!--Bootstrap submission button -->
                                                <button type="submit" name="submit"class="btn-primary"><center>Update Details</center></button>
                                            </div>
                                        </div>                                                                     

                                </form>
                                       
                        </div>
                        </div>  
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

        <div class="footer" style=" display : flex">
            <div class="container"     style="
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
        ">
            
                <b class="copyright">&copy; 2021 Library System </b>All rights reserved.
            </div>
        </div>

        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
       <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
//check submit button clicked or not 
if(isset($_POST['submit']))
{
    $Code = $_GET['id'];
    $name=$_POST['Name'];
    $email=$_POST['EmailId'];
    $mobno=$_POST['MobNo'];
    $pswd=$_POST['Password'];
//updating the database with the newly entred values 
$sql1="update LMS.user set Name='$name', EmailId='$email', MobNo='$mobno', Password='$pswd' where Code='$Code'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>