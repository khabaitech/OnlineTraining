<?php
function getmonth($mon)
{
if($mon==1)
return "January";
if($mon==2)
return "Febaruary";
if($mon==3)
return "March";
if($mon==4)
return "April";
if($mon==5)
return "May";
if($mon==6)
return "June";
if($mon==7)
return "July";
if($mon==8)
return "August";
if($mon==9)
return "September";
if($mon==10)
return "October";
if($mon==11)
return "November";
if($mon==12)
return "December";

}

?>

 <article class="col2 pad_left2">
            <div class="pad_left1">
              <h2>Important News</h2>
            </div>
            
            <?php include "suryalib/admin/model/library.php"; 
			$obj = new manage_lib();
			$row = $obj->Getweb_news();
			while($lin=mysql_fetch_array($row))
			{
			 $dat=explode('-',$lin['date']);
			 $day=$dat[2];
			 $month=getmonth($dat[1]);
			?>
            <div class="wrapper"> <span class="date"><?php echo $day ; ?></span>
              <p class="pad_top2">
			  <strong><?php echo $month.",".$dat[0] ;?></strong><br>
                <?php echo $lin['description'];?><img src="images/new_icon_blink.gif" /> </p>
            </div>
            <?php
            }
			?>
            </article>
            
            
            