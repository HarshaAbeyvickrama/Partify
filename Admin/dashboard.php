<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='Admin'){
        header("Location: ../login.php");
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/header2.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/adminDashboard.css">
</head>
<body>
   
<div class="container">
    <?php 
        include('./nav.php'); 
    ?>
    <div class="right">
    <?php
        include('../Includes/header2.php');
        include('../Controls/general.php');
    ?>
        <div class="mainUP">
            <div class="card c1">
                <h3>Events</h3><p> <?php echo getEventCount(); ?></p>
            </div>
            <div class="card c2">
                <h3>Vendors</h3> <p><?php echo getVendorCount(); ?></p>
            </div>
            <div class="card c3">
                <h3>Accounts</h3><p><?php echo getUserCount(); ?></p> 
            </div>
        </div>
        <div class="recent">
            
        </div>
    </div>    
</div>
