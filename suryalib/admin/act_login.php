<?php

// Inialize session
session_start();
// Include database connection settings
include('model/config.php');

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM user WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1)
{
  $login=mysql_fetch_array($login);
   if($login['type']=="Administrative")
   {
     // Set username session variable
      $_SESSION['username'] = $_POST['username'];
    // Jump to secured page
       header('Location: index.php');
    }
	else 
    header('Location: login.php?logn=Incr');

}
else 
{
// Jump to login page
header('Location: login.php?logn=Incr');
}

?>
