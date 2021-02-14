<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
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
                $sql="SELECT * FROM user u INNER JOIN admindetail d ON u.userId=d.adminId WHERE u.userId='$userId'";
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
        $sql="SELECT d.userId,d.fName,d.lName,d.email,d.gender,d.dob,d.contactNo,d.address FROM userdetail d INNER JOIN user u ON u.userId=d.userId WHERE u.userType='User'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getAllVendors(){
        global $connection;
        $sql="SELECT d.spId,d.name,d.address,d.email,d.contactNo FROM vendor d INNER JOIN user u ON u.userId=d.spId WHERE u.userType='Vendor'";
        $result = mysqli_query($connection,$sql);
        return $result;
    }
    function getAllAdmins(){
        global $connection;
        $sql="SELECT d.* FROM admindetail d INNER JOIN user u ON u.userId=d.adminId WHERE u.userType='Admin'";
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

    function getAllMesseges(){
        global $connection;
        $sql = "SELECT * FROM contactus";
        return mysqli_query($connection,$sql);
    }

    function viewVendor(){
        global $connection;
        $sql = "SELECT d.spId,s.cartering,s.photography,s.videography,s.decoration,s.location FROM vendor d INNER JOIN service s INNER JOIN user u ON d.spId=s.spId WHERE u.userType='Vendor'";
        return mysqli_query($connection,$sql);
    }

    function viewAdmin($Id){
        global $connection;
        // $sql = "SELECT d.* FROM admindetail d INNER JOIN user u ON u.userId=d.adminId WHERE u.userType='Admin' AND d.adminId=$id;";
        $sql="SELECT * FROM user u INNER JOIN admindetail d ON u.userId=d.adminId WHERE u.userId='$Id'";
        return mysqli_query($connection,$sql);
    }

    function viewEvent(){
        global $connection;
        // $sql="SELECT d.fName,d.lName FROM booking d INNER JOIN user u ON u.userId=d.userId WHERE u.userType='Admin'";
        $sql="SELECT startTime,endTime,meal,photography,videography,decoration,location,status FROM booking";
        $result = mysqli_query($connection,$sql);
        return $result;
    }

    function viewUser($uid){
        global $connection;
        $sql="SELECT * FROM userdetail WHERE userId=$uid";
        return mysqli_query($connection,$sql);
    }
    function getAdminDetails($uid){
        global $connection;
        $sql="SELECT * FROM admindetail WHERE adminId=$uid";
        return mysqli_query($connection,$sql);
    }
    // function UserD($id){
    //     global $connection;
    //     $sql="SELECT * FROM userdetail WHERE userId=$id";
    //     return mysqli_query($connection,$sql);
    // }

?>
