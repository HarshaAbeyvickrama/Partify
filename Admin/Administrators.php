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
        <?php
        include('../Controls/general.php');
        $admins = getAllAdmins();    
        while($row=mysqli_fetch_assoc($admins)){
            $name = $row['fName'].' '.$row['lName'];
            echo $name;
        }
        
        ?>
    
    </div>
    <?= include('../Includes/footer.php'); ?>
    </div>
    <!-- show all users -->


    




</div>
</body>
</html>