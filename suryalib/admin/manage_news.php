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
$bd=explode('-',$_POST['bpd']);
$dat=$bd[2]."-".$bd[1]."-".$bd[0];
$id=$_POST['nid'];
$des=$_POST['desc'];
$res=$rec->updNews($id,$dat,$des);
if($res)
{
 header("Location:manage_news.php?msg=UBK");
}
}
?>

<?php

if(isset($_REQUEST['dell']))
{

$bi=$_REQUEST['dell'];
$res=$rec->delNews($bi);
  if($res)
  header("Location:manage_news.php?msg=DBK");


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
                     <h2><font size="5"><span>|| Edit News Information ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
         <form name="edit_book" action="" method="post">
                   <?php
                   
				   $Nrec=$rec->getNewsrecord($_REQUEST['bkid']);
				   $Nrec=mysql_fetch_array($Nrec);
				   ?>               
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">News ID : </td>
            <td width="553" align="left">
           <input type="text" name="nid" id="nid" class="input-medium" value="<?php echo $Nrec['id'] ; ?>" readonly="readonly" /></td>
            </tr>
            <tr>
            <td height="45" align="right">Date :</td>
            <?php  $dat=explode('-',$Nrec['date']);
				  $pdat=$dat[2]."-".$dat[1]."-".$dat[0];
			?>
            <td align="left"><input type="text" size="12" id="inputField" name="bpd" class="input-short" readonly="readonly" value="<?php echo $pdat ;?>"/>&nbsp;
          &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
            </td>
        </tr>
        
        <tr>
            <td> </td>
            <td><div style="margin-left:24%;font-weight:bold;">Description</div> <textarea id="wysiwyg" rows="11" cols="70" name="desc"><?php echo $Nrec['description']; ?></textarea> </td>
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
                	<h2><span>|| Manage News ||</span></h2>
                    
                    <div class="module-table-body">
                   
                    	<form action="">
                         <?php 
				   if($_REQUEST['msg']=="UBK")
				   {
				   ?>
                   <br/>
                  <div><span class="notification n-success">News Information Edit Successfully.......!!</span></div>
                   <?php
                   }
				   if($_REQUEST['msg']=="DBK")
				   {
				   
				   ?> 
                   <br/>
                  <div> <span class="notification n-success">Delete  News Successfully.......!!</span></div>
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
                                    <th style="width:3%">#</th>
                                    <th style="width:4%">News ID</th>
                                    <th style="width:5%">Date</th>
                                    <th style="width:25%">Description</th>
                                    <th style="width:11%">Edit|Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
	                          $row=$rec->getNews();
	                              $i=1;
                               while($lin=mysql_fetch_array($row))
                                {
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['id'];?></td>
                                    <td><?php
									  $dat=explode('-',$lin['date']);
									 $pdat=$dat[2]."-".$dat[1]."-".$dat[0];
									   echo $pdat;?></td>
                                    <td><?php echo $lin['description'];?></td>                     
                                    <td>
                                                                          
                                   &nbsp; <a href="manage_news.php?bkid=<?php echo $lin['id']; ?>&msg=upd" title="Edit"><img src="images/user_edit.png"  width="16" height="16" alt="edit" /></a>
                                       
                                       &nbsp; &nbsp; &nbsp; <a href="manage_news.php?dell=<?php echo $lin['id'];?>" onClick="return confirm('Are you sure you want to delete this News ?')"  title="Delete" ><img src="images/trash.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
                           <?php
                              $i++;
							   }
                            ?>     
                        </tbody>
                        </table>
                        </form>
                        <a href="latestnews.php"> <input type="image" src="images/addnews.png" /></a>
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