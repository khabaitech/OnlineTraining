<?php
include('model/config.php');

   echo '<table>
          <tr>
          <td align="right" width="40%"> Book ID </td>
          <td width="60%" align="left">
          <select  name="bookid" id="bookid" onchange="showtit(1)" class="input-medium">
           <option value="">---- select book id name -----</option>';
			$id = $_GET['q'];
			 $sub= $_GET['u']; 
   $sql="SELECT Bid ,B_Title FROM book  WHERE  B_Aut=$id AND B_Subject_Id=$sub and Activate = '1'";
   $row=mysql_query($sql)or die(mysql_errno());
     while($res = mysql_fetch_array($row))
	{
	  echo "<option value='".$res['Bid']."'>".$res['Bid']."</option>";
	}
                                   
            echo' </select>  </td>  </tr> </table><div id="con4"></div>';
  
?>
	
			
 