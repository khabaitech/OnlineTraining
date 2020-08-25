<?php
include('model/config.php');

   echo '<table>
          <tr>
          <td align="right" width="40%"> Writer Name </td>
          <td width="60%" align="left">
          <select id="wrin" name="wrin" onchange="showbook(1)" class="input-medium" >
           <option value="">---- select writer name -----</option>';
			$id = $_GET['q'];
			  
   $sql="SELECT distinct writer_name,id FROM book, writer WHERE writer.id = book.B_Aut AND Activate = '1' AND B_Subject_Id =$id";
  $row=mysql_query($sql)or die(mysql_errno());
 
    while($res = mysql_fetch_array($row))
	{
	  echo "<option value='".$res['id']."'>".$res['writer_name']."</option>";
	}
    echo '</select>  </td>  </tr> </table>';
  echo '<div id="con3"></div>';
?>	
			
		
		   
             