<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='Vendor'){
        header("Location: ../login.php");
    }
    include('../Includes/header.php');
?>
<div class="mainWrap">
    <?php include('../Includes/navbar.php'); ?>
    <!-- continue from here -->
    
</div>