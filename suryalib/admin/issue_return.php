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
<?php include "controller/std_manage.php";
$rec = new stdmanage;
 ?>
<?php
if(isset($_POST['issue_btn']))
{
$id=$_POST['studentid'];

$nam=$_POST['studentname'];
$cn=$_POST['scourse'];
header("Location:issue_book_note.php?sid=$id&sname=$nam&con=$cn");
}

?>
<?php
if(isset($_POST['return_btn']))
{
$id=$_POST['studentid'];
$bid=$_POST['bokid'];
$f=$_POST['fine'];
if(strlen($bid)==7)
$resu=$rec->BNReturn($id,$bid,$f);
else
$resu=$rec->noteReturn($id,$bid);
if($resu)
header("Location:issue_return.php?st=2");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Online Surya Academy Library System</title>
       <?php include "javascript/javascr.php" ;?>
<script>
function showUser(str,tr)
{
str=document.getElementById("stdacn").value;
//alert(str+""+tr);
if (str=="")
  {
  document.getElementById("txt1").innerHTML="Please enter student account number";
  document.getElementById("txt").innerHTML="";
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
	 document.getElementById("txt1").innerHTML="";
    document.getElementById("txt").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","getuser.php?q="+str+"&u="+tr,true);
xmlhttp.send();
}
</script>
</head>
	<body>
    <?php include "include/headder_with_menu.php";?>
    	<div class="container_12">
        <br/>
          <div class="grid_12">
          
                <div class="module1">
                     <h2><font size="5"><span>|| Issue/Return Books And Notes Of Student ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
             <form name="" action="" method="post">
                                               <?php
                  if(isset($_REQUEST['st']) && $_REQUEST['st']=='1')
				  {				    
				  echo '<br/><div><span class="notification n-success">Book/Notes Issued Successfully.......!!</span></div>';
                  }
				  if(isset($_REQUEST['st']) && $_REQUEST['st']=='2')
				  {				    
				  echo '<br/><div><span class="notification n-success">Book/Notes Return Successfully.......!!</span></div>';
                  }
				  ?>    
							   
          <table width="100%">
   <tr>
          <td width="40%" align="right">
          Account No. :</td> 
			<td width="60%"><input type="text" name="stdacn" id="stdacn" class="input-medium" />	&nbsp; &nbsp;
	<input type="button" class="submit-green"  onclick="showUser(0,1)" height="50" width="150" value="Search" /></td>
       </tr>
		   </table>
		   </form>
    
           </div> <!-- End .module-body -->
                </div>  <!-- End .module1 -->
        		<div style="clear:both;"></div>
          <div id="txt1" style="text-align:center;color:#FF0000;"></div>
		   <div id="txt">  </div>    
               </div> <!-- End .module-table-body -->
                </div>
  <?php include "include/footer.php";?>
	</body>
</html>