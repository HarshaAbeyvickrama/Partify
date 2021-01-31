<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='Admin'){
        header("Location: ../login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/header2.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="icon" href="../Assets/partify.gif">
</head>
<body>
<div class="container">
    <?php 
        include('./nav.php'); 
    ?>
    <div class="right">
        <?php
        include('../Includes/header2.php');
        
        ?>
        <div class="users midContent">
            <?php
            include('../Controls/general.php');
            $users = getAllUsers();    
            while($row=mysqli_fetch_assoc($users)){
                $name = $row['fName'].' '.$row['lName'];
                echo $name;
            }
            ?>
        </div>
        
    </div>
    <!-- show all users -->
</div>