<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }
    include('../Includes/header.php');
    include('../Controls/userControl.php');
    
    
    require_once('../includes/db/dbConnection.php');
    include('./validate.php');
    

$db = DBConnection::getInstance();
$connection = $db->getConnection();

//vendor deletes serivess

$user=$_SESSION['userId'];

// mysqli_autocommit($connection,FALSE);
// mysqli_commit($connection);
$status=TRUE;



if(isset($_POST['delete_btn'])){


    $table=$_POST['delete_tab'];
    $pid=$_POST['delete_id'];

    
    if($table=="photography"){
        $photography="DELETE FROM photography WHERE pId='$pid'";
        $result = mysqli_query($connection,$photography);
        if($result){
            $status=FALSE;
        }else{
            echo 'no';
        }

        $noPhoto="SELECT COUNT(pId) AS total FROM photography WHERE spId=$user";
        $result=mysqli_query($connection,$noPhoto);
        $data=mysqli_fetch_assoc($result);
        if($data['total']==0){
            $service="UPDATE service SET photography='N' WHERE spId=$user";
            $sresult=mysqli_query($connection,$service);
        }
        
    }

    if($table=="videography"){
        $videography="DELETE FROM videography WHERE pId='$pid'";
        $result = mysqli_query($connection,$videography);
        if($result){
            $status=FALSE;
        }else{
            echo 'no';
        }

        $noVideo="SELECT COUNT(pId) AS total FROM videography WHERE spId=$user";
        $result=mysqli_query($connection,$noVideo);
        $data=mysqli_fetch_assoc($result);
        if($data['total']==0){
            $service="UPDATE service SET videography='N' WHERE spId=$user";
            $sresult=mysqli_query($connection,$service);
        }
    }

    if($table=="decoration"){
        $decoration="DELETE FROM decoration WHERE pId='$pid'";
        $result = mysqli_query($connection,$decoration);
        if($result){
            $status=FALSE;
        }else{
            echo 'no';
        }

        $noDecor="SELECT COUNT(pId) AS total FROM decoration WHERE spId=$user";
        $result=mysqli_query($connection,$noDecor);
        $data=mysqli_fetch_assoc($result);
        if($data['total']==0){
            $service="UPDATE service SET decoration='N' WHERE spId=$user";
            $sresult=mysqli_query($connection,$service);
        }
    }

    if($table=="location"){
        $location="DELETE FROM location WHERE pId='$pid'";
        $result = mysqli_query($connection,$location);
        if($result){
            $status=FALSE;
        }else{
            echo 'no';
        }

        $noLocation="SELECT COUNT(pId) AS total FROM location WHERE spId=$user";
        $result=mysqli_query($connection,$noLocation);
        $data=mysqli_fetch_assoc($result);
        if($data['total']==0){
            $service="UPDATE service SET location='N' WHERE spId=$user";
            $sresult=mysqli_query($connection,$service);
        }
    }

    $sprovider="SELECT * FROM service WHERE spId=$user";
        $spresult= mysqli_query($connection,$sprovider);
        $data=mysqli_fetch_assoc($spresult);
        if($data['catering']=='N' && $data['photography']=='N' && $data['videography']=='N' && $data['decoration']=='N' && $data['location']=='N'){
            $remove="DELETE FROM service WHERE spId=$user";
            $sremove=mysqli_query($connection,$remove);
            if($remove){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }
        
    if(!$status){
        mysqli_rollback($connection);
    }
}    
header("Location: ../Vendor/viewServices.php"); 
?>