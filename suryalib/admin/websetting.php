<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
 {
header('Location: login.php');
}

include "model/config.php";

$isError = "";
  
if(isset($_POST['sub']))
{
if($_POST['action']=="webtitle")
{

$webtitle=mysql_real_escape_string($_POST['webtitle']);

$sql = "UPDATE setting SET webtitle = '".$webtitle."' WHERE id = '1'";
mysql_query($sql);
header('Location:websetting.php?act=webtitle&msg=1');

}

if($_POST['action']=="logo")
{

	
	$imageName = $_FILES["upload_files"]["name"];
	if(!empty($imageName)) {
		 $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
		 $fileAllow = array("jpg","png","jpeg");
		 if(in_array($fileExtension,$fileAllow)){
		 
			if($_FILES['upload_files']['size']< 500000) {	
				if($_POST['preimg'] != ""){ @unlink("../../images/".$_POST['preimg']); }
				
				$strDtMix = @date("d").substr((string)microtime(), 2, 8);
				$uploadfile = $strDtMix.".".pathinfo($imageName, PATHINFO_EXTENSION);
				move_uploaded_file($_FILES['upload_files']['tmp_name'], "../../images/".$uploadfile);
				 
				$sql = "UPDATE setting SET logo = '".$uploadfile."'  WHERE id = '1'";
                 mysql_query($sql);
                 header('Location:websetting.php?act=logo&msg=1');
			}else{
				
				header('Location:websetting.php?act=logo&msg=2');
			}		
			
		}else{
			
			header('Location:websetting.php?act=logo&msg=3');
		 }
	}else{
		
		header('Location:websetting.php?act=logo&msg=4');
		
	}


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
				   if($_REQUEST['msg']=="1" && isset($_REQUEST['act']) && $_REQUEST['act']=="webtitle")
				   {
				   echo '<span class="notification n-success">Edit Website Title Successfully.......!!</span>';
                    }
					 if($_REQUEST['msg']=="1" && isset($_REQUEST['act']) && $_REQUEST['act']=="logo")
				   {
				   echo '<span class="notification n-success">Update Logo Successfully.......!!</span>';
                    }
					
					 if($_REQUEST['msg']=="2" && isset($_REQUEST['act']) && $_REQUEST['act']=="logo")
				   {
				   echo '<span class="notification n-error">Error: Sorry, your file is too large. Please upload under 500kb</span>';
                    }
					
					 if($_REQUEST['msg']=="3" && isset($_REQUEST['act']) && $_REQUEST['act']=="logo")
				   {
				   echo '<span class="notification n-error">Error: Please upload jpg,jpeg,png file extensions.</span>';
                    }
					
					 if($_REQUEST['msg']=="4" && isset($_REQUEST['act']) && $_REQUEST['act']=="logo")
				   {
				   echo '<span class="notification n-error">Error: Please upload your image.</span>';
                    }
					
					
					 
					 
				?>
				   
	              <form name="setfooter" action="websetting.php" method="post" enctype="multipart/form-data">
     <table width="100%">
	 <?php
	   $act = mysql_real_escape_string($_REQUEST['act']);
	   $sql = "SELECT * FROM setting ";
	   $res = mysql_query($sql);

             $row = mysql_fetch_array($res);
	 
	   if(isset($_REQUEST['act']) && $_REQUEST['act']=="webtitle")
	   {
	 
	   ?>			   

          <tr>
            <td width="326" height="65" align="right">Website Title: </td>
            <td width="553" align="left">
            <input type="text" name="webtitle" id="webtitle" value="<?php echo $row['webtitle'];?>" class="input-medium" /><label>
            </label></td>
            </tr>
       
		  
		    <tr>
          <td></td>
            <td align="left"> 
			<input type="hidden" value="<?php echo $act;?>" name="action" >
			<input class="submit-green" type="submit" value="Save"  name="sub"/> 
            <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
		  
		  <?php 
		  }else
		   if(isset($_REQUEST['act']) && $_REQUEST['act']=="logo")
	       { ?>
		   
		      <tr>
            <td width="326" height="65" align="right"> Logo </td>
            <td width="553" align="left">
			<input type="hidden" value="<?php echo $row['logo'];?>" name="preimg" id="preimg" >
            <input type="file" name="upload_files" id="upload_files"  class="input-medium" /><label>
            </label></td>
            </tr>
       
		  
		    <tr>
          <td></td>
            <td align="left"> 
			<input type="hidden" value="<?php echo $act;?>" name="action" >
			<input class="submit-green" type="submit" value="Save"  name="sub"/> 
          </tr>
		  
		  <?php 
		   
		   
		  }else
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