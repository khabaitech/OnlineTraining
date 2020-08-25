 <?php 
 
 include "suryalib/admin/model/config.php" ;
 $basePth = basename($_SERVER['PHP_SELF']);
 if($basePth=="index.php")
 {
   $id = 1;
 }else
 if($basePth=="courses.php")
 {
   $id=2;
 }else
 if($basePth=="rulesregulation.php")
 {
   $id=3;
 }else
 if($basePth=="about_us.php")
 {
   $id=4;
 }else
 if($basePth=="contacts.php")
 {
 $id=5;
 
 }
 $sql="select * from page where id = '".$id."'";
 $res = mysql_query($sql);

 $row = mysql_fetch_array($res);
 echo '<title>'.$row['page_title'].'</title>';


echo '<meta name="keywords" content="'.$row['met_tags'].'" />';
echo '<meta name="description" content="'.$row['meta_description'].'" />';
 ?>