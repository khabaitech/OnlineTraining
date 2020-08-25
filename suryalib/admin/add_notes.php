<?php
session_start();
if (!isset($_SESSION['username']))
 {
header('Location: login.php');
}
include "controller/lib_manage.php";
$obj=new librarian();
?>
<?php  
if(isset($_POST['sub']))
{
$Nsub=$_POST['nsub'];
$id= $_POST['nid'];
$nq=$_POST['Nqun'];
$dat=explode('-',$_POST['nd']);
$d=$dat[2]."-".$dat[1]."-".$dat[0];
$rn=$_POST['rno'];
$lan=$_POST['NLan'];
$rem=$_POST['Nrem'];
$chkid=$obj->Already_note($Nsub); 
		if($chkid)
		{
		 $j = (integer) substr($chkid,2,4);
		  $j++;
		}
		else
		  $j=1;
		  $z=1;
 		
		while($z<=$nq)
		{ 
		   if($j<=9)
		   $k=$id."000".$j;
		   else if($j>=10 && $j<=99)
		   $k=$id."00".$j;
		   else  if($j>=100 && $j>=999)		   
		   $k=$id."o".$j;
		   else
		   $k=$id.$j;
		   $res=$obj->addnotes($k,$Nsub,$d,$rn,$lan,$rem);
		   $j++;
		   $z++;
		}  
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
        <?php include "javascript/javascr.php" ; ?> 

  <script>
function showUser(str)
{
if (str=="")
  {
 
  document.getElementById("tnt").innerHTML="Please select subject name";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tnt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","notetab.php?q="+str,true);
xmlhttp.send();
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
                     <h2><font size="5"><span>|| Add New Notes ||</span></font></h2>
                     <div class="module-body"><!--put tab here -->
                 <?php 
				   if($res)
				   {
				   ?>
                   <span class="notification n-success">Add new <?php echo $nq; ?> Notes Successfully.......!!</span>
                   <?php
                   }
				   ?>  
<form method="post">
<table width="100%">
          <tr>
            <td width="326" height="45" align="right">Subject Name : </td>
            <td width="553" align="left"><select name="subject" onChange="showUser(this.value)" class="subject input-medium" >
         <option value="">Select subject:</option>
                    <?php  $row=$obj->getSrec();
	                       while($lin=mysql_fetch_array($row))
                             {
                               ?>
                         <option value="<?php echo $lin['id'] ;?>"><?php echo $lin['subject_name'] ;?> </option>
                      <?php }  ?>
</select>
             </td>
            </tr>
         </table>
         <div id="tnt" style="text-align:center"> </div>      
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