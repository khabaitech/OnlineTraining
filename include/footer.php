 <!-- footer -->
 <?php 
 $sql = "select * from setting where id = '1'";
 $foot = mysql_query($sql);
 $rfoot = mysql_fetch_array($foot);
 
 ?>
 
    <footer>
      <div class="wrapper">
        <div class="pad1">
          <div class="pad_left1">
            <div class="wrapper">
              <article class="col_1">
                <h3>Address :</h3>
                <p class="col_address"><strong>Country:<br>
                  City:<br>
                  Address:<br>
                  Email:</strong></p>
				  
                <p><?php echo $rfoot['country']; ?><br>
                  <?php echo $rfoot['city']; ?><br>
                  <?php echo $rfoot['address']; ?><br>
                  <a href="mailto:<?php echo $rfoot['email'];?>"><?php echo $rfoot['email']; ?></a></p>
              </article>
              
              <article class="col_1 pad_left2">
                <h3>Why Us :</h3>
                <ul class="list2">
                  <li><?php echo $rfoot['whyus1'];?> </li>
                  <li><?php echo $rfoot['whyus2'];?> </li>
                  <li><?php echo $rfoot['whyus3'];?> </li>
                  <li><?php echo $rfoot['whyus4'];?> </li>
                </ul>
              </article>
			  
			  
			   <article class="col_1 pad_left2">
                <h3>Connect with us :</h3>
                <ul class="list2">
                  <li><a href="<?php echo $rfoot['facebook'];?>" target="_blank_"> Facebook</a>  </li>
                  <li><a href="<?php echo $rfoot['twitter'];?>" target="_blank_"> Twitter</a> </li>
				   <li><a href="<?php echo $rfoot['googleplus'];?>" target="_blank_"> Google Plus</a>  </li>
                  <li><a href="<?php echo $rfoot['linkedin'];?>" target="_blank_"> Linked In</a>  </li>
                 
                </ul>
              </article>
			  
            </div>
            
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->
    </div>
</div>

<div align=center>Online Library System </div>

</body>
