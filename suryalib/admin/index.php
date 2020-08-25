<?php
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
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
        <?php include "include/operation_icons.php";?>
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
   <?php include "include/footer.php";?>
	</body>
</html>