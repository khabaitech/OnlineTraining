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
$rec = new librarian();
$ir= new stdmanage();
 ?>

<?php

if(isset($_POST['issue_btn1']))
{

$diff = strtotime($_POST['Rdate']) - strtotime($_POST['Idate']);
$days = floor($diff/(3600*24));
$acno=$_POST['stdacn'];
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

header("Location:issue_return.php?st=1");
}

if(isset($_POST['next']))
{
 header('Location:issue_return.php');
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
//alert(str+""+tr);
$("#txt").html(''); 
 $("#txt1").html('');  
$("#txt2").html('');
$("#txt3").html(''); 
$("#ntxt").html('');
$("#ntxt1").html(''); 

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="please Select type";
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
    document.getElementById("txt").innerHTML=xmlhttp.responseText;
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
  
  $("#txt1").html('');  
$("#txt2").html('');
$("#txt3").html(''); 
  
  document.getElementById("txt1").innerHTML="<span style='color:red'>Please Select subject name</span> <br/>";
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
    document.getElementById("txt1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getwriter.php?q="+str,true);
xmlhttp.send();
}

function showbook(str)
{
str=  document.getElementById("wrin").value;
tr= document.getElementById("subj").value;
if (str=="")
  {
  $("#txt2").html('');
  $("#txt3").html(''); 
  document.getElementById("txt2").innerHTML="<span style='color:red'>Please select writer name</span> <br/>";
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
    document.getElementById("txt2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getbook.php?q="+str+"&u="+tr,true);
xmlhttp.send();
}

function showtit(str)
{

str=  document.getElementById("bookid").value;
if (str=="")
  {
   $("#txt3").html(''); 
  document.getElementById("txt3").innerHTML="<span style='color:red'>Please select book id</span> <br/>";
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
    document.getElementById("txt3").innerHTML=xmlhttp.responseText;
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
  
  
$("#ntxt1").html('');   
  
  document.getElementById("ntxt").innerHTML="<span style='color:red'>Please Select subject name</span><br/>";
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
    document.getElementById("ntxt").innerHTML=xmlhttp.responseText;
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
  document.getElementById("ntxt1").innerHTML="<span style='color:red'>Please Select note id</span><br/>";
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
    document.getElementById("ntxt1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getdetnote.php?q="+str,true);
xmlhttp.send();
}
</script>
 </head>
	<body>
    <?php include "include/headder_with_menu.php";
	
	?>
    	<div class="container_12">
        <br/>
          <div class="grid_12">
          
                <div class="module1">
                     <h2><font size="5"><span>|| Book And Notes Issue||</span></font></h2>
                        
                     <div class="module-body"><!--put tab here -->
                     <form name="" action="" method="post">
              
                 
               <fieldset>                             
           <legend> <div style="color:#330066;font-size:14px;">Student Detail</div></legend>
		  <table width="100%">
		       
          <tr>
           <td width="34%" height="45" align="center">Account No. : <input type="text" name="stdacn" id="stdacn" class="input-medium" value="<?php echo $_REQUEST['sid'] ;?>" readonly="readonly" />
             </td>
               <td width="33%" height="45" >Student Name :             
            <input type="text" name="stdname" id="stdname" class="input-medium" value="<?php echo $_REQUEST['sname'] ;?>" readonly="readonly"/>
            </td>
            <td width="33%" height="45" >Course :             
            <input type="text" name="course" id="course" class="input-medium" readonly="readonly" value="<?php echo $_REQUEST['con'] ;?>" />
            </td>
          </tr>
        </table> 
          </fieldset>
           <fieldset>   
		    <legend> <div style="color:#330066;font-size:14px;">Book/Notes Detail</div></legend>
        <table width="100%">
         
          <tr >
            <td width="47%" height="45" align="right">Select Issue : </td>
            <td width="53%">
            <input type="radio" value="book" id="rd1" name="issType" onclick="showUser(1,1)" /> Book  &nbsp; &nbsp; <input type="radio" value="note" id="rd2" name="issType" onclick="showUser(2,1)" /> Note</td>
          </tr>
          </table>
	<div id="txt">  </div>  
	 <div id="txt1" style="text-align:center;"> </div>
           <div id="txt2" style="text-align:center;"> </div>
             <div id="txt3" style="text-align:center;"> </div>
			 
			  <div id="ntxt" align="center"></div>
          <div id="ntxt1" align="center"></div>
	   <!-- for note information -->
          </fieldset>
          <!-- end of note information  -->
        <fieldset>     
 <legend> <div style="color:#330066;font-size:14px;">Professional Information</div></legend>		
          <table width="100%">
         
          <tr>
            <td width="35%" height="45" align="center">Issued date : <input type="text" name="Idate" id="Idate" class="input-medium" value="<?php echo date('Y-m-d');?>" readonly="readonly" />
             </td>
             <td width="65%" height="45" >Return Date :             
            <input type="text" name="Rdate" id="inputField" class="input-short" /> &nbsp; <font color="#990000">yyyy-mm-dd</font>
			<script>
			callcalendar();
			</script>
             </td>
          </tr>
          <tr>
          <td width="10%"></td>
           <td width="90%" align="left"><input class="submit-green" type="submit" value="ISSUE"  name="issue_btn1"/> 
                                <input class="submit-gray" type="submit" value="NEXT" name="next" /></td>
          </tr>
          
          </table> 
        </fieldset>
         </form>   
           </div> <!-- End .module-body -->
		   
		   </div><!-- End .module1 -->
		   <div style="clear:both;"></div>
                </div>  <!-- grid-12 -->
        		<div style="clear:both;"></div>
           </div> 
         
<?php include "include/footer.php";?>
	</body>
</html>


