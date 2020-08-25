<?php
include('model/config.php');

echo '<table>
          <tr height="50">
          <td align="right" width="40%"> Language </td>
          <td width="60%" align="left">';
          $id = $_GET['q'];
			  
   $sql="SELECT type,B_Rack_no FROM notes  WHERE  Note_id='$id' and Activate = '1'";
   $row=mysql_query($sql)or die(mysql_errno());
     $btit = mysql_fetch_array($row);

	 echo "<input type='text' name='notelan' value='".$btit['type']."' class='input-medium' readonly='readonly' />";
	 echo ' </td>  </tr>'; 
	 	 
	 echo '<tr>
          <td align="right" width="40%"> Rack No </td>  <td width="60%" align="left">';
     echo "<input type='text' name='rackno' value='".$btit['B_Rack_no']."' class='input-medium' readonly='readonly' />";
	 echo ' </td>  </tr>
	 
	 </table>
	 <div id="con4"> </div>';
?>