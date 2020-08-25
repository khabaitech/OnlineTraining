<?php
 $id=$_GET['q'];
 include "controller/lib_manage.php";
include "controller/std_manage.php";
$rec = new librarian();
$ir= new stdmanage();
 
 if($id==1)
 {
 ?>
      <table width="100%">
          <tr><div style="font-size:22px; color:#FF0000;text-align:center;text-decoration:underline;">Book Information</div><br/> </tr>
          <tr>
          <td width="40%" align="right">
            Subject name: </td> 
            <td width="60%" height="45">
         <select id="subj" name="subj" onchange="showwriter(1)" class="input-medium">
         <option value="">Select subject:</option>
			<?php
			 $recR=$rec->getSrec();
             while($lin=mysql_fetch_array($recR))
              {
            ?>
             <option value="<?php echo $lin['id']?>"><?php echo $lin['subject_name']?></option>
             
             <?php } ?>
                                    
             </select>
          
		  
          </td></tr>
          </table>
         <div id="con2"> </div>
				 <?php
				 }
				 else
				 {
				 ?>
           <table width="100%">
          <tr><div style="font-size:22px; color:#FF0000;text-align:center;text-decoration:underline;">Note Information</div><br/> </tr>
          <tr>
          <td width="40%" align="right">
            Subject name: </td> 
            <td width="60%" height="45">
          <select id="subj" name="subj" onchange="shownote(1)" class="input-medium">
         <option value="">Select subject:</option>
			<?php
			 $recR=$rec->getSrec();
             while($lin=mysql_fetch_array($recR))
              {
            ?>
             <option value="<?php echo $lin['id']?>"><?php echo $lin['subject_name']?></option>
             
             <?php }?>
                                    
             </select>
          
          </td></tr>
          </table>
         <div id="con2"> </div>
			<?php
			}
			?>
		