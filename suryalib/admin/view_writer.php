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
<?php include "controller/lib_manage.php";
$rec = new librarian();
 ?>

<?php

if(isset($_POST['updat']))
{
$nam=$_POST['wid'];
$wname=$_POST['wrin'];
$res=$rec->updwriter($nam,$wname);
if($res)
{
 header("Location:view_writer.php?msg=UWR");
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
<?php include "javascript/javascr.php" ; ?>
</head>
	<body>
    <?php include "include/headder_with_menu.php";?>
    	<div class="container_12">
        <br/>
          <div class="grid_12">
          <?php 
		  if(isset($_REQUEST['wriid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Book Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_sub" action="" method="post">
                  
                                              
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Writer ID : </td>
            <td width="553" align="left">
           <input type="text" name="wid" id="wid" class="input-medium" value="<?php echo $_REQUEST['wriid'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Writer Name : </td>
            <td align="left">
            <input type="text" name="wrin" id="wrin" class="input-medium" value="<?php echo $_REQUEST['sn'] ;?>" />
              
            </td>
          </tr>
          
         <tr>
          <td></td>
            <td align="left"><input class="submit-green" type="submit" value="Update"  name="updat"/> 
                                <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
        </table>
             </form>
               </div> <!-- End .module-body -->
                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
                
          <?php 
		  }
		  ?>     <div class="module">
                	<h2><span>|| Mange Writer ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="UWR")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Writer Name Edit Successfully.......!!</span></div>
                   <?php
                   }
				   ?> 
                        
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:5%">Writer ID</th>
                                     <th style="width:20%">Writer Name</th>
                                     <th style="width:6%">&nbsp; &nbsp Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getWrec();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['id'];?></td>
                                    <td> <?php echo $lin['writer_name'];?></td>
                                                                                                             
                                    <td>                               
                                   &nbsp; &nbsp; &nbsp; <a href="view_writer.php?wriid=<?php echo $lin['id']; ?>&msg=upd&sn=<?php echo $lin['writer_name']; ?>" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                                                             
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                        </form>
                        <a href="add_writer.php"><input type="image" src="images/addwiter.png" /> </a>
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