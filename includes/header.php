<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<link rel="stylesheet" href="./css/header.css">
<div class="nav">
    <div claass="logoBackground">
        <div class="logo">
            Partify
        </div>
    </div>
    <div class="menu">
        <ul class="navMenu">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./aboutus.php">About Us</a></li>
            
            <li><a href="./contactus.php">Contact Us</a></li>
            <li><a href="./gallery.php">Gallery</a></li>
            <?php
                if(isset($_SESSION['loggedIn'])){
                    if($_SESSION['userType']=='User'){
                        echo "<li><a href='./User/bookEvent.php'>Book Events</a></li>";
                        echo "<li><a href='./User/bookings.php'>Dashboard</a></li>";
                    }else if($_SESSION['userType']=='Admin'){
                        echo "<li><a href='./Admin/dashboard.php'>Dashboard</a></li>";
                    }else if($_SESSION['userType']=='Vendor'){
                        echo "<li><a href='./Vendor/viewOrders.php.php'>Dashboard</a></li>";
                    }else{}
                    echo " <li><a href='./Controls/logoutControl.php'>Log Out</a></li>";
                }else{
                    echo " <li><a href='./login.php'>Log in</a></li>";
                }
            ?>
            
        </ul>
    </div>
</div>