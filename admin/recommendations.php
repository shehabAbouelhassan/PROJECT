<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['Code']) {
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
        <div class="container">
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
                    

                    <div class="span9">
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Book Name</th>
                                      <th>Description</th>
                                      <th>Recommended By</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select * from LMS.recommendations";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookname=$row['Book_Name'];
                                $description=$row['Description'];
                                $Code=$row['Code'];
                            ?>
                                    <tr>
                                      <td><?php echo $bookname ?></td>
                                      <td><?php echo $description?></td>
                                      <td><b><?php echo strtoupper($Code)?></b></td>

                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>

                                <center>
                                <a href="addbook.php" class="btn btn-success">Add a Book</a></center>
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
         <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>