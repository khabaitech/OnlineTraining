<?php
$id=strtoupper($_GET['q']);

include "controller/std_manage.php";

$rec = new stdmanage;
$std=$rec->getstaffRecord($id);
 if($std)
  {
    
	 
 ?>                  
  
              
<table>
		   <tr>
           <td align="right" width="40%"> Staff Name : </td>            
            <td width="60%"><input type="text" name="stdname" id="stdname" class="input-short" value="<?php echo $std['stname'];?>" readonly="readonly" />   </td>            
           
          </tr>
          <tr>
          <td align="right" width="40%"><input type="radio" name="irBN" id="irBN1" onClick="issuereturn(1,1)" /> </td>
          <td width="60%">Do you want Issue Book/Notes</td>
          </tr>
          <tr>
          <td align="right" width="40%"><input type="radio" name="irBN" id="irBN2" onClick="issuereturn(2,1)" /> </td>
          <td width="60%">Do you want Return Book/Notes</td>
          </tr>
          
          
          </table>
          <input type="hidden" name="staffid" value="<?php echo $id ;?>" />
		
        <div id="issRet" align="center"></div>
		  
           <?php
           }
		   else
		   {
		   ?>
		   <br/>
                  <div><span class="notification n-error">Invalid Account Number.......!!</span></div>
                   
                   
		  <?php }?>