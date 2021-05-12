<?php
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
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">LS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
        <div class="container">
            <div class="row">
  <div class="span3">
    <!-- sidebar with styled menu -->
    <div class="sidebar">
      <ul class="widget widget-menu styled">
      <!-- listing itmes within the sidebar menu -->
        <li class="active"><a href="index.php"><i class="lni lni-home"></i>Home
          </a></li>
        <li><a href="message.php"><i class="lni lni-dropbox-original"></i>Messages</a>
        </li>
        <li><a href="student.php"><i class="lni lni-consulting"></i>Manage Students </a>
        </li>
        <li><a href="book.php" ><i class="lni lni-book"></i>All Books </a>
        </li>
        <li><a href="requests.php"><i class="lni lni-stackoverflow"></i>Issue/Return Requests </a></li>
        <li><a href="recommendations.php"><i class="lni lni-customer"></i>Book Recommendations </a></li>
        <li><a href="current.php"><i class="lni lni-checkbox"></i>Currently Issued Books </a></li>
      </ul>
      <ul class="widget widget-menu styled">
        <li><a href="logout.php"><i class="lni lni-pointer-left"></i>Logout </a></li>
      </ul>
    </div>
    <!--/.sidebar-->
  </div>
  <!--/.span3-->        

                    <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Send a message</h3>
                            </div>
                            <div class="module-body">
                          <br >
                                    <form class="form-horizontal row-fluid" action="message.php" method="post">
                                        <!--Bootstrap control-group -->
                                        <div class="control-group">
                                            <label class="control-label" for="Code"><b>Receiver Code:</b></label>
                                            <div class="controls">
                                            <!--Bootstrap input field -->
                                                <input type="text" id="Code" name="Code" placeholder="Code" class="span8" required>
                                            </div>
                                        </div>
                                        <!--Bootstrap control-group -->
                                        <div class="control-group">
                                            <label class="control-label" for="Message"><b>Message:</b></label>
                                            <div class="controls">
                                            <!--Bootstrap input field -->
                                                <input type="text" id="Message" name="Message" placeholder="Enter Message" class="span8" required>
                                            </div>
                                            <hr>
                                            <!--Bootstrap control-group -->
                                        <div class="control-group">
                                            <div class="controls">
                                            <!--Bootstrap input field -->
                                                <button type="submit" name="submit"class="btn">Add Message</button>
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
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2021 Library System </b>All rights reserved.
            </div>
        </div>
        
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

<?php
// check for the emptiness
if(isset($_POST['submit']))
{
    $Code=$_POST['Code'];
    $message=$_POST['Message'];

 //fetching and returning the data in 
 //accordance with the declared valriable 
$sql1="insert into LMS.message (Code,Msg,Date,Time) values ('$Code','$message',curdate(),curtime())";


if($conn->query($sql1) === TRUE){
     // send a query to the MySQL server
echo "<script type='text/javascript'>alert('Success')</script>";
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