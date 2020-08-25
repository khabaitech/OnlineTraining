 <?php
include('model/config.php');

   echo '<table>
          <tr>
          <td align="right" width="40%"> Note ID </td>
          <td width="60%" align="left">
          <select  name="noteid" id="noteid" class="input-medium" onchange="shownoteinfo()">
           <option value="">---- select note id  -----</option>';
			$id = $_GET['q'];
			 
    $sql="SELECT Note_id FROM notes WHERE Activate =1 AND Subject_name = (SELECT subject_name FROM subject WHERE id = '$id' )";
    $row=mysql_query($sql)or die(mysql_errno());
     while($res = mysql_fetch_array($row))
	{
	  echo "<option value='".$res['Note_id']."'>".$res['Note_id']."</option>";
	}
                                   
            echo' </select>  </td>  </tr> </table><div id="con3"> </div>';
  
?>
	
 
 
 
 