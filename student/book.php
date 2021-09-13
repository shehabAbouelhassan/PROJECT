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
        <div class="wrapper">
            <div class="container">
                <div class="row">
                  
                    <div class="span9">
                        <form class="form-horizontal row-fluid" action="book.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter Name/ID of Book" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from LMS.book where BookId='$s' or Title like '%$s%'";
                                        }
                                    else
                                        $sql="select * from LMS.book order by Availability DESC";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Availability</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                            ?>
                                    <tr>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><b><?php 
                                           if($avail > 0)
                                              echo "<font color=\"green\">AVAILABLE</font>";
                                            else
                                            	echo "<font color=\"red\">NOT AVAILABLE</font>";

                                                 ?>
                                                 	
                                                 </b></td>
                                      <td><center><a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Details</a>
                                      	<?php
                                      	if($avail > 0)
                                      		echo "<a href=\"issue_request.php?id=".$bookid."\" class=\"btn btn-success\">Issue</a>";
                                        ?>
                                        </center></td>
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
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