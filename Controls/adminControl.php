  
<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true'){
        header("Location: ../login.php");
    }
    require_once('../Includes/db/dbConnection.php');

    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    if(isset($_POST['deleteEvent'])){
        $eventId = $_POST['']
    }

?>