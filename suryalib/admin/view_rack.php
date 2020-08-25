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
$nam=$_POST['rid'];
$rname=$_POST['rakn'];
$res=$rec->updrack($nam,$rname);
if($res)
{
 header("Location:view_rack.php?msg=URK");
}
}
?>

<?php
if(isset($_REQUEST['dell']))
{

$rid=mysql_real_escape_string($_REQUEST['dell']);
$res=$rec->delrac($rid);

if($res)
{
 header("Location:view_rack.php?msg=rackdell");

}
}
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
          <div class="grid_12">
          <?php 
		  if(isset($_REQUEST['rakid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Book Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_sub" action="" method="post">
                  
                                              
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Rack ID : </td>
            <td width="553" align="left">
           <input type="text" name="rid" id="rid" class="input-medium" value="<?php echo $_REQUEST['rakid'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Rack Location : </td>
            <td align="left">
            <input type="text" name="rakn" id="rakn" class="input-medium" value="<?php echo $_REQUEST['sn'] ;?>" />
              
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
                	<h2><span>|| Mange Rack ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="URK")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Rack Location Edit Successfully.......!!</span></div>
                   <?php
                   }
				 if($_REQUEST['msg']=="rackdell")
				   {
				   
				   ?> 
                   <br/>
                  <div> <span class="notification n-success">Rack Delete Successfully.......!!</span></div>
                   <?php
                   }
				   ?>
                        
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%"># &nbsp; &nbsp; S.No.</th>
                                    <th style="width:5%">Rack ID</th>
                                     <th style="width:20%">Rack Location</th>
                                     <th style="width:6%">&nbsp; &nbsp Edit &nbsp; &nbsp Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getRrec();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['id'];?></td>
                                    <td> <?php echo $lin['Rack_location'];?></td>
                                                                                                             
                                    <td>                               
                                   &nbsp; &nbsp; &nbsp; <a href="view_rack.php?rakid=<?php echo $lin['id']; ?>&msg=upd&sn=<?php echo $lin['Rack_location']; ?>" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="view_rack.php?dell=<?php echo $lin['id'];?>" onClick="return confirm('Are you sure you want to delete this rack ?')"  title="Delete" ><img src="images/trash.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                                                             
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                        </form>
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