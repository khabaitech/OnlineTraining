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
$nam=$_POST['btit'];
$pub=$_POST['bpubli'];
$rno=$_POST['rack'];
$bd=explode('-',$_POST['bpd']);
$dat=$bd[2]."-".$bd[1]."-".$bd[0];
$rem=$_POST['brem'];
$pr=$_POST['bpr'];
$btn=$_POST['bt'];
$bpn=$_POST['bp'];
$res=$rec->updbook($nam,$pub,$rno,$dat,$rem,$pr,$btn,$bpn);
if($res)
{
 header("Location:manage_book.php?msg=UBK");
}
}
?>

<?php

if(isset($_REQUEST['dell']))
{

$bi=$_REQUEST['dell'];
$res=$rec->delbook($bi);
  if($res)
  header("Location:manage_book.php?msg=DBK");


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
		  if(isset($_REQUEST['bkid'])&& $_REQUEST['msg']=="upd")
		  {
		  ?>
                <div class="module1">
                     <h2><font size="5"><span>|| Edit Book Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_book" action="" method="post">
                  <?php
				   $Brec=$rec->getBOOK($_REQUEST['bkid']);
				   $Brec=mysql_fetch_array($Brec);
				  
                   ?>
                   <input type="hidden" name="bt" value="<?php echo $Brec['B_Title'] ;?>" />    
                    <input type="hidden" name="bp" value="<?php echo $Brec['B_Pub'] ;?>" />                           
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Book ID : </td>
            <td width="553" align="left">
           <input type="text" name="bid" id="bid" class="input-medium" value="<?php echo $Brec['Bid'] ;?>" readonly="readonly" /></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Book Title : </td>
            <td align="left">
            <input type="text" name="btit" id="btit" class="input-medium" value="<?php echo $Brec['B_Title'] ;?>" />
              
            </td>
          </tr>
          <tr>
            <td height="45" align="right">Publication : </td>
            <td align="left">
            <input type="text" name="bpubli" id="bpubli" class="input-medium"  value="<?php echo $Brec['B_Pub'] ;?>" />
            </td>
            </tr>
            <tr>
            <td height="45" align="right">Rack No. : </td>
            <td align="left">
            <select class="input-short" name="rack">
            <option><?php echo $Brec['B_Rack_No'] ;?></option>
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
            <td height="45" align="right">Price : </td>
            <td align="left">
            <input type="text" name="bpr" id="bpr" class="input-short"  value="<?php echo $Brec['B_Price'] ;?>" />
            </td>
            </tr>
            
            <tr>
            <td height="45" align="right">Purchase Date :</td>
            <?php  $dat=explode('-',$Brec['B_PurDate']);
				  $pdat=$dat[2]."-".$dat[1]."-".$dat[0];
			?>
            <td align="left"><input type="text" size="12" id="inputField" name="bpd" class="input-short" readonly="readonly" value="<?php echo $pdat ;?>"/>&nbsp;
          &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
            </td>
        </tr>
        
        <tr valign="middle">
            <td height="45" align="right">Remark :</td>
            <td align="left">  <textarea rows="5" cols="90" name="brem" class="input-medium"><?php	echo $Brec['B_Remark']  ?> </textarea></td>
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
                	<h2><span>|| Manage Book ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="UBK")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">Book Information Edit Successfully.......!!</span></div>
                   <?php
                   }
				   if($_REQUEST['msg']=="DBK")
				   {
				   
				   ?> 
                   <br/>
                  <div> <span class="notification n-success">Delete Book Successfully.......!!</span></div>
                   <?php
                   }/*
				   if($mark="Derror")
				   {
				   ?> 
                   <br/>
                  <span class="notification n-attention">Please Mark Records.</span>
                  <?php
                  }
				  */?>
                       
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:9%">B_ID</th>
                                    <th style="width:15%">B_Title</th>
                                     <th style="width:11%">B_Publication</th>
                                     <th style="width:7%">B_Rack</th>
                                     <th style="width:7%">B_Price</th>
                                     <th style="width:15%">B_Remark</th>
                                     <th style="width:15%">B_Purchase_Date</th>
                                     
                                    <th style="width:11%">&nbsp; &nbsp;Edit|Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getBrec();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['Bid'];?></td>
                                    <td> <?php echo $lin['B_Title'];?></td>
                                    <td><?php echo $lin['B_Pub'];?></td>
                                     <td><?php echo $lin['B_Rack_No'];?></td>
                                      <td><?php echo $lin['B_Price'];?></td>
                                      <td><?php echo $lin['B_Remark'];?></td>
                                     <td><?php
									  $dat=explode('-',$lin['B_PurDate']);
									 $pdat=$dat[2]."-".$dat[1]."-".$dat[0];
									   echo $pdat;?></td>
                                     <td> &nbsp; <a href="manage_book.php?bkid=<?php echo $lin['Bid']; ?>&msg=upd" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                    &nbsp; &nbsp; &nbsp; <a href="manage_book.php?dell=<?php echo $lin['Bid'];?>" onClick="return confirm('Are you sure you want to delete this Book ?')"  title="Delete" ><img src="images/trash.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                                        
                       
                        </form>
                         <a href="add_book.php?msg=primary"> <input type="image" src="images/addBook.png" /> </a>
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