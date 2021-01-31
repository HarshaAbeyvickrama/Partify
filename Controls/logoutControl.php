<?php
    session_start();
    
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
        unset($_SESSION['userType']);
        unset($_SESSION['loggedIn']);
        session_destroy();
        echo 'Logged Out';
        header("Location: ../index.php");
    

?>