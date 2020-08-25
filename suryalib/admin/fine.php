<?php
if(isset($_POST['can_btn']))
header('Location:fine.php');
include "controller/std_manage.php";
$rec = new stdmanage();
?>

<?php
if(isset($_POST['pay_btn']))
{
   $stdid=$_POST['stdacn'];
    $payfine=$_POST['fine'];
	 $dat=$_POST['Rdate'];
	 $res=$rec->Submitfine($stdid,$payfine,$dat);
	 if($res)
	 {
	    $msg="Fine Submit Successfully.....!!";
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
xmlhttp.open("GET","finedetail.php?q="+str+"&u="+tr,true);
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
                     <h2><font size="5"><span>|| Pay Fine ||</span></font></h2>
                      <div class="module-body"><!--put tab here -->
                    <?php
                    if($res)
					{
					?>
                     <br/>
                  <div><span class="notification n-success"><?php echo $msg ;?></span></div>
                 <?php
                    }
					?>
                <form name="" action="" method="post">
          <table width="100%">
             <tr>
          <td width="40%" align="right">
               Account No. :</td> 
			<td width="60%"><input type="text" name="stdacn" id="stdacn" class="input-medium" />	&nbsp; &nbsp;
		<input type="button" class="submit-green"  onclick="showUser(0,1)" height="50" width="150" value="Search" /></td>
           </tr>
		   </table>
		    <div id="txt1" style="text-align:center;color:#FF0000;"></div>
		   <div id="txt">  </div> 
             </div> <!-- End .module-body -->
               </div>  <!-- End .module1 -->
        		<div style="clear:both;"></div>
               </div> <!-- End grid-12 -->
                </div><!-- main container-->
<?php include "include/footer.php";?>
	</body>
</html>