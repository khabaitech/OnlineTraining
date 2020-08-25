<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
 {
header('Location: login.php');
}

include "model/config.php";

  
if(isset($_POST['sub']))
{
if($_POST['action']=="address")
{

$country=mysql_real_escape_string($_POST['country']);
$city=mysql_real_escape_string($_POST['city']);
$address=mysql_real_escape_string($_POST['address']);
$email=mysql_real_escape_string($_POST['email']);
$sql = "UPDATE setting SET country = '".$country."', city = '".$city."', address = '".$address."',email='".$email."'  WHERE id = '1'";
mysql_query($sql);
header('Location:setfooter.php?act=address&msg=1');

}

if($_POST['action']=="whyus")
{

$whyus1=mysql_real_escape_string($_POST['whyus1']);
$whyus2=mysql_real_escape_string($_POST['whyus2']);
$whyus3=mysql_real_escape_string($_POST['whyus3']);
$whyus4=mysql_real_escape_string($_POST['whyus4']);
$sql = "UPDATE setting SET whyus1 = '".$whyus1."', whyus2 = '".$whyus2."', whyus3 = '".$whyus3."',whyus4='".$whyus4."'  WHERE id = '1'";
mysql_query($sql);
header('Location:setfooter.php?act=whyus&msg=1');

}

if($_POST['action']=="connect")
{

$facebook=mysql_real_escape_string($_POST['facebook']);
$twitter=mysql_real_escape_string($_POST['twitter']);
$linkedin=mysql_real_escape_string($_POST['linkedin']);
$googleplus=mysql_real_escape_string($_POST['googleplus']);
$sql = "UPDATE setting SET facebook = '".$facebook."', twitter = '".$twitter."', linkedin = '".$linkedin."',googleplus='".$googleplus."'  WHERE id = '1'";
mysql_query($sql);
header('Location:setfooter.php?act=connect&msg=1');

}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
	<?php include "javascript/javascr.php" ; ?>
		<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="js/ckfinder/ckfinder.js"></script>

		
		
		
</head>
	<body>
        <?php include "include/headder_with_menu.php";?>
    	       
		<div class="container_12">
        <br/>
        <!-- Form elements -->    
      <div class="grid_12">
                   <div class="module1">
                     <h2><font size="5"><span>|| Manage Footer ||</span></font></h2>
                   <div class="module-body"><!--put tab here -->
                   <?php 
				   if($_REQUEST['msg']=="1" && isset($_REQUEST['act']) && $_REQUEST['act']=="address")
				   {
				   echo '<span class="notification n-success">Edit Address Successfully.......!!</span>';
                    }
					 if($_REQUEST['msg']=="1" && isset($_REQUEST['act']) && $_REQUEST['act']=="whyus")
				   {
				   echo '<span class="notification n-success">Edit Why us Successfully.......!!</span>';
                    }
					
					 if($_REQUEST['msg']=="1" && isset($_REQUEST['act']) && $_REQUEST['act']=="connect")
				   {
				   echo '<span class="notification n-success">Edit Connect With Us Successfully.......!!</span>';
                    }
				?>
				   
	              <form name="setfooter" action="" method="post">
     <table width="100%">
	 <?php
	   $act = mysql_real_escape_string($_REQUEST['act']);
	   $sql = "SELECT * FROM setting ";
	   $res = mysql_query($sql);

             $row = mysql_fetch_array($res);
	 
	   if(isset($_REQUEST['act']) && $_REQUEST['act']=="address")
	   {
	 
	   ?>			   

          <tr>
            <td width="326" height="65" align="right">Country: </td>
            <td width="553" align="left">
            <input type="text" name="country" id="country" value="<?php echo $row['country'];?>" class="input-medium" /><label>
            </label></td>
            </tr>
        <tr>
            <td height="65" align="right">City : </td>
            <td align="left"><input type="text" name="city" id="city" value="<?php echo $row['city'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		  
		    <tr>
            <td height="65" align="right">Address : </td>
            <td align="left"><input type="text" name="address" id="address" value="<?php echo $row['address'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		  
		    <tr>
            <td height="65" align="right">Email id : </td>
            <td align="left"><input type="text" name="email" id="email" value="<?php echo $row['email'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		    <tr>
          <td></td>
            <td align="left"> 
			<input type="hidden" value="<?php echo $act;?>" name="action" >
			<input class="submit-green" type="submit" value="Save"  name="sub"/> 
            <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
		  
		  <?php 
		  }else
		   if(isset($_REQUEST['act']) && $_REQUEST['act']=="whyus")
	       { ?>
		   
		      <tr>
            <td width="326" height="65" align="right">why us 1: </td>
            <td width="553" align="left">
            <input type="text" name="whyus1" id="whyus1" value="<?php echo $row['whyus1'];?>" class="input-medium" /><label>
            </label></td>
            </tr>
        <tr>
            <td height="65" align="right">why us 2 : </td>
            <td align="left"><input type="text" name="whyus2" id="whyus2" value="<?php echo $row['whyus2'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		  
		    <tr>
            <td height="65" align="right">why us 3 : </td>
            <td align="left"><input type="text" name="whyus3" id="whyus3" value="<?php echo $row['whyus3'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		  
		    <tr>
            <td height="65" align="right">why us 4 : </td>
            <td align="left"><input type="text" name="whyus4" id="whyus4" value="<?php echo $row['whyus4'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		    <tr>
          <td></td>
            <td align="left"> 
			<input type="hidden" value="<?php echo $act;?>" name="action" >
			<input class="submit-green" type="submit" value="Save"  name="sub"/> 
            <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
		  
		  <?php 
		   
		   
		  }else
		   if(isset($_REQUEST['act']) && $_REQUEST['act']=="connect")
	       { ?>
		   
		      <tr>
            <td width="326" height="65" align="right">Facebook: </td>
            <td width="553" align="left">
            <input type="text" name="facebook" id="facebook" value="<?php echo $row['facebook'];?>" class="input-medium" /><label>
            </label></td>
            </tr>
        <tr>
            <td height="65" align="right">Twitter : </td>
            <td align="left"><input type="text" name="twitter" id="twitter" value="<?php echo $row['twitter'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		  
		    <tr>
            <td height="65" align="right">Linked in: </td>
            <td align="left"><input type="text" name="linkedin" id="linkedin" value="<?php echo $row['linkedin'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		  
		    <tr>
            <td height="65" align="right">Google Plus: </td>
            <td align="left"><input type="text" name="googleplus" id="googleplus" value="<?php echo $row['googleplus'] ;?>" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
		  
		    <tr>
          <td></td>
            <td align="left"> 
			<input type="hidden" value="<?php echo $act;?>" name="action" >
			<input class="submit-green" type="submit" value="Save"  name="sub"/> 
            <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
		  
		  <?php 
		   
		   }
		 
		  else
		  {
		  ?>
		     <span class="notification n-error">Error: Something Goes Wrong !!</span>
		  <?php 
		    }
		  
		  ?>
		   </table>
          </form>
                     </div> <!-- End .module-body -->
                </div>  <!-- End .module -->
        		
            </div> <!-- End .grid_12 -->
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
	     <?php include "include/footer.php";?>
	</body>
</html>