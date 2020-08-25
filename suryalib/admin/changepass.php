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
$obj=new  Addmem();
?>

<?php  
if(isset($_POST['sub']))
{

$op=$_POST['Opass'];
$oldpas=$obj->checkpass($op);
if(mysql_num_rows($oldpas)==1)
{
   $newpas=$_POST['Npass'];
   $upd=$obj->updatepass($newpas);
   if($upd)
   header('location:changepass.php?msg=Password Change Successfully........!!&upd=update');

}
else
header('location:changepass.php?msg=Invalid Old Password&upd=invalid');
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
                     <h2><font size="5"><span>|| Change Password ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                  <?php 
				   if(isset($_REQUEST['msg']) && $_REQUEST['upd']=="update")
				   {
				   ?>
                   <span class="notification n-success"><?php echo $_REQUEST['msg'] ;?></span>
                   <?php
                   }
				   ?>   
      <form name="" action="" method="post">
                                             
          <table width="100%">
          <tr>
           <td width="326" height="55" align="right">Username : </td>
          <td width="553" align="left"><input type="text" readonly="readonly" value="<?php echo $_SESSION['username']; ?>"  class="input-medium"/></td>
         
          </tr>
          <tr>
            <td width="326" height="55" align="right"> Old password : </td>
            <td width="553" align="left">
            <input type="password" name="Opass" id="Opass" value="" class="input-medium"  />
            <?php 
		     if(isset($_REQUEST['msg']) && $_REQUEST['upd']=="invalid")
			  {
			  ?>
             <span class="notification-input ni-error"><?php echo $_REQUEST['msg'] ;?></span>
            <?php
              }
			 ?>   
            
            </td>
            </tr>
           <tr>
            <td width="326" height="55" align="right">New password : </td>
            <td width="553" align="left">
            <input type="password" name="Npass" id="Npass" value="" class="input-medium"  /></td>
            </tr>

          <tr>
            <td height="55" align="right">Confirm password : </td>
            <td align="left"><input type="password" name="Cpass" id="Cpass" class="input-medium" />
              
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
         <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
       <?php include "include/footer.php";?>
	</body>
</html>