<?php

// Inialize session
ob_start();
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: login.php');
}
include "controller/createMem.php";
$obj= new Addmem();
?>

<?php 
if(isset($_POST['sub']))
{
	$ac=$_POST['STac'];
	$st=$_POST['stname'];
	$res=$obj->addstaffmem($ac,$st);
	
}

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
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                                    
                     <h2><font size="5"><span>|| Add New Staff Member ||</span></font></h2>
                        
                     <div class="module-body">
                     <?php 
				   if($res)
				   {
				   ?>
                   <span class="notification n-success">Add New Writer Name Successfully.......!!</span>
                   <?php
                   }
				   ?>   
             <form name="" action="" method="post">
            <table width="100%">
          <tr>
          <?php
          $accid=$obj->getstaffID();
		   ?>
            <td width="326" height="45" align="right">Staff ID :</td>
            <td width="553" align="left"><input type="text" name="STac" id="STac" class="input-medium"
            value="<?php echo $accid ?>" readonly="readonly"/></td>
            </tr>
           <tr>
            <td height="45"  align="right">Staff Name :</td>
            <td align="left"><input type="text" name="stname" id="stname" class="input-medium" /></td>
            </tr>
            <tr>
          <td></td>
                   <td align="left" height="45"> 
             <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
             <input class="submit-gray" type="reset" value="Reset" /><br/><br/>
             <a href="view_editstaff.php">view staff member</a>
            </tr>
           </table>
            </form>
              </div> <!-- End .module-body -->
                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
           <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
     <?php include "include/footer.php";?>
	</body>
</html>