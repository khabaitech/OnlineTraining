 <?php
 $id=$_GET['q'];
 $stid=strtoupper($_GET['stfid']);
 include "controller/lib_manage.php";
include "controller/std_manage.php";
$rec = new librarian();
$ir= new stdmanage();
 
 if($id==2)
 {
 ?>
 
          
             <div class="module">
             <h2><span>|| Return Book Detail ||</span></h2>
        <div class="module-table-body">
                  
                    	
                                               
                        <table id="myTable" class="tablesorter">
                        	<thead>
                           
                                <tr>
                                    <th style="width:3%">#</th>
                                    <th style="width:9%">Account_no</th>
                                    <th style="width:17%">Book ID/Note ID</th>
                                     <th style="width:13%">Issue Date</th>
                                     <th style="width:7%">Duration</th>
                                     <th style="width:7%">Return Date</th>
                                      <th style="width:5%">&nbsp; &nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
							
	                          $row=$ir->getstaffIR($stid);
	                              $i=1;
								    
                                while($lin=mysql_fetch_array($row))
								{
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['student_id'];?></td>
                                    <td> <?php echo $lin['Book_id'];?></td>
                                    <td><?php echo $lin['Issue_date'];?></td>
                                     <td><?php echo $lin['Duration'];?></td>
                                      <td><?php echo $lin['Return_date'];?></td>
                                      <td><input type="checkbox" name="chk[]" value="<?php echo $lin['Book_id'];?>" /></td>
                               </tr>
                           <?php
                             $i++;
							   }
                            ?>   
                             
                            <input type="hidden" name="staffid" value="<?php echo $stid; ?>"  />
                        </tbody>
                      </table>
                   <?php include "include/pager.php";?>
                </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
               
        		<div style="clear:both;"></div>
                 
                          <div style="margin-left:500px;">
                          <input class="submit-gray" type="submit" value="Return"  name="return_btn"/> 
                          </div>
                       
                     <script>
			callcalendar();
			</script>  
                     
                          <br/><br/>
                          
                           <!-- issue book/notes -->
                                                                    
          <?php
          }
		  else
		  {
		  ?>
      
          <fieldset>   
                                     
          <table width="100%">
          <legend> <div style="color:#330066;font-size:14px;">Book/Notes Detail</div></legend>
          <tr >
          
          
            <td width="47%" height="45" align="right">Select Issue : </div></td>
            <td width="53%">
            <input type="radio" value="book" id="rd1" name="issType" onclick="showbooknote(1,1)" /> Book  &nbsp; &nbsp; <input type="radio" value="note" id="rd2" name="issType" onclick="showbooknote(2,1)" /> Note</td>
          </tr>
          </table>
		      
         
		   <div id="txt5">  </div>  
	        </fieldset>
                     
           <fieldset>                             
          <table width="100%">
          <legend> <div style="color:#330066;font-size:14px;">Professional Information</div></legend>
          <tr>
          
          
            <td width="38%" height="45" align="center">Issued date : 
              <input type="text" name="Idate" id="Idate" class="input-medium" value="<?php echo date('Y-m-d');?>" readonly="readonly" />
             </td>
            
            
            <td width="33%" height="45" >Return Date :             
            <input type="text" name="Rdate" id="inputField" class="input-medium" /></td> <td width="30%"> <font color="#990000">yyyy-mm-dd</font>           </td>
			
          </tr>
          <tr>
          <td width="32%"></td>
<td width="39%" align="left"><input class="submit-green" type="submit" value="ISSUE"  name="issue_btn1"/> 
                                <input class="submit-gray" type="submit" value="NEXT" name="next" /></td>
          </tr>
          
          </table> 
         
          </fieldset>
          
          
            
          <?php
          }
		  ?>
          
               