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
    <div class="midContent">
    <div class="tabel">
        <?php
        include('../Controls/general.php');
        
                        
                            echo "<table class='bookingTable'>
                            <thead>
                            <tr>
                            <th class='col col1'>Username</th>
                            <th class='col col2'>Email</th>
                            <th class='col col3'>Contact</th>
                            <th class='col colBtn'></th>
                            <th class='col colBtn'></th></tr></thead><tbody>";


                            $admins = getAllAdmins();    
                            while($row=mysqli_fetch_assoc($admins)){
                                $name = $row['fName'].' '.$row['lName'];
                                $email = $row['email'];
                                $contact = $row['contactNo'];
                                                
                                echo '<tr><td>'.$name.'</td><td>'.$email.'</td><td>'.$contact.'</td>';
                                echo '<td>';
                                
                                echo '<form action="./viewEvent.php" method="post">
                                <input type="hidden" name="bId" value="'.$row['userId'].'">
                                <button type="submit" name="viewEvent" class="btnView btn">View</button>
                                </form></td>';
                                echo '<td><form action="../Controls/adminControl.php" method="POST">
                                <input type="hidden" name="bId" value="'.$row['userId'].'">
                                <button type="submit" name="deleteEvent" id="deleteEvent" class="btn btnDelete">Delete</button>
                                </form></td></tr>';
                            }
                            echo '</tbody></table>';
                        
        
        
        
        
        ?>
        </div>
    
    </div>
    </div>
    <!-- show all users -->


    




</div>
</body>
</html>