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
<?php include "controller/createMem.php";
$std = new Addmem();
 ?>
<?php
if(isset($_REQUEST['activate']))
{
$u=$_REQUEST['activate'];
$res=$std->activate($u);

}
?> 

<?php
if(isset($_REQUEST['deactivate']))
{
$u=$_REQUEST['deactivate'];
$res=$std->deactivate($u);
}
?> 
<?php
if(isset($_POST['updat']))
{
$nam=$_POST['stdname'];
$pas=mysql_real_escape_string(md5($_POST['scpass']));
$utyp=$_POST['type'];
$res=$std->updpass($nam,$pas,$utyp);
if($res)
{
 header("Location:manage_stafuser.php?msg=succ");
}
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
		  if(isset($_REQUEST['uname'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit User ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
      <form name="add_wri" action="" method="post">
                                             
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Username : </td>
            <td width="553" align="left">
           <input type="text" name="stdname" id="stdname" class="input-medium" value="<?php echo $_REQUEST['uname'] ;?>" readonly="readonly" /></td>
            </tr>
          
           <tr>
            <td width="326" height="45" align="right">Type : </td>
            <td width="553" align="left">
           <select name="type" id="type" class="input-medium" >
           <option value="<?php echo $_REQUEST['ty'] ;?>"><?php echo $_REQUEST['ty'] ;?> </option>
           <option value="Administrative">Administrative </option>
           <option value="Staff">Staff </option>
           </select>
            </td>
            </tr>
          
          <tr>
            <td height="45" align="right">New Password : </td>
            <td align="left">
            <input type="password" name="spass" id="spass" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
          <tr>
            <td height="45" align="right">Confirm Password : </td>
            <td align="left">
            <input type="password" name="scpass" id="scpass" class="input-medium" />
              <label id="user"></label>
            </td>
          </tr>
         <tr>
          <td></td>
            <td align="left"> &nbsp; &nbsp;<input class="submit-green" type="submit" value="Update"  name="updat"/> 
                                <input class="submit-gray" type="reset" value="Reset" /></td> </tr>
        </table>
       
                                               
                            
                       </form>
                        
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
                
          <?php 
		  }
		  ?>  <!--else -->      <div class="module">
                	<h2><span>|| Manage User ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="succ")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">User Edit Successfully.......!!</span></div>
                   <?php
                   }
				   ?> 
                        
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    
                                     <th style="width:10%">Username</th>
                                     <th style="width:15%">Email</th>
                                     <th style="width:10%">Type</th>
                                     <th style="width:15%">&nbsp;&nbsp;&nbsp;Status|Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$std->getuserdetail();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
								    if($lin['username']==$_SESSION['username'])
									 continue;
								   
                                  ?>
                                    
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['username'];?></td>
                                    <td><?php echo $lin['email'];?></td>
                                    <td> <?php echo $lin['type'];?></td>
                                                                      
                                    <td>
                                    	                                       
										<?php if($lin['Enable']==1) 
			                            { ?>
                                        <a href="manage_stafuser.php?msg=deact&deactivate=<?php echo $lin['username']; ?>" onClick="return confirm('Are you sure you want to Make In-Active this user ?')" title="Active/Deactive"><img src="images/tick-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a>
                                        <?php } else { ?>
<a href="manage_stafuser.php?msg=act&activate=<?php echo $lin['username']; ?>"  onClick="return confirm('Are you sure you want to Make Active?')" title="Active/Deactive"><img src="images/minus-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/minus-circle.gif" width="16" height="16" alt="not published" /></a>
<?php } ?>
                                     &nbsp; &nbsp; &nbsp; &nbsp; <a href="manage_stafuser.php?uname=<?php echo $lin['username']; ?>&msg=upd&ty=<?php echo $lin['type'] ;?>" title="Edit"><img src="images/user_edit.png" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>                                      
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