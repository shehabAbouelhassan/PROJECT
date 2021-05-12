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
        <div class="navbar navbar-fixed-top">
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
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
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
    <div class="sidebar">
      <ul class="widget widget-menu styled">
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
                        <center>
                        <a href="issue_requests.php" class="btn btn-info">Issue Requests</a>
                        <a href="renew_requests.php" class="btn btn-info">Renew Request</a>
                        <a href="return_requests.php" class="btn btn-info">Return Requests</a>
                        </center>
                        <h1><i>Return Requests</i></h1>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Code</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Dues</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select return.BookId,return.Code,Title,datediff(curdate(),Due_Date) as x from LMS.return,LMS.book,LMS.record where return.BookId=book.BookId and return.BookId=record.BookId and return.Code=record.Code";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $Code=$row['Code'];
                                $name=$row['Title'];
                                $dues=$row['x'];
                                
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($Code) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php 
                                      if($dues > 0)
                                          echo $dues;
                                          else
                                          echo 0; ?></td>
                                      <td><center>
                                                                                
                                        <a href="acceptreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $Code; ?>&id3=<?php echo $dues ?>" class="btn btn-success">Accept</a>
                                         
                                        <!--a href="rejectreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $Code; ?>" class="btn btn-danger">Reject</a-->
                                    </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
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
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>