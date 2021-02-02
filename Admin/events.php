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
        <div class="midContent adminViewEvents">
            <?php
            include('../Controls/general.php');
            //all events
            $events = getAllEvents();
            
            ?>

        <div class="tabel">
                        <?php
                            echo "<table class='bookingTable'>
                            <thead>
                            <tr>
                            <th class='col col1'>Event Name</th>
                            <th class='col col2'>Type</th>
                            <th class='col col3'>Date</th>
                            <th class='col colBtn'></th>
                            <th class='col colBtn'></th></tr></thead><tbody>";

                            while($row = mysqli_fetch_assoc($events)){
                                // echo $row['bookingId'];
                                // echo $row['eventName'];
                                // echo $row['type'];
                                // echo $row['date'];
                                // echo '<br>';
                            
                                echo '<tr><td>'.$row['eventName'].'</td><td>'.$row['type'].'</td><td>'.$row['date'].'</td>';
                                echo '<td>';
                                
                                echo '<form action="./viewEvent.php" method="post">
                                <input type="hidden" name="bId" value="'.$row['bookingId'].'">
                                <button type="submit" name="viewEvent" class="btnView btn">View</button>
                                </form></td>';
                                echo '<td><form action="./viewEvent.php" method="post">
                                <input type="hidden" name="bId" value="'.$row['bookingId'].'">
                                <button type="submit" name="deleteEvent" id="deleteEvent" class="btn btnDelete">Delete</button>
                                </form></td></tr>';
                            }
                            echo '</tbody></table>';
                        ?>
                </div>
            
    
    
    </div>
</body>
</html>