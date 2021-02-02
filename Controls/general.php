<?php
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true'){
        header("Location: ../login.php");
    }
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();
    function getUSerDetails($userId){
        $type = $_SESSION['userType'];
        switch ($type) {
            case 'Admin':
                $sql="SELECT u.username,d.fName,d.lName,d.contactNo,d.address,d.email FROM user u INNER JOIN userdetail d ON u.userId=d.userId WHERE u.userId='$userId'";
                break;
            
            case 'User':
                $sql="SELECT u.username,d.fName,d.lName,d.contactNo,d.address,d.email FROM user u INNER JOIN userdetail d ON u.userId=d.userId WHERE u.userId='$userId'";
                break;
            
            case 'Vendor':
                $sql="SELECT u.username,d.name,d.contactNo,d.address,d.email FROM user u INNER JOIN vendor d ON u.userId=d.spId WHERE u.userId='$userId'";
                break;
            
            default:
                # code...
                break;
        }
        global $connection;
        
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
        $sql="SELECT d.spId,d.name,d.catering,d.photography,d.videograpghy,d.decoration FROM vendor d INNER JOIN user u ON u.userId=d.spId WHERE u.userType='Vendor'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getAllAdmins(){
        global $connection;
        $sql="SELECT d.fName,d.lName FROM userdetail d INNER JOIN user u ON u.userId=d.userId WHERE u.userType='Admin'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getAllEvents(){
        global $connection;
        // $sql="SELECT d.fName,d.lName FROM booking d INNER JOIN user u ON u.userId=d.userId WHERE u.userType='Admin'";
        $sql="SELECT bookingId,eventName,type,date FROM booking";
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
    function getUserBooking(){
        $uId = $_SESSION['userId'];
        $sql = "SELECT bookingId,eventName,type,date,status FROM booking WHERE userId='$uId'";
        global $connection;
        $result = mysqli_query($connection,$sql);
        return $result; 
    }

?>
