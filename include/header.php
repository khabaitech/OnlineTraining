<header>
      <div class="wrapper">
        <nav>
          <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            
            <li><a href="rulesregulation.php">Rules & Regulation</a></li>
             <li><a href="about_us.php">About us</a></li>
            <li class="end"><a href="contacts.php">Contact Us</a></li>
          </ul>
          
        </nav>
         <div style="margin-top: 15px; float: right; height:45;">

			<a href="../libweb/suryalib/admin/login.php" title="Admin Login"><img src="images/admin1.png" alt=""></a> <span></span>
			<a href="../libweb/suryalib/staff/login.php" title="Staff Login"><img src="images/student1.png" alt=""></a>
			<a href="../libweb/suryalib/student/login.php" title="student Login"><img src="images/staff1.png" alt=""></a>
         
        </div>
         
      </div>
      <div class="wrapper">
	  
	  	 <?php 
					 
				   $sql = "select * from setting where id = '1'";
				   $header =  mysql_query($sql);
				   $rowheader = mysql_fetch_array($header);
				 ?>
	  
        <h1 class="style6 style1 style2"><?php echo $rowheader['webtitle'];?></h1>
        <p class="style6 style1">&nbsp;</p>
        <p class="style5">&nbsp;<span class="style1">&nbsp;&nbsp;&nbsp;College for quality education</span></p>
      </div>
      <div id="slogan"> We Will Open The World<span>of knowledge for you!</span> </div>
    </header>