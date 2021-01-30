<?php
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true'){
        header("Location: ../login.php");
    }
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();
    function getUSerDetails($userId){
        global $connection;
        $sql="SELECT u.username,d.fName,d.lName,d.contactNo,d.address,d.email,u.userType FROM user u INNER JOIN userdetail d ON u.userId=d.userId WHERE u.userId='$userId'";
        $result = mysqli_query($connection,$sql);
        return $result;

    }
    function getAllUsers(){
        global $connection;
        $sql="SELECT d.fName,d.lName FROM userdetail d INNER JOIN user u ON u.userId=d.userId WHERE u.userType='User'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getAllVendors(){
        global $connection;
        $sql="SELECT d.fName,d.lName FROM vendor d INNER JOIN user u ON u.userId=d.spId
         WHERE u.userType='Vendor'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getAllAdmins(){
        global $connection;
        $sql="SELECT d.fName,d.lName FROM userdetail d INNER JOIN user u ON u.userId=d.userId WHERE u.userType='Admin'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getUserCount(){
        global $connection;
        $sql="SELECT COUNT(*) AS userCount FROM user WHERE userType='User'";
        $result = mysqli_query($connection,$sql);
        $result = mysqli_fetch_object($result);
        return $result->userCount;
    }
    function getVendorCount(){
        global $connection;
        $sql="SELECT COUNT(*) AS userCount FROM user WHERE userType='Vendor'";
        $result = mysqli_query($connection,$sql);
        $result = mysqli_fetch_object($result);
        return $result->userCount;
    }
    function getEventCount(){
        global $connection;
        $sql="SELECT COUNT(*) AS eventCount FROM booking";
        $result = mysqli_query($connection,$sql);
        $result = mysqli_fetch_object($result);

        echo $result->eventCount;
    }


?>