<!DOCTYPE html>
<html lang="en">
<head>
<?php include "pageinfo.php"; ?>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<style type="text/css">
.style1 {font-size: 36px}
.style2 {color: #000033}
</style>
</head>
<body id="page5">
<div class="body1">
  <div class="main">
    <!-- header -->
   <?php include "include/header.php" ;?>
    <!-- / header -->
  </div>
</div>
<div class="body2">
  <div class="main">
    <!-- content -->
    <section id="content">
      <div class="box1">
        <div class="wrapper">
           <?php
          echo $row['description'];
           ?>
		  
		  
           <?php include "Impdate.php"; ?>
        </div>
      </div>
    </section>
    <!-- content -->
    <?php include "include/footer.php" ;?>
</html>