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
$id=$_POST['pid'];
$Pnam=$_POST['pname'];
$Ptec=$_POST['ptec'];
$Plev=$_POST['Plev'];
$res = $rec->upd_proj($id,$Pnam,$Ptec,$Plev); 
if($res)
{
 header("Location:manage_project.php?msg=UWR");
}
}
?>
<?php

if(isset($_REQUEST['dell']))
{

$pid=$_REQUEST['dell'];
$res=$rec->delproject($pid);
  if($res)
  header("Location:manage_project.php?msg=DBK");


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
          <div class="grid_12">
          <?php 
		  if(isset($_REQUEST['proid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Project Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_sub" action="" method="post">
                  
              <?php 
			  $record = $rec->getProjdet($_REQUEST['proid']);
			  $record=mysql_fetch_array($record);
			  
			   ?>                                
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Project ID : </td>
            <td width="553" align="left">
           <input type="text" name="pid" id="pid" class="input-medium" value="<?php echo $record['project_id'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Projecet Title : </td>
            <td align="left">
            <input type="text" name="pname" id="pname" class="input-medium" value="<?php echo $record['project_name'] ;?>" />
            </td>
          </tr>
          <tr>
            <td height="45" align="right">Technology : </td>
            <td align="left"><input type="text" name="ptec" id="ptec" class="input-medium"  value="<?php echo $record['tecnology'] ;?>"/>
            </td>
          </tr>
           <tr>
		  <td width="326" height="45" align="right">Level : </td>
            <td width="553" align="left">
            <select name="Plev" class="input-short" >
           <option value="<?php echo $record['level'] ;?>"><?php echo $record['level'] ;?></option> 
           <option value="BCA">BCA</option>
		   <option value="PGDCA">PGDCA</option>
           <option value="M.Sc">M.Sc</option>      
           </select>
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
                	<h2><span>|| Manage Projects ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="UWR")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Project edit successfully......!!</span></div>
                   <?php
                   }
				   ?> 
                        
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:5%">Project ID</th>
                                     <th style="width:20%">Project Title</th>
                                     <th style="width:10%">Technology</th>
                                     <th style="width:6%">Level</th>
                                    <th style="width:11%">&nbsp; &nbsp;Edit|Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getProjecet();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['project_id'];?></td>
                                    <td> <?php echo $lin['project_name'];?></td>
                                    <td> <?php echo $lin['tecnology'];?></td>
                                    <td> <?php echo $lin['level'];?></td>                                                                         
                                    <td>                               
                                   &nbsp; &nbsp; &nbsp; <a href="manage_project.php?proid=<?php echo $lin['project_id'];?>&msg=upd" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                           &nbsp; &nbsp; &nbsp; <a href="manage_project.php?dell=<?php echo $lin['project_id'];?>" onClick="return confirm('Are you sure you want to delete this Project ?')"  title="Delete" ><img src="images/trash.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="Delete" /></a>                                  
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                        </form>
                        <a href="add_project.php"><input type="image" src="images/ADDPROJECT.png" /></a>
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