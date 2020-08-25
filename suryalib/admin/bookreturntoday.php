<?php

// Inialize session
ob_start();
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: login.php');
}
?>
<?php include "controller/reports.php";
$rec = new reportOfBN();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
        <?php include "javascript/javascr.php" ;?>
</head>
	<body>
    <?php include "include/headder_with_menu.php";?>
    	<div class="container_12">
        <br/>
          <div class="grid_12">
            <div class="module">
                	<h2><span>|| Book/Notes Return Today ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                       <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%"># &nbsp; &nbsp; S.No.</th>
                                    <th style="width:5%">Student ID</th>
                                     <th style="width:5%">Book ID</th>
                                     <th style="width:6%">Issue Date</th>
                                     <th style="width:6%">Duration</th>
                                     <th style="width:6%">Return Date</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->todaybooks();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['student_id'];?></td>
                                    <td> <?php echo $lin['Book_id'];?></td>
                                     <td> <?php echo $lin['Issue_date'];?></td>
                                     <td> <?php echo $lin['Duration'];?></td>
                                  <td> <?php echo $lin['Return_date'];?></td>
                               </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                        </form>
                             <?php include "include/pager.php";?>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div>
                       
                       
			</div> <!-- End .grid_12 -->
                  
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
       <?php include "include/footer.php";?>
	</body>
</html>