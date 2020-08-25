<?php
ob_start();
session_start();
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
$id=mysql_real_escape_string($_POST['sid']);
$nam=mysql_real_escape_string($_POST['subname']);
$chksn=$obj->chksub($nam);
if($chksn)
header('Location:add_subject.php?msg=error');
else
$mseg = $obj->set_sub($id,$nam); 
if($mseg=="add")
header('Location:add_subject.php?msg=add');
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
                     <h2><font size="5"><span>|| Add New Subject ||</span></font></h2>
                   <div class="module-body"><!--put tab here -->
                   <?php 
				   if($_REQUEST['msg']=="add")
				   {
				   ?>
                   <span class="notification n-success">Add New Subject Successfully.......!!</span>
                   <?php
                   }
				   if($_REQUEST['msg']=="error")
				   {
				   ?>
                   <span class="notification n-error">Error: Duplicate Records.</span>   
                   <?php
                   }
				   ?>
      <form name="add_sub" action="" method="post">
     <table width="100%">
          <tr>
            <td width="326" height="65" align="right">Subject ID : </td>
            <td width="553" align="left">
            <input type="text" name="sid" id="sid" value="<?php echo $obj->get_id("subject");?>" class="input-medium" readonly="readonly"/><label>
            </label></td>
            </tr>
        <tr>
            <td height="65" align="right">Subject Name : </td>
            <td align="left"><input type="text" name="subname" id="subname" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
         <tr>
          <td></td>
            <td align="left"> <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
                                <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
        </table>
          </form>
            <center><a href="view_subject.php">View All Subject....</a></center>
                     </div> <!-- End .module-body -->
                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
	     <?php include "include/footer.php";?>
	</body>
</html>