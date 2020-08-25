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
$nam=$_POST['nid'];
$rno=$_POST['rack'];
$bd=explode('-',$_POST['notd']);
$dat=$bd[2]."-".$bd[1]."-".$bd[0];
$rem=$_POST['nrem'];

$res=$rec->updnote($nam,$rno,$dat,$rem);
if($res)
{
 header("Location:manage_notes.php?msg=UBK");
}
}
?>

<?php

if(isset($_REQUEST['dell']))
{

$ni=$_REQUEST['dell'];
$res=$rec->delnote($ni);
  if($res)
  header("Location:manage_notes.php?msg=DBK");


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
		  if(isset($_REQUEST['notid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Note Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_note" action="" method="post">
                  <?php
				   $Nrec=$rec->getNOTE($_REQUEST['notid']);
				   $Nrec=mysql_fetch_array($Nrec);
				  
                   ?>
                                             
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Note ID : </td>
            <td width="553" align="left">
           <input type="text" name="nid" id="nid" class="input-medium" value="<?php echo $Nrec['Note_id'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Subject : </td>
            <td align="left">
            <input type="text" name="nsub" id="nsub" class="input-medium" value="<?php echo $Nrec['Subject_name'] ;?>" readonly="readonly" />
              
            </td>
          </tr>
                <tr>
            <td height="45" align="right">Rack No. : </td>
            <td align="left">
            <select class="input-short" name="rack">
            <option><?php echo $Nrec['Rack_no'] ;?></option>
			<?php
			 $recR=$rec->get_rec("rack");
             while($lin=mysql_fetch_array($recR))
              {
            ?>
             <option value="<?php echo $lin['id']?>"><?php echo $lin['id']?></option>
             
             <?php }?>
                                    
             </select>
            </td>
            </tr>
            
            <tr>
            <td height="45" align="right">Language : </td>
            <td align="left">
            <input type="text" name="lan" id="lan" class="input-short"  value="<?php echo $Nrec['type'] ;?>" readonly="readonly" />
            </td>
            </tr>
            
            <tr>
            <td height="45" align="right">Date :</td>
            <?php  $dat=explode('-',$Nrec['Date']);
				  $pdat=$dat[2]."-".$dat[1]."-".$dat[0];
			?>
            <td align="left"><input type="text" size="12" id="inputField" name="notd" class="input-short" readonly="readonly" value="<?php echo $pdat ;?>"/>&nbsp;
          &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
            </td>
        </tr>
        
        <tr valign="middle">
            <td height="45" align="right">Remark :</td>
            <td align="left">  <textarea rows="5" cols="90" name="nrem" class="input-medium"><?php	echo $Nrec['Remark']  ?> </textarea></td>
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
                	<h2><span>|| Manage Notes ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="UBK")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Note Information Edit Successfully.......!!</span></div>
                   <?php
                   }
				   if($_REQUEST['msg']=="DBK")
				   {
				   
				   ?> 
                   <br/>
                  <div> <span class="notification n-success">Delete Note Successfully.......!!</span></div>
                   <?php
                   }
				  
				  ?>
                       
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:9%">N_ID</th>
                                    <th style="width:13%">Subject Name</th>
                                     <th style="width:16%">Remark</th>
                                     <th style="width:7%">Rack No.</th>
                                     <th style="width:7%">Language</th>
                                     <th style="width:7%">Date</th>
                                     
                                     
                                    <th style="width:11%">&nbsp; &nbsp;Edit|Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getNrec();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['Note_id'];?></td>
                                    <td> <?php echo $lin['Subject_name'];?></td>
                                    <td><?php echo $lin['Remark'];?></td>
                                     <td><?php echo $lin['B_Rack_no'];?></td>
                                      <td><?php echo $lin['type'];?></td>
                                      
                                     <td><?php
									  $dat=explode('-',$lin['Date']);
									 $pdat=$dat[2]."-".$dat[1]."-".$dat[0];
									   echo $pdat;?></td>
                                       
                                   
                                    <td>
                                     &nbsp; <a href="manage_notes.php?notid=<?php echo $lin['Note_id']; ?>&msg=upd" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                       
                                       &nbsp; &nbsp; &nbsp; <a href="manage_notes.php?dell=<?php echo $lin['Note_id'];?>" onClick="return confirm('Are you sure you want to delete this Book ?')"  title="Delete" ><img src="images/trash.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                       </form>
                       <a href="add_notes.php"><input type="image" src="images/addnotes.png" /></a>
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