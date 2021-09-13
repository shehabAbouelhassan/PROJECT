﻿<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/font-css/LineIcons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet"><!-- //Fonts -->
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
                                <li><a href="message.php"><i class="lni lni-dropbox-original"></i>Messages</a>
                                </li>
                                </li>
                                <li><a href="book.php" ><i class="lni lni-book"></i>All Books </a>
                                </li>
                                <li><a href="history.php"><i class="menu-icon icon-tasks"></i>Previously Borrowed Books </a></li>
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
        <div class="container">
            <div class="row">
  
  
                    <div class="span9">
                    <div class="card" style="width: 70%;">
                        <img class="card-img-top" src="images/img_avatar1.png" alt="Card image">
                             
                                
                                <div class="card-body">

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
                                $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                ?>    
                                    
                                    <h1 class="card-title"><?php echo "Current Session- ", $name ?></left></h1>
                                    
                                    <p><b>User Name: </b><?php echo $Code ?></p>
                                    
                                    <p><b>Mobile number: </b><?php echo $mobno ?></p>
                                    </b>
                                

                                </div>
                            </div>
                        <br> 
                        <!--directiing to other linked page -->
                        <a href="edit_student_details.php" class="btn btn-primary">Edit Details</a>
                                     
                    </div>
                    
                    <!--/.span9-->
                </div>
                
            </div>
            <!--/.container-->
            <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2021 Library System </b>All rights reserved.
            </div>
        
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
       <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>