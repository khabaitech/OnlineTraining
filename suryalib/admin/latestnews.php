<?php

// Inialize session
ob_start();
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
$id=$_POST['nid'];
$des=mysql_real_escape_string($_POST['desc']);
$bd=explode('-',$_POST['bpd']);
$dat=$bd[2]."-".$bd[1]."-".$bd[0];
$msg = $obj->set_news($id,$dat,$des); 
if($msg)
header('location:latestnews.php?mseg=add');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
       
       <?php include "javascript/javascr.php"; ?>
        </head>
	<body>
        <?php include "include/headder_with_menu.php";?>
    	       
		<div class="container_12">
        <br/>
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                     <h2><font size="5"><span>|| Add News ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                  <?php 
				   if($_REQUEST['mseg']=="add")
				   {
				   ?>
                   <span class="notification n-success">Add News Successfully.......!!</span>
                   <?php
                   }
				   ?>   
      <form name="add_wri" action="" method="post">
                                             
          <table width="100%">
          <tr>
            <td width="30%" align="right" height="45">New ID : </td>
            <td width="70%" align="left">
            <input type="text" name="nid" id="nid" value="<?php echo $obj->get_id("news");?>" class="input-medium" readonly="readonly"/></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Date : </td>
            <td align="left"><input type="text" size="12" id="inputField" name="bpd" class="input-short"/>&nbsp;
          &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
              
            </td>
          </tr>
          <tr>
          <td> </td>
                    
           <td><div style="margin-left:23%;font-weight:bold;">Description</div> <textarea id="wysiwyg" rows="11" cols="70" name="desc"></textarea> </td>
              
           </tr>
          
         <tr>
          <td></td>
            <td align="left"><br /> <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
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