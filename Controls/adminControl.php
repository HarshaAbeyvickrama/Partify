  
<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true'){
        header("Location: ../login.php");
    }
    require_once('../Includes/db/dbConnection.php');

    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    if(isset($_POST['deleteEvent'])){
        echo 'yes';
        $eventId = $_POST['bId'];
        $sql = 'DELETE FROM booking WHERE bookingId ='.$eventId;
        $res = mysqli_query($connection,$sql);
        if($res===TRUE){
            $_SESSION['state']="Booking Deleted Successfully";
            header("location: ../Admin/events.php");
        }else {
            echo  'not dlyed';
        }

    }

?>