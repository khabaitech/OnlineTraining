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
?>

<?php
if(isset($_POST['subinfo']))
{
$c=$_POST['rack'];
$a=strlen($_POST['subj']);
       if($a==1)
       $i="0".$_POST['subj'];
       if($a==2)
       $i=$_POST['subj'];
$b=strlen($_POST['writ']);
       if($b==1)
       $i=$i."00".$_POST['writ'];
       if($b==2)
       $i=$i."0".$_POST['writ'];
	   if($b==3)
       $i=$i.$_POST['writ'];

header("Location:add_book.php?msg=ready&bid=$i&rac=$c");
}

?>

<?php
if(isset($_POST['sub']))
{
$br= $_REQUEST['rac'];
$bi=$_POST['bid'];
$bs=(integer) substr($bi,0,2);
$ba=(integer)substr($bi,2,3);
$bt=$_POST['btit'];
$bq=$_POST['bqun'];
$bpr=$_POST['bpri'];
$bp=$_POST['bpub'];
$bre=$_POST['brem'];
$bd=explode('-',$_POST['bpd']);
$dat=$bd[2]."-".$bd[1]."-".$bd[0];
$ins=new librarian();
$chkid=$ins->Already_bookid($ba,$bs);
		if($chkid)
		{
		$j=(integer) substr($chkid,5,2);
		$j=$j+1;
		}
		else
		$j=1;
		$z=1;
		while($z<=$bq)
		{ 
		   if($j<=9)
		   $k=$bi."0".$j;
		   else
		   $k=$bi.$j;
		   $res=$ins->addbook($k,$bt,$bp,$ba,$dat,$bpr,$bre,$br,$bs);
		   $j++;
		   $z++;
		}
		if($res)
		header("Location:add_book.php?msg=primary&chk=succ&qun=$bq");

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
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                <?php 
				if($_REQUEST['msg']=="primary" )
				{
				?>
                
                     <h2><font size="5"><span>|| Select Primary Information Of Book ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     <form name="" action="" method="post">
                     <?php 
			            $rec=new librarian();
			            $recS=$rec->get_rec("subject");
						
			             if($recS=="Notavailable")
						 {
			            ?>
                         <div> <span class="notification n-error">Please Add The Subject Before Adding Book.......!!</span></div>
                        
                        <?php
                        }
						 $recW=$rec->get_rec("writer");
						
			             if($recW=="Notavailable")
						 {
						 ?>
					<div> <span class="notification n-error">Please Add The Writer Name Before Adding Book.......!!</span></div>
	                    <?php 
						}
						$recR=$rec->get_rec("rack");
						 
			             if($recR=="Notavailable")
						 {
						
						?>
                         <div> <span class="notification n-error">Please Add The Rack Before Adding Book..........!!</span></div>
                        <?php
						}
						if($recS!="Notavailable" && $recR!="Notavailable" && $recW!="Notavailable" )
						{
						?>
                        
                        <?php 
						if($_REQUEST['chk']=="succ")
						{
						?>
                         <div> <span class="notification n-success"><?php echo $_REQUEST['qun']; ?> Book Add Successfully.....</span></div>
                        <?php
						}
                        ?>
                        
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Subject :</td>
            <td width="553" align="left">
            
            <select class="input-medium" name="subj">
            <option>Select Subject Name</option>
			<?php
             while($lin=mysql_fetch_array($recS))
              {
            ?>
             <option value="<?php echo $lin['id']?>"><?php echo $lin['subject_name']?></option>
             <?php }?>
                                    
             </select></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Writer Name :</td>
            <td align="left"><select class="input-medium" name="writ">
            <option>Select Writer Name</option>
			<?php
             while($lin=mysql_fetch_array($recW))
              {
            ?>
             <option value="<?php echo $lin['id']?>"><?php echo $lin['writer_name']?></option>
             <?php }?>
                                    
             </select></td>
              <label id="user"></label>
             </td>
         </tr>
          
          <tr>
            <td height="45" align="right">Rack No. :</td>
            <td align="left"><select class="input-short" name="rack">
            <option>Select Rack Number</option>
			<?php
             while($lin=mysql_fetch_array($recR))
              {
            ?>
             <option value="<?php echo $lin['id']?>"><?php echo $lin['id']?></option>
             <?php }?>
                                    
             </select></td></td>
                           </tr>
                           <tr>
          <td></td>
          
            <td align="left"> 
            &nbsp;&nbsp;
            <input class="submit-green" type="submit" value="Submit"  name="subinfo"/> 
                                
            </tr>
          </table>
                  <?PHP 
				  }
				  ?>
             
                       </form>
                    
                     <?php }
						if($_REQUEST['msg']=="ready")
						{
						?>
                     <h2><font size="5"><span>|| Add New Book ||</span></font></h2>
                        
                     <div class="module-body">
                     
                      <form name="" action="" method="post">
                        <?php 
						if(isset($chk) && $chk=="err")
						{
						?>
                         <div> <span class="notification n-error"></span></div>
                        <?php
						}
						 if(isset($chk) && $chk=="cong")
						 {
						 ?>
                           <div> <span class="notification n-success">Book Add Successfully.............!!</span></div>
                          <?php
						  }
						  ?>
          <table width="100%">
          <tr>
            <td width="326" height="45" align="right">Book ID :</td>
            <td width="553" align="left"><input type="text" name="bid" id="bid" class="input-medium"
            value="<?php echo $_REQUEST['bid'];?>" readonly="readonly"/><label id="uid"></label></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Book Title :</td>
            <td align="left"><input type="text" name="btit" id="btit" class="input-medium" />
              <label id="user"></label>
             </td>
         </tr>
            <tr>
            <td height="45"  align="right">Publiction :</td>
            <td align="left"><input type="text" name="bpub" id="bpub" class="input-medium" /><label id="con_pass"></label></td>
            </tr>
          
          <tr>
            <td height="45" align="right">Book Quantity :</td>
            <td align="left"><input type="text"  name="bqun" id = "bqun" maxlength="2" class="input-short" /></td>
        </tr>
        <tr>
            <td height="45" align="right">Price :</td>
            <td align="left"><input type="text"  name="bpri" id = "bpri" class="input-short" /></td>
        </tr>
        <tr>
		
            <td height="45" align="right">Purchase Date :</td>
            <td align="left"><input type="text" size="12" id="inputField" name="bpd" class="input-short"/>&nbsp;
          &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
            </td>
			<script>
		callcalendar();
		</script>
        </tr>
        
        
         <tr valign="middle">
            <td height="45" align="right">Remark :</td>
            <td align="left">  <textarea rows="5" cols="90" name="brem" class="input-medium"></textarea></td>
        </tr>       
          
          <tr>
          <td></td>
          
            <td align="left" height="45"> 
             <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
             <input class="submit-gray" type="reset" value="Reset" /><br/><br/>
             <a href="add_book.php?msg=primary">BacK to the Primary Information</a>
            </tr>
            
        </table>
            </form>
                       <?php }?>
                        
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
           <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
       <?php include "include/footer.php";?>
	</body>
</html>