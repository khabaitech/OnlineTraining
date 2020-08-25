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
$nam=$_POST['sid'];
$sname=$_POST['subn'];
$res=$rec->updsubject($nam,$sname);
if($res)
{
 header("Location:view_subject.php?msg=USB");
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
		  if(isset($_REQUEST['subid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Book Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_sub" action="" method="post">
                  
                                              
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Subject ID : </td>
            <td width="553" align="left">
           <input type="text" name="sid" id="sid" class="input-medium" value="<?php echo $_REQUEST['subid'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Subject Name : </td>
            <td align="left">
            <input type="text" name="subn" id="subn" class="input-medium" value="<?php echo $_REQUEST['sn'] ;?>" />
              
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
                	<h2><span>|| Mange Subject ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="USB")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Subject Name Edit Successfully.......!!</span></div>
                   <?php
                   }
				   ?> 
                        
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:5%">Subject ID</th>
                                     <th style="width:20%">Subject Name</th>
                                     <th style="width:6%">&nbsp; &nbsp Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getSrec();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['id'];?></td>
                                    <td> <?php echo $lin['subject_name'];?></td>
                                                                                                             
                                    <td>                               
                                   &nbsp; &nbsp; &nbsp; <a href="view_subject.php?subid=<?php echo $lin['id']; ?>&msg=upd&sn=<?php echo $lin['subject_name']; ?>" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                                                             
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                        </form>
                        <a href="add_subject.php"><input type="image" src="images/addsub.png" /></a>
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