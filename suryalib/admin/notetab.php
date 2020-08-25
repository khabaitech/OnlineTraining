<?php

include "controller/lib_manage.php";
$obj = new librarian();
$sid=$_GET['q'];

$sub=$obj->getnoteSubname($sid);

$a=strlen($sid);
       if($a==1)
       $i="0".$sid;
       if($a==2)
       $i=$sid;
  

?>
   <table width="100%">
          <tr>
		  
          <td width="326" height="45" align="right">Note ID. : </td>
            <td width="553" align="left">
            <input type="hidden" name="nsub" value="<?php echo $sub ; ?>" />
           <input type="text" name="nid" id="nid" value="<?php echo $i ; ?>" class="input-medium" readonly="readonly"/></td>
	      </tr>		  		 
			 <tr>
		   <td width="326" height="45" align="right">Notes Quantity : </td>
           <td width="553" align="left">
           <input type="text" name="Nqun" id="Nqun" class="input-medium" maxlength="2" /></td>
	      </tr>		
		  
		  <tr>
		   <td width="326" height="45" align="right">Date : </td> 
		  
		             <td align="left"><input type="text" size="12" id="inputField" name="nd" class="input-short" value="<?php echo date("d-m-Y"); ?>"/>&nbsp;
          &nbsp; <font size="1" color="#FF0000">dd-mm-yyyy</font>
            </td>
		
          </tr>
	
	    <tr>
			   <td height="45" align="right">Rack No : </td>
			  <td width="553" align="left"><select name="rno" class="input-short" >
                     <option value="">Select Rack</option>"
                     <?php
                              $row=$obj->getRrec();
	                       while($lin=mysql_fetch_array($row))
                             {
							 ?>
                               
                             <option value=" <?php echo $lin['id'];?>"> <?php echo $lin['id'];?></option>
                             <?php
                             }
							 ?>
        </select>
             </td></tr>
		  
		  <tr>
		  
          <td width="326" height="45" align="right">Language : </td>
            <td width="553" align="left">
           <select name="NLan" class="input-short" >
         <option value="English">English</option>
		 <option value="Hindi">Hindi</option>
         </select>
         </td>
         
		  </tr>
          <tr valign="middle">
            <td height="45" align="right">Remark :</td>
            <td align="left">  <textarea rows="5" cols="90" name="Nrem" class="input-medium"></textarea></td>
        </tr>  
		
		<tr>
          <td></td>
          
            <td align="left" height="45"> 
             <input class="submit-green" type="submit" value="Submit"  name="sub"/> 
             <input class="submit-gray" type="reset" value="Reset" /></td>
              </tr>
					  
           </table>
	
