<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true'){
        header("Location: ../login.php");
    }
    require_once('../Includes/db/dbConnection.php');

    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    if(isset($_POST['btnDelete'])){
        $userId = $_SESSION['userId'];
    }
    if(isset($_POST['btnDeleteUser'])){
        $userId = $_POST['id'];
    }
    $sql="DELETE FROM user WHERE userId='$userId'";
        if(mysqli_query($connection,$sql)===TRUE){
            echo 'deleted';
            header("Location: ./logoutControl.php");
        }else{
            echo 'failed';
        }

    
?>