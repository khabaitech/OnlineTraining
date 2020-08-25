<?php
ob_start();
session_start();
if (!isset($_SESSION['username']))
 {
header('Location: login.php');
}

include "model/config.php";

  
if(isset($_POST['Edit']))
{
$id=mysql_real_escape_string($_POST['pid']);
$description=mysql_real_escape_string($_POST['description']);
$met_tags=mysql_real_escape_string($_POST['met_tags']);
$meta_description=mysql_real_escape_string($_POST['meta_description']);
$page_title=mysql_real_escape_string($_POST['page_title']);

$sql = "UPDATE page SET description = '".$description."', met_tags = '".$met_tags."', meta_description = '".$meta_description."',page_title='".$page_title."'  WHERE id = '".$id."'";
mysql_query($sql);
header('Location:cms.php?msg=1');
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
                     <h2><font size="5"><span>|| Manage Page Content ||</span></font></h2>
                   <div class="module-body"><!--put tab here -->
                   <?php 
				   if($_REQUEST['msg']=="1")
				   {
				   echo '<span class="notification n-success">Edit Content Successfully.......!!</span>';
                    }
				
				   
	   
	   if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && isset($_REQUEST['id']))
	   {
	   $pid = mysql_real_escape_string($_REQUEST['id']);
	   $sql = "SELECT * FROM page where id='".$pid."'";
	   $res = mysql_query($sql);
	   if(mysql_num_rows($res)>0)
	   {
             $row = mysql_fetch_array($res);
	   ?>			   
      <form  action="cms.php" method="post">
     <table width="100%">
          <tr>
            <td  align="right">Page Name : </td>
            <td  align="left">
			<input type="hidden" value="<?php echo $row['id'];?>" name="pid" id="pid">
            <input type="text" name="title" id="title" value="<?php echo $row['title'];?>" class="input-medium" readonly="readonly"/></td>
            </tr>
			
			  <tr>
            <td  align="right">Title : </td>
            <td  align="left">
			
            <input type="text" name="page_title" id="page_title" value="<?php echo $row['page_title'];?>" class="input-medium"/></td>
            </tr>
			
			 <tr>
            <td  align="right">Meta Keywords: </td>
            <td  align="left">
            <input type="text" name="met_tags" id="met_tags" value="<?php echo $row['met_tags'];?>" class="input-medium" /></td>
            </tr>
			
			
		 <tr>
            <td  align="right">Meta Description : </td>
            <td  align="left">
            <input type="text" name="meta_description" id="meta_description" value="<?php echo $row['meta_description'];?>" class="input-medium" /></td>
            </tr>
			
			
        <tr>
            <td  align="right" style="vertical-align:top;">Page Description: </td>
			
			 <td align="left"><textarea name="description" rows="3"  id="description"  ><?php echo $row['description'];?></textarea>
					   <script type="text/javascript">
var editor = CKEDITOR.replace( 'description', {
    filebrowserBrowseUrl : 'js/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'js/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'js/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor,'js/' );
</script>
			</td>
			
          
          </tr>
		  
		  
		    
		  
		  
         <tr>
          <td></td>
            <td align="left"> 
			<input class="submit-green" type="submit" value="Edit"  name="Edit"/> 
                             
							   
							   <input type="button" class="submit-gray" value="Cancel" onclick="javascript:window.location='cms.php';" >
							   </td> </tr>
        </table>
          </form>
          <?php 
		  }else
		  {
		  ?>
		     <span class="notification n-error">Error: Something Goes Wrong !!</span>
		  <?php 
		    }
		  }else{ ?>
		  
		  
		     <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%">#</th>
                                    <th style="width:20%">Page</th>
									<th style="width:10%">Title</th>
                                     <th style="width:30%">Meta Tags</th>
									 <th style="width:30%">Meta Description</th>
                                     <th style="width:6%">&nbsp; &nbsp Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                       	   $sql = "SELECT * FROM page ";
	                          $res = mysql_query($sql);
	                            $i=1;
                               while($lin=mysql_fetch_array($res))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['title'];?></td>
									<td><?php echo $lin['page_title'];?></td>
                                    <td> <?php echo $lin['met_tags'];?></td>
									<td> <?php echo $lin['meta_description'];?></td>
                                                                                                             
                                    <td>                               
                                   &nbsp; &nbsp; &nbsp; <a href="cms.php?action=edit&id=<?php echo $lin['id']; ?>" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                                                             
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
		  
		  <?php include "include/pager.php";?>
		  
		  <?php } ?>
		  
                     </div> <!-- End .module-body -->
                </div>  <!-- End .module -->
        		
            </div> <!-- End .grid_12 -->
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
	     <?php include "include/footer.php";?>
	</body>
</html>