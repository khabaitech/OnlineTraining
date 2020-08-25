<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) 
{
header('Location: login.php');
}
include "controller/createMem.php";
$obj= new Addmem();
?>
<?php 
if(isset($_POST['sub']))
{  
	$user=$_POST['uname'];
	$eid=$_POST['email'];
	$isexist=$obj->checkuser($user,$eid);
	if(in_array("unam",$isexist) or in_array("Eem",$isexist))
	{        $msg=array();  
	          if(in_array("unam",$isexist))
       			   $msg[]="user";
              if(in_array("Eem",$isexist))
			       $msg[]="Email";
    }
	else
	{
	    $pas=$_POST['pass'];
		$typ=$_POST['type'];
		echo $pas." ".$typ ;
		$chk=$obj->createuser($user,$pas,$eid,$typ);
	    if($chk)
		{
		  header('Location:add_user.php?msgnote=adduser');
		}
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
        <!-- Form elements -->    
      <div class="grid_12">
            
                <div class="module1">
                                    
                     <h2><font size="5"><span>|| Add User ||</span></font></h2>
                        
                     <div class="module-body">
                     <?php
                          if($_REQUEST['msgnote']=="adduser")
						 {
						 ?>
                           <div> <span class="notification n-success">New User Add Successfully.....!! </span></div>
                          <?php
						  }
						  ?>
           <form name="" action="" method="post">
          <table width="100%">
          <tr>
            <td width="297" height="45" align="right">User Type :</td>
            <td><select class="input-medium" name="type" id="type" />
            <option value="Administrative">Administrative</option>
            <option value="Staff">Staff</option>
            </select>
            </td>
            </tr>
            <tr>
            <td height="45"  align="right">Username :</td>
              <td width="582" align="left"><input type="text" name="uname" id="uname" class="input-medium" value=""/>
              <?php 
			  if(isset($msg) && in_array("user",$msg))
			  {
			  ?>
              <span class="notification-input ni-error" style="display: block;">Sorry,This user name is already register.Please change User name</span>
             <?php }?>
            </td>
            </tr>
             <tr>
            <td height="45"  align="right">Email ID :</td>
              <td width="582" align="left"><input type="text" name="email" id="email" class="input-medium" value=""/>
              <?php if(isset($msg) && in_array("Email",$msg))
					{
					?>
<span class="notification-input ni-error" style="display: block;">This Email Id is Already registred.Please change Email Id.</span>
                  <?php }?> 
              </td>
            </tr>
           <tr>
            <td height="45"  align="right">Password :</td>
            <td align="left"><input type="password" name="pass" id="pass" class="input-medium" /></td>
            </tr>
            <tr>
            <td height="45"  align="right">Confirm Password :</td>
            <td align="left"><input type="password" name="pass" id="pass" class="input-medium" /></td>
            </tr>
            <tr>
          <td></td>
              <td align="left" height="45"> 
             <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
             <input class="submit-gray" type="reset" value="Reset" />
            </tr>
           </table>
            </form>
            </div> <!-- End .module-body -->
                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
           <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
       <?php include "include/footer.php";?>
	</body>
</html>