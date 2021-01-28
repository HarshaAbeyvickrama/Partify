<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='Admin'){
        header("Location: ../login.php");
    }
    include('../Includes/header.php');
    
?>

<div class="mainUP">
        <div class="card">
            Events
        </div>
        <div class="card">
            Vendors
        </div>
        <div class="card">
            Accounts
        </div>
    </div>