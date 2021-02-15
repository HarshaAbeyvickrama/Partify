<?php

    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='User'){
    header("Location: ../login.php");}
    
    include('../Includes/header.php');
    include('../Controls/userControl.php');
    include('../css/user_middle.css');  

?>

<div class="container">

    <div class="card">
            <h6>View Event</h6>
        <div class="card-body">
            <div class="table">
            <?php
                $connection = mysqli_connect("localhost","root","mysql","partify");
                $query = 'SELECT * FROM booking WHERE userId='.$bookingId;
                $query_run = mysqli_query($connection, $query);
            ?>
           
           
                <table class="table" id="viewEvent" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Event Name</th>
                        <th>Event Type</th>
                        <th>Event Location</th> 
                        <th>Event Date</th>
                        <th>From</th>
                        <th>To</th> 
                        <th>EDIT</th>
                        <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['eventName']; ?></td>
                                <td><?php  echo $row['eventType']; ?></td>
                                <td><?php  echo $row['eventLocation']; ?></td>
                                <td><?php  echo $row['eventDate']; ?></td>
                                <td><?php  echo $row['startTime']; ?></td>
                                <td><?php  echo $row['endTime']; ?></td>
                                <td>
                                    <form action="editEvent.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="edit_btn"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="../Controls/userControl.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="delete_btn"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>                            