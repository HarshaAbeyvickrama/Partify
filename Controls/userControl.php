<?php
    session_start();
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    include('validate.php');

    //Book New event
    
    if(isset($_POST['btnBookEvent'])){
        $eventName=validate($_POST['eventName']);
        $eventType=validate($_POST['eventType']);
        $eventLocation=validate($_POST['eventLocation']);
        $eventDate=validate($_POST['eventDate']);
        $startTime=validate($_POST['startTime']);
        $endTime=validate($_POST['endTime']);
        $userId=$_SESSION['userId'];
        echo 'User id :'.$_SESSION['username'];
       
        //Meals 
        if(isset($_POST['needMeal'])){
            $cateringService=validate($_POST['cateringService']);
            $mealType=validate($_POST['mealType']);
            $noOfPlates=validate($_POST['noOfPlates']);
            $platePrice=validate($_POST['platePrice']);
            $total=$platePrice*$noOfPlates;
            $meal='Y';
            echo 'Meals yes';

        }else{
            echo 'Meals No';
            $meal='N';
        }
        
        if(isset($_POST['needPhotography'])){
            $photographer=validate($_POST['photographer']);
            $photographyPackage=validate($_POST['photographyPackage']);
            $photography='Y';

        }else{
            $photography='N';
        }

        if(isset($_POST['needVideography'])){
            $videographer=validate($_POST['videographer']);
            $videographyPackage=validate($_POST['videographyPackage']);
            $videography='Y';
        }else{
            $videography='N';
        }

        if(isset($_POST['needDecoration'])){
            $decorator=validate($_POST['decorator']);
            $decoratorPackage=validate($_POST['decoratorPackage']);
            $decoration = 'Y';
        }else{
            $decoration = 'N';
        }
         
        $sqlBooking = "INSERT INTO booking  VALUES (NULL,$userId,'$eventName','$eventType','$eventDate','$startTime','$endTime','$meal','$photography','$videography','$decoration')";
        
        
        
        mysqli_autocommit($connection,FALSE);
        // mysqli_commit($connection);
        $status=TRUE;
        $result = mysqli_query($connection,$sqlBooking);
        if($result===TRUE){
            $bookingID=mysqli_insert_id($connection);
            if($meal='Y'){
                $sqlMeal = "INSERT INTO cateringbooking VALUES ('$bookingID','$cateringService','$meal','$noOfPlates','$total')";
                $result = mysqli_query($connection,$sqlMeal);
                if(!$result===TRUE){
                    $status=FALSE;
                }
            }
            if($photography='Y'){
                $sqlPhoto = "INSERT INTO photographybooking VALUES ('$bookingID','$photographer','$photographyPackage')";
                $result = mysqli_query($connection,$sqlMeal);
                if(!$result===TRUE){
                    $status=FALSE;
                }
            }
            if($videography='Y'){
                $sqlVideo = "INSERT INTO videographybooking VALUES ('$bookingID','$videographer','$videographyPackage')";
                $result = mysqli_query($connection,$sqlVideo);
                if(!$result===TRUE){
                    $status=FALSE;
                }
            }
            if($decoration='Y'){
                $sqlDecoration = "INSERT INTO decorationbooking VALUES ('$bookingID','$decoration','$decoratorPackage')";
                $result = mysqli_query($connection,$sqlDecoration);
                if(!$result===TRUE){
                    $status=FALSE;
                }
            }

            if($status){
                mysqli_commit($connection);
                mysqli_autocommit($connection,TRUE);
            }
        }else{
            echo 'no';
        }
        if(!$status){
            mysqli_rollback($connection);
        }
        
    }

?>