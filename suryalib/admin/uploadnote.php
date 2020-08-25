<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username']))
 {
header('Location: login.php');
}
include "controller/lib_manage.php";
$obj=new librarian();

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
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                     <h2><font size="5"><span>|| Upload Data ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                  <?php 
				   if(isset($_REQUEST['msg']))
				   {
				   ?>
                   <span class="notification n-success"><?php echo $_REQUEST['msg'] ;?></span>
                   <?php
                   }
				   ?>   
      <form name="" action="add_data.php" method="post"  enctype="multipart/form-data" name="form1" id="form1">
                                             
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Subject </td>
            <td width="553" align="left">
            <select name="subj"  id="subj" class="input-medium" />
            <option value="">Select Subject </option>
                        <?php  $row=$obj->getSrec();
					   
	                       while($lin=mysql_fetch_array($row))
                             {
                               ?>
                        <option value="<?php echo $lin['id'] ;?>"><?php echo $lin['subject_name'] ;?> </option>
                      <?php }  ?>
                     </select>
             </td>
            </tr>
          
          <tr>
            <td height="45" align="right">Title : </td>
            <td align="left"><input type="text" name="title" id="title" class="input-medium" />
            </td>
          </tr>
          
          <tr>
            <td height="45" align="right">File : </td>
            <td align="left"><input type="file" name="file" id="file" />
            </td>
          </tr>
          
         <tr>
          <td></td>
            <td align="left"> <input class="submit-green" type="submit" value="Save"  name="sub"/> 
                                <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
        </table>
       
                                               
                            
                       </form>
                        
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
           
			            
            
           <?php //include "include/oderlist.php";?>
            <?php //include "include/pargrarph.php";?>
            
            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
       <?php include "include/footer.php";?>
	</body>
</html>