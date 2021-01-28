<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }
    include('../Includes/header.php');
    
?>
<div class="body">
    <?php include('../Includes/navbar.php'); ?>
    <link rel="stylesheet" href="../css/userDashboard.css">
    
</div>
