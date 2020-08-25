<?php
include('model/config.php');
echo '<table>
          <tr height="50">
          <td align="right" width="40%"> Book Title </td>
          <td width="60%" align="left">';
          $id = $_GET['q'];
			  
   $sql="SELECT B_Title,B_Rack_No FROM book  WHERE  Bid='$id' and Activate = '1'";
   $row=mysql_query($sql)or die(mysql_errno());
     $btit = mysql_fetch_array($row);

	 echo "<input type='text' name='bookname' value='".$btit['B_Title']."' class='input-medium' readonly='readonly' />";
	 echo ' </td>  </tr>'; 
	 	 
	 echo '<tr>
          <td align="right" width="40%"> Rack No </td>  <td width="60%" align="left">';
     echo "<input type='text' name='rackno' value='".$btit['B_Rack_No']."' class='input-medium' readonly='readonly' />";
	 echo ' </td>  </tr>
	 
	 <table>';
?>