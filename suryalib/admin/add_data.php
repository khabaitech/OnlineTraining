<?php ob_start();
session_start();
if (!isset($_SESSION['username'])) {
header("location:login.php");
}
?>
<?php 
$book_id = mktime();
$file_name = $book_id;
require ('model/config.php');
require('upload_file.php');
upload_file('../books', $file_name);
$exten = $_SESSION['exten'];
$title2=strtolower( $_POST['title']);
$title=ucwords( $title2);
$subject = $_POST['subj'];
$sqlb="insert into enotes (`eid`,`title`,`subid`,`soft_copy`) values('$book_id','$title','$subject', '$file_name.$exten')" or die(mysql_error());
$result= mysql_query($sqlb) or die(mysql_error());
if($result)
{
header('location:uploadnote.php?msg=E-notes add successfully');
}
?>
<?php ob_flush();?>