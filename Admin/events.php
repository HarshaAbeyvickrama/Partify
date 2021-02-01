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
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/header2.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
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
        <div class="midContent">
            <?=
            include('../Controls/general.php');
            //all events
            $events = getAllEvents();
            while($row = mysqli_fetch_assoc($events)){
                echo $row['bookingId'];
                echo $row['eventName'];
                echo $row['type'];
                echo $row['date'];
                echo '<br>';
            }
            ?>
        </div>
            
    
    
    <?php include('../Includes/footer.php'); ?>
    </div>
</body>
</html>