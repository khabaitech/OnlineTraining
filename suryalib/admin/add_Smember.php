<?php

// Inialize session
ob_start();
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: login.php');
}
include "controller/createMem.php";
$obj= new Addmem();
?>

<?php
if(isset($_POST['cbut']))
{
  $c=$_POST['coursename'];
  
  header("Location:add_Smember.php?msg=ready&cour=$c");
  
}
?>

<?php 
if(isset($_POST['sub']))
{
	$ac=$_POST['acn'];
	$ai=$_POST['aid'];
	$sn=$_POST['stname'];
	$ad=explode('-',$_POST['ACreD']);
	$dat=$ad[2]."-".$ad[1]."-".$ad[0];
	$res=$obj->addstdmem($ac,$ai,$sn,$dat);
	if($res)
	{
	 header("Location:add_Smember.php?msg=course&chk=succ");
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
       <?php include "javascript/javascr.php" ;?>
<script>
 function setactivationid(x)
 {
            if(document.getElementById(x).checked)
			{
                document.getElementById('aid').value=document.getElementById(x).value;
				return true;
            }
			else
			return false;
            
}   
</script>        
</head>
	<body>
    <?php include "include/headder_with_menu.php";?>
   <div class="container_12">
        <br/>
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                <?php 
				if($_REQUEST['msg']=="course")
				{
				?>
                  <h2><font size="5"><span>|| Add New Student Member ||</span></font></h2>
                   <div class="module-body"><!--put tab here -->
                    <center> <h3><font color="#0099FF">Select Course Name</font></h3></center>
                     <?php 
				      if($_REQUEST['chk']=="succ")
						 {
						 ?>
                           <div> <span class="notification n-success">Add New Member Successfully.............!!</span></div>
                          <?php
						  }
						  ?>
                      <form id="form1" method="post" action="">
                        <table width="100%" >
                          <tr >
                          <td width="40%">&nbsp;</td>
                            <td width="3%">
                            <input type="radio" name="coursename" value="BCA" id="coursename_0" checked="checked"/></td><td width="57%">
                              BCA</td>
                          </tr>
                          <tr>
                          <td>&nbsp;</td>
                            <td>
                              <input type="radio" name="coursename" value="DCA" id="coursename_1"/></td><td>
                              DCA</td>
                          </tr>
                          <tr>
                          <td>&nbsp;</td>
                            <td>
                              <input type="radio" name="coursename" value="PGDCA" id="coursename_2" /></td><td>
                              PGDCA</td>
                          </tr>
                          <tr>
                          <td>&nbsp;</td>
                            <td>
                              <input type="radio" name="coursename" value="M.Sc" id="coursename_3" /></td><td>
                              M.Sc</td>
                          </tr>
                          
                           <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td> <br/><input class="submit-green" type="submit" value="Submit"  id="cbut" name="cbut"/></td>    
                          </tr>
                        </table>
                      </form>
                    <?php }
						if($_REQUEST['msg']=="ready")
						{
						?>
                     <h2><font size="5"><span>|| Add New Student Member ||</span></font></h2>
                     <div class="module-body">
                     <form name="" action="" method="post">
          <table width="100%">
          <tr>
          <?php
          $accid=$obj->getaccID($_REQUEST['cour']);
		  ?>
            <td width="326" height="45" align="right">Account No :</td>
            <td width="553" align="left"><input type="text" name="acn" id="acn" class="input-medium"
            value="<?php echo $accid ?>" readonly="readonly"/></td>
            </tr>
              <tr>
            <td height="45" align="right">Activation ID :</td>
            <td align="left"><input type="text" name="aid" id="aid" class="input-medium" readonly="readonly" />
            <br/>
            <font size="1" color="#FF0000">Select Activation ID</font>
           <?php
			 $raid = $obj->getrandom();
			 $index=1;
			 foreach($raid as $p)
			 {
			 ?>
             <br/>
             <input name="chkid" type="radio" value="<?php echo $p ;?> " id="<?php echo "chkid".$index ?>" onclick="setactivationid(id)" /> <?php echo $p ;?>
            <?php 
			$index++;
			}?>
            </td>
         </tr>
            <tr>
            <td height="45"  align="right">Student Name :</td>
            <td align="left"><input type="text" name="stname" id="stname" class="input-medium" /></td>
            </tr>
               <tr>
            <td height="45" align="right">Date :</td>
            <td align="left">
       <input type="text" size="12"  name="ACreD" id="ACreD" class="input-short" value="<?php echo date("d-m-Y"); ?>"  readonly="readonly"/> &nbsp; &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
            </td>
        </tr>
           <tr>
          <td></td>
            <td align="left" height="45"> 
             <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
             <input class="submit-gray" type="reset" value="Reset" /><br/><br/>
             <a href="add_Smember.php?msg=course">BacK to the course information</a>
            </tr>
             </table>
            </form>
      <?php 
	  }
	  ?>      
         </div> <!-- End .module-body -->
               </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
           <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
  <?php include "include/footer.php";?>
	</body>
</html>