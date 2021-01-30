<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }
    include('../Includes/header.php');
    
?>
<div class="body">
    <?php include('./nav.php'); ?>
    <link rel="stylesheet" href="../css/userDashboard.css">
    <form action="../Controls/logoutControl.php" method="post">
        <button type="submit" name="btnLogout" id="btnLogout">Logout</button>
    </form>
</div>
