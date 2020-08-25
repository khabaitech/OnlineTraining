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
<?php include "controller/std_manage.php";
$std = new stdmanage();
 ?>

<?php

if(isset($_POST['updat']))
{
$stdid=$_POST['sid'];
$stdname=$_POST['sname'];
$res=$std->updstdname($stdid,$stdname);
if($res)
{
 header("Location:view_user.php?msg=URK");
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
		  if(isset($_REQUEST['rakid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Book Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_sub" action="" method="post">
                  
                                              
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Account no : </td>
            <td width="553" align="left">
           <input type="text" name="sid" id="sid" class="input-medium" value="<?php echo $_REQUEST['rakid'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Name : </td>
            <td align="left">
            <input type="text" name="sname" id="sname" class="input-medium" value="<?php echo $_REQUEST['sn'] ;?>" />
              
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
		  ?>  <!--else -->      <div class="module">
                	<h2><span>|| Mange User ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="URK")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Rack Location Edit Successfully.......!!</span></div>
                   <?php
                   }
				 if($_REQUEST['msg']=="rackdell")
				   {
				   
				   ?> 
                   <br/>
                  <div> <span class="notification n-success">Rack Delete Successfully.......!!</span></div>
                   <?php
                   }
				   ?>
                        
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%"># &nbsp; &nbsp; S.No.</th>
                                    <th style="width:5%">Acitivation ID</th>
                                     <th style="width:5%">Account No.</th>
                                     <th style="width:10%">Name</th>
                                     <th style="width:8%">Course</th>
                                     <th style="width:6%">&nbsp; &nbsp Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$std->getstdloginuser();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['ID'];?></td>
                                    <td><?php echo $lin['Account_no'];?></td>
                                    <td><?php echo $lin['sname'];?></td>
                                     <?php 
									  $CSname=substr($lin['Account_no'],0,1);
									   if($CSname=="B")
										 $cname="BCA";
										 if($CSname=="M")
										 $cname="M.Sc";
										if($CSname=="D")
										 $cname="DCA";
										if($CSname=="P")
										 $cname="PGDCA"; 
										 ?>
                                    <td><?php echo $cname ;?></td>
                                         
                                                                                                             
                                    <td>                               
                                   &nbsp; &nbsp; &nbsp; <a href="view_user.php?rakid=<?php echo $lin['Account_no']; ?>&msg=upd&sn=<?php echo $lin['sname']; ?>" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                                                             
                                    </td>
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