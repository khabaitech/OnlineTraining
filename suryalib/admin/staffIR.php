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
<?php include "controller/lib_manage.php";
include "controller/std_manage.php";
$ir= new stdmanage();
 ?>
<?php
if(isset($_POST['issue_btn1']))
{
$diff = strtotime($_POST['Rdate']) - strtotime($_POST['Idate']);
$days = floor($diff/(3600*24));
$acno=strtoupper($_POST['stdacn']);
$Idat=$_POST['Idate'];
 $Rdat=date('Y-m-d',strtotime($_POST['Rdate']));

if($_POST['issType']=="book")
{
$bkid=$_POST['bookid'];
$res=$ir->isseue($acno,$bkid,$Idat,$days,$Rdat);
}
else
{
$notid=$_POST['noteid'];
$res=$ir->isseueNote($acno,$notid,$Idat,$days,$Rdat);
}
header("Location:staffIR.php?st=1");
}

if(isset($_POST['next']))
{
 header('Location:staffIR.php');
}
?> 

<?php
if(isset($_POST['return_btn']))
{
$id=$_POST['staffid'];
$BNid=implode(',',$_POST['chk']);
$resu=$ir->returnStaffBN($id,$BNid);
if($resu)
header("Location:staffIR.php?st=2");

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
  document.getElementById("txtU").innerHTML="Please enter student account number";
  document.getElementById("txtuu").innerHTML="";
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
	 document.getElementById("txtU").innerHTML="";
    document.getElementById("txtuu").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","getstaff.php?q="+str+"&u="+tr,true);
xmlhttp.send();
}


function issuereturn(str,tr)
{
//alert(str+""+tr);
var stid=document.getElementById("stdacn").value;
if (str=="")
  {
  document.getElementById("issRet").innerHTML="please Select type";
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
    document.getElementById("issRet").innerHTML=xmlhttp.responseText;
	callcalendar();
    }
  }
xmlhttp.open("GET","getReturnIssue.php?q="+str+"&u="+tr+"&stfid="+stid,true);
xmlhttp.send();
}

function showbooknote(str,tr)
{

if (str=="")
  {
  document.getElementById("txt5").innerHTML="Please Select type";
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
    document.getElementById("txt5").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser1.php?q="+str+"&u="+tr,true);
xmlhttp.send();
}

function showwriter(str)
{
//alert(str+""+tr);

str=  document.getElementById("subj").value;

if (str=="")
  {
  document.getElementById("con2").innerHTML="please Select subject name";
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
	
    document.getElementById("con2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getwriter.php?q="+str,true);
xmlhttp.send();
}

function showbook(str)
{
//alert(str+""+tr);

str=  document.getElementById("wrin").value;
tr= document.getElementById("subj").value;
if (str=="")
  {
  document.getElementById("con3").innerHTML="Please select writer name";
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
	
    document.getElementById("con3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getbook.php?q="+str+"&u="+tr,true);
xmlhttp.send();
}


function showtit(str)
{
//alert(str+""+tr);

str=  document.getElementById("bookid").value;

if (str=="")
  {
  document.getElementById("con4").innerHTML="Please select book id";
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
    document.getElementById("con4").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getbooktit.php?q="+str,true);
xmlhttp.send();
}


function shownote(str)
{
//alert(str+""+tr);

str=  document.getElementById("subj").value;

if (str=="")
  {
  document.getElementById("con2").innerHTML="Please Select subject name";
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
    document.getElementById("con2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getnotes.php?q="+str,true);
xmlhttp.send();
}


function shownoteinfo(str)
{
//alert(str+""+tr);

str=  document.getElementById("noteid").value;

if (str=="")
  {
  document.getElementById("con3").innerHTML="Please Select note id";
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
    document.getElementById("con3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getdetnote.php?q="+str,true);
xmlhttp.send();
}


</script>
  <style type="text/css">
        .style1 
   	    {
	            font-size: 36px
        }
        </style>
</head>
	<body>
    <?php include "include/headder_with_menu.php";?>
    	<div class="container_12">
        <br/>
          <div class="grid_12">
          
                <div class="module1">
                     <h2><font size="5"><span>|| Issue/Return Books And Notes Of Staff ||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     
                    
        <form method="post">
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
		        
          <div id="txtU" style="text-align:center;color:#FF0000;"></div>
		   <div id="txtuu">  </div>
          </form>
            </div> <!-- End .module-body -->

                </div>  <!-- End .module1 -->
        		<div style="clear:both;"></div>    
               </div> <!-- End .grid 12 -->
                </div><!--container -->
				
                       
                       
			
		
           
       <?php include "include/footer.php";?>
	</body>
</html>