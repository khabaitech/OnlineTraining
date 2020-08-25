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

<?php  
if(isset($_POST['sub']))
{
$id=$_POST['pid'];
$Pnam=$_POST['pname'];
$Ptec=$_POST['ptec'];
$Plev=$_POST['Plev'];
$res = $obj->set_proj($id,$Pnam,$Ptec,$Plev); 
if($res)
$msg="add";
else
$msg="error";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
        <?php include "javascript/javascr.php" ;?>
<head>
	<body>
        <?php include "include/headder_with_menu.php";?>
    	       
		<div class="container_12">
        <br/>
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                     <h2><font size="5"><span>|| Add Project Detail ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                  <?php 
				   if($msg=="add")
				   {
				   ?>
                   <span class="notification n-success">Add New Project Detail Successfully.......!!</span>
                   <?php
                   }
				   ?>   
      <form name="add_wri" action="" method="post">
                                             
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Project ID : </td>
            <td width="553" align="left">
            <input type="text" name="pid" id="pid" value="<?php echo $obj->get_Pid();?>" class="input-medium" readonly="readonly"/>            </td>
            </tr>
          
          <tr>
            <td height="45" align="right">Project Title : </td>
            <td align="left"><input type="text" name="pname" id="pname" class="input-medium" />
            </td>
          </tr>
           <tr>
            <td height="45" align="right">Technology : </td>
            <td align="left"><input type="text" name="ptec" id="ptec" class="input-medium" />
            </td>
          </tr>
           <tr>
		  <td width="326" height="45" align="right">Level : </td>
            <td width="553" align="left">
            <select name="Plev" class="input-short" >
           <option value="">Select Level</option> 
           <option value="BCA">BCA</option>
		   <option value="PGDCA">PGDCA</option>
           <option value="M.Sc">M.Sc</option>      
           </select>
          </td>
           </tr>
          
         <tr>
          <td></td>
            <td align="left"> <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
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