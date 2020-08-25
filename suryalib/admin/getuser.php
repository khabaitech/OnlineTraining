<?php
$id=strtoupper($_GET['q']);

include "controller/std_manage.php";

$rec = new stdmanage;
$std=$rec->getstudentRecord($id);
$tot=0;
$fin=0;
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
	 
	 
	  $row=$rec->getstdIR($id);
	    $i=1;
								  
         $lin=mysql_fetch_array($row);
		$stdfine=0;
		if($lin)
		{
		 $Rdat=$lin['Return_date'];
		 $dat=date('Y-m-d');
		 $diff=strtotime($dat) - strtotime($Rdat);
		 $days = floor($diff/(3600*24));
		 if($days>0)
		 {
		   $stdfine=$days*5;
		   $sql = "update  issue_return  set fine='$stdfine' where student_id='$id' and Activate='1'";
		   $result=mysql_query($sql) or die(" could not  issue book".mysql_error());
		   $tot = $fin + $stdfine;
		  }
		}
	 
 ?>                  





<div class="module1">
                     
                        
       <div class="module-body"><!--put tab here -->
       
      <fieldset>   
              
<table>
<?php
if($tot>0)
{
?>
		 <br/> <span class="notification n-information">Your Total fine is Rs. <?php echo $tot ;?></span>
         
  <?php
  }
  ?>       
         <legend> <font color="#330066" size="6">Student Detail</font></legend>   <tr>  
             <td width="50%" height="45" align="right" >Student Name :             
            <input type="text" name="stdname" id="stdname" class="input-medium" value="<?php echo $std['sname'];?>" readonly="readonly" />
              
            </td>
           <td width="50%" height="45" >Course :             
            <input type="text" name="course" id="course" class="input-medium" readonly="readonly" value="<?php echo $cname ;?>" />
              
            </td>
          </tr>
          
          </table> 
		  </fieldset>
		  
		   </div> <!-- End .module-body -->

                </div>  <!-- End .module1 -->
        		<div style="clear:both;"></div>
          
             <div class="module">
             <h2><span>|| Issued Book Detail ||</span></h2>
        <div class="module-table-body">
        
                
                    	<form action="" method="post">
                                               
                        <table id="myTable" class="tablesorter">
                        	<thead>
                           
                                <tr>
                                    <th style="width:3%">#</th>
                                    <th style="width:9%">Account_no</th>
                                    <th style="width:17%">Book ID/Note ID</th>
                                     <th style="width:13%">Issue Date</th>
                                     <th style="width:7%">Duration</th>
                                     <th style="width:7%">Return Date</th>
                                </tr>
                                
								
                                
                            </thead>
                            <tbody>
                            <?php 
							
	                         
                                if($lin)
								{
                                  ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $lin['student_id'];?></td>
                                    <td> <?php echo $lin['Book_id'];?></td>
                                    <td><?php echo $lin['Issue_date'];?></td>
                                     <td><?php echo $lin['Duration'];?></td>
                                      <td><?php echo $lin['Return_date'];?></td>
                               </tr>
                           <?php
                                  
								 
							   }
							   
							   
							   
                            ?>   
                             
                            
                        </tbody>
                         
                        </table>
                         <table>
                         <tr>
                         <input type="hidden" name="studentid" value="<?php echo $id ;?>" />
                         <input type="hidden" name="studentname" value="<?php echo $std['sname'];?>" />
                         <input type="hidden" name="scourse" value="<?php echo $cname;?>" />
                          <input type="hidden" name="bokid" value="<?php echo $lin['Book_id'];?>" />
                         <td width="15%"> Rack no.
                           <input type="text" id="rackno" name="rackno" class="input-medium" readonly="readonly" value="<?php  echo $lin['B_Rack_no'] ;?>" />
                         </td>
                          <td width="20%">Current Fine : 
                            <input type="text" name="fine" id="fine" class="input-medium" readonly="readonly" value="<?php echo $stdfine ;?>" >
							
                         </td>
						 
						 <td width="15%">
							Total Fine: <?php echo $tot; ?>
                         </td>
                         <td width="50%"> 
						 <?php 
						 if($tot>0)
						 echo '<a href="fine.php" ><div style="font-size:16px;">Click here to pay fine....</div></a>';
						 ?>
                            
                         </td>
                         </tr>
						
                         </table>
                  
                          <div style="margin-left:500px;">
                          <?php
                          if(!$lin)
						  {
						  ?>
                              <input class="submit-green" type="submit" value="ISSUE"  name="issue_btn"/> 
                              <p/>
                           <?php
                           }
						   else
						   {
						   ?>   
                            <input class="submit-gray" type="submit" name="return_btn" value="RETURN" />
                            <p/></td> 
                            <?php
                            }
							?>  
                         </div>
                       </form>
                       
                     
                         
                          
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
           <?php
           }
		   else
		   {
		   ?>
		   <br/>
                  <div><span class="notification n-error">Invalid Account Number.......!!</span></div>
                   
                   
		  <?php }?>