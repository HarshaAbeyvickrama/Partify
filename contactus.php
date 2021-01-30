<?php
   echo "<link rel='stylesheet' type='text/css' href='css/contactus.css' />";
   echo "<script type='text/javascript' src='js/contactus.js'></script>";
  include("contactus_dbconnect.php");
  
?>
<div class="container">
  <div style="text-align:center">
    <h2>CONTACT US</h2>
    <p class="p2">For all inquiries please send us a messege using the form below.</p>
  </div>
  <div class="row">
    <div class="column">
      <div id="error_messege"></div>
      <form id="myform" action="contactus_user_process.php" method="POST" onsubmit="return validation()">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your Name..">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email..">
        <label for="phone">Phone</label>
	      <input type="text" id="phone" name="phone" placeholder="Your Phone Number..">
        <label for="messege">Messege</label>
        <textarea id="messege" name="messege" placeholder="Write your messege.." style="height:170px"></textarea>
        <input type="submit" value="submit">
      </form>
    </div>
	<div class="column">
      <img src="logo.jpg" style="width:100%"><br><br><br>
	<p class="p1">Email Us: abcabcabcabcabcabc@gmail.com <br> Call Us: 0123456789</p>
    </div>
  </div>
</div>