<?php
ob_start();
if (isset($_SESSION['username'])) 
{
header('Location: index.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
       
        <!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="css/reset.css" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="css/grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css" media="screen" />
		 <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        
          <link rel="stylesheet" type="text/css" href="css/log.css"/>
                  
<style type="text/css">

.style1 {
	font-size: 36px
}

        </style>
</head>
<body>
    <?php include "include/login_header.php";?>
    
     <div class="content">
				<div id="form_wrapper" class="form_wrapper">
		     <form class="login active" action="act_login.php" method="post">
						<h3>Admin Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" name="username" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>Password: <a href="forgot.php" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password"  name="password"/>
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							                     
                             <?php
							 if(isset($_REQUEST['logn']))	
						      {
							    $logn=$_REQUEST['logn'];
							 }else
							 {
							 $logn='';
							 }
					         if($logn=="Incr")	
						      {				 
					         ?>
                               <br/>
                          <center> <font color="#FFCC00" face="Times New Roman, Times, serif" size="2" ><img src="images/cross-on-white.gif"  />&nbsp;Incorrect Username or Password....!!</font></center>
                               <?php
					        }
					       ?>
							<input type="submit" name="log" id="log" value="Login"></input>
                            <a href="../../index.php" rel="forgot_password" class="forgot linkform">Click here to go website</a>
							<div class="clear"></div>
                             
						</div>
					</form>
					
				</div>
				<div class="clear"></div>
			</div>
            </div>
            
           
       <?php include "include/footer.php";?>
</body>
</html>