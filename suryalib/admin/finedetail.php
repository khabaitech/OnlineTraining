
<?php
$id=strtoupper($_GET['q']);

include "controller/std_manage.php";

$rec = new stdmanage();
$res=0;
$std=$rec->getstudentRecord($id);
 if($std)
  {
    $CSname=substr($id,0,1);
	
	if($CSname=="B")
	 $cname="BCA";
	 if($CSname=="M")
	 $cname="M.Sc";
	if($CSname=="D")
	 $cname="DCA";
	if($CSname=="P")
	 $cname="PGDCA";
	$fin= $rec->getfineRecord($id);
	 
 ?>                  
 <fieldset>   
<table>
		 <legend> <font color="#330066" size="6">Student Detail</font></legend>   <tr>  
             <td width="97"  height="45" align="right" >Student Name :  </td> 
             <td width="145">          
            <input type="text" name="stdname" id="stdname" class="input-medium" value="<?php echo $std['sname'];?>" readonly="readonly" />
              
           </td>
            </tr>
            <tr>
           <td  height="45" align="right">Course :  </td> <td>          
            <input type="text" name="course" id="course" class="input-medium" readonly="readonly" value="<?php echo $cname ;?>" />
              </td>
          </tr>
          <tr>
          <td height="45" align="right"> Date : </td> <td>  
            <input type="text" name="Rdate" id="Rdate" class="input-medium" readonly="readonly" value="<?php echo date('Y-m-d');?>" />          </td>
          </tr>
          <tr>
          <td  height="45" align="right">Total fine :</td> <td>   
            <input type="text" name="Tfine" id="Tfine" class="input-medium" readonly="readonly" value="<?php echo $fin;?>" />  </td>
      </tr>
      
          <tr> <td  height="45" align="right"> Enter Rs.  :</td> <td> 
          <input type="text" name="fine" id="fine" class="input-medium" value="" /></td>
          </tr>
                    
          </table> 
		  </fieldset>
          <div style="margin-left:440px">
		  <input class="submit-green" type="submit" value="Submit Fine"  name="pay_btn"/>
          <input class="submit-gray" type="submit" name="can_btn" value="Cancel" /> 
          </form> 
          </div>
	     <?php
           }
		   else
		   {
		   ?>
		   <br/>
                  <div><span class="notification n-error">Invalid Account Number.......!!</span></div>
            <?php }?>