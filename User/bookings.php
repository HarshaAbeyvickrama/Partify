<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='User'){
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
            include('../Controls/general.php');  

        ?>
        <div class="midContent booking">
            
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
                        $res = getUserBooking();
                        while($row = mysqli_fetch_assoc($res)){
                            $name = $row['eventName'];
                            $type = $row['type'];
                            $date = $row['date'];
                            $status = $row['status'];
                            $bookingId = $row['bookingId'];
                            echo "<tr><td>$name</td><td>$type</td><td>$date</td>";
                            echo '<td>';
                            
                            echo '<form action="./viewEvent.php" method="post">
                            <input type="hidden" name="bId" value="'.$bookingId.'">
                            <button type="submit" name="viewEvent" class="btn btnview">View</button>
                            </form></td>';
                            echo '<td><form action="./general.php" method="post">
                            <input type="hidden" name="bId" value="'.$bookingId.'">
                            <button type="submit" name="deleteEvent" id="deleteEvent" class="btn btnDelete">Delete</button>
                            </form></td></tr>';
                        }
                        echo '</tbody></table>';
                ?>
                </div>
                

            
        
    </div>
    </div>
    
    
           
    </div>
    
</body>
</html>