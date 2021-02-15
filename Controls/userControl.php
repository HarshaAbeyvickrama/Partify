<?php
     if(!isset($_SESSION['loggedIn'])){
        session_start();
     }
    
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    include('validate.php');

    //Book New event
    
    if(isset($_POST['btnBookEvent']) || isset($_POST['btnEditEvent'])){
        $alreadyBooked = isset($_POST['bookingId']); 
        if($alreadyBooked){
            $bookId = $_POST['bookingId'];
            echo 'Booking Id : '.$bookId;
            echo '<br>';
        }
        $eventName=validate($_POST['eventName']);
        $eventType=validate($_POST['eventType']);
        $eventDate=validate($_POST['eventDate']);
        $startTime=validate($_POST['startTime']);
        $endTime=validate($_POST['endTime']);
        $userId=$_SESSION['userId'];
        // echo 'User id :'.$_SESSION['username'];
       
        //Meals 
        if(isset($_POST['needMeal'])){
            $cateringService=validate($_POST['cateringService']);
            echo 'Caterer : '.$cateringService;
            $mealType=validate($_POST['mealType']);
            $noOfPlates=validate($_POST['noOfPlates']);
            $meal='Y';
            // $platePrice=validate($_POST['platePrice']);
            // $total=$platePrice*$noOfPlates;
            echo 'Meals Paltes : '.$noOfPlates.'<br>';
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
        if(isset($_POST['needLocation'])){
            $locationProvider=validate($_POST['locationProvider']);
            $locationType=validate($_POST['locationType']);
            $location = 'Y';
        }else{  
            $location = 'N';
        }
         
        if($alreadyBooked){
            $sqlBooking = "UPDATE booking SET eventName='$eventName',type='$eventType',date='$eventDate',startTime='$startTime',endTime='$endTime',meal='$meal',photography='$photography',videography='$videography',decoration='$decoration',location='$location' WHERE bookingId='$bookId'";
            echo $sqlBooking;
            echo '<br>';

        }else{
            $sqlBooking = "INSERT INTO booking VALUES (NULL,'$userId','$eventName','$eventType','$eventDate','$startTime','$endTime','$meal','$photography','$videography','$decoration','$location','PENDING')";
            echo $sqlBooking;
            echo '<br>';
        }
        $result = mysqli_query($connection,$sqlBooking);
        print_r('Booking : '.$result);
        $status=TRUE;
        
        // echo 'Result : '.$result;
        if($result){
            if(!$alreadyBooked){
                $bookingID=mysqli_insert_id($connection);
            }
            
            if($meal=='Y'){
                if($alreadyBooked){
                    $query = "SELECT COUNT(*) FROM cateringbooking WHERE bookingId='$bookId'";
                    
                    $execResult = mysqli_query($connection,$query);
                    
                    if($execResult){
                        echo 'already have';
                        $sqlMeal = "UPDATE cateringbooking SET spId='$cateringService',mealName='$mealType',noOfPlates='$noOfPlates' WHERE bookingId='$bookId'";
                    }else{
                        $sqlMeal = "INSERT INTO cateringbooking VALUES ('$bookingID','$cateringService','$mealType','$noOfPlates')";
                    }
                }else{
                    $sqlMeal = "INSERT INTO cateringbooking VALUES ('$bookingID','$cateringService','$mealType','$noOfPlates')";
                   
                }
                echo $sqlMeal;
                $result = mysqli_query($connection,$sqlMeal);
                print_r('SQL meal :'.$result);
            
                if(!$result){
                    $status=FALSE;
                }
            }else {
               
            }
            if($photography=='Y'){
                if($alreadyBooked){
                    $query = "SELECT COUNT(*) FROM photographybooking WHERE bookingId='$bookId'";
                    if(mysqli_query($connection,$query)){
                        $sqlPhoto = "UPDATE photographybooking SET spId='$photographer',albumType='$photographyPackage' WHERE bookingId='$bookId'";
                    }else{
                        $sqlPhoto = "INSERT INTO photographybooking VALUES ('$bookingID','$photographer','$photographyPackage')";
                    }
                }else{
                    $sqlPhoto = "INSERT INTO photographybooking VALUES ('$bookingID','$photographer','$photographyPackage')";
                   
                }
                $result = mysqli_query($connection,$sqlPhoto);
                
                if(!$result){
                    $status=FALSE;
                }
            }
            if($videography=='Y'){
                if($alreadyBooked){
                    $query = "SELECT COUNT(*) FROM photographybooking WHERE bookingId='$bookId'";
                    if(mysqli_query($connection,$query)){
                        $sqlVideo = "UPDATE videographybooking SET spId='$videographer',albumType='$videographyPackage' WHERE bookingId='$bookId'";
                    }else{
                        $sqlVideo = "INSERT INTO videographybooking VALUES ('$bookingID','$videographer','$videographyPackage')";
                    }
                }else{
                    $sqlVideo = "INSERT INTO videographybooking VALUES ('$bookingID','$videographer','$videographyPackage')";
                   
                }
                $result = mysqli_query($connection,$sqlVideo);
                if(!$result){
                    $status=FALSE;
                }
            }
            if($decoration=='Y'){
                if($alreadyBooked){
                    $query = "SELECT COUNT(*) FROM decorationbooking WHERE bookingId='$bookId'";
                    if(mysqli_query($connection,$query)){
                        $sqlDecoration = "UPDATE decorationbooking SET spId='$decorator',decorationType ='$decoratorPackage' WHERE bookingId='$bookId'";
                    }else{
                        $sqlDecoration = "INSERT INTO decorationbooking VALUES ('$bookingID','$decorator','$decoratorPackage')";
                    }
                }else{
                    $sqlDecoration = "INSERT INTO decorationbooking VALUES ('$bookingID','$decorator','$decoratorPackage')";
                   
                }
                echo $sqlDecoration;
                $result = mysqli_query($connection,$sqlDecoration);
                if(!$result){
                    $status=FALSE;
                }


            }
            if($location=='Y'){
                
    
                if($alreadyBooked){
                    $query = "SELECT COUNT(*) FROM locationbooking WHERE bookingId='$bookId'";
                    if(mysqli_query($connection,$query)){
                        $sqlLocation = "UPDATE locationbooking SET spId='$locationProvider',locationType ='$locationType' WHERE bookingId='$bookId'";
                    }else{
                        $sqlLocation = "INSERT INTO locationbooking VALUES ('$bookingID','$locationProvider','$locationType')";
                    }
                }else{
                    $sqlLocation = "INSERT INTO locationbooking VALUES ('$bookingID','$locationProvider','$locationType')";
                   
                }
                $result = mysqli_query($connection,$sqlLocation);
                if(!$result){
                    $status=FALSE;
                }
            }

            if($status){
            }
        }else{
            echo 'no outer';
        }
        if(!$status){

        }
        header("location: ../User/bookings.php");
        
    }


    //get all catering services
    function getServicesProviders($type){
        global $connection;
        switch ($type) {
            case 'meal':
                $sql = "SELECT u.name,u.spId FROM vendor u INNER JOIN service c WHERE u.spId=c.spId AND c.catering='Y'";
                return mysqli_query($connection,$sql);
            case 'photo':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.photography='Y';";
                return mysqli_query($connection,$sql);
            case 'video':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.videography='Y';";
                return mysqli_query($connection,$sql);
            case 'deco':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.decoration='Y';";
                return mysqli_query($connection,$sql);
            case 'location':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.location='Y';";
                return mysqli_query($connection,$sql);
                
        }
    }
    function getServices($type){
        global $connection;
        switch ($type) {
            case 'meal':
                $sql = "SELECT u.name,u.spId FROM vendor u INNER JOIN service c WHERE u.spId=c.spId AND c.catering='Y'";
                return mysqli_query($connection,$sql);
            case 'photo':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.photography='Y';";
                return mysqli_query($connection,$sql);
            case 'video':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.videography='Y';";
                return mysqli_query($connection,$sql);
            case 'deco':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.decoration='Y';";
                return mysqli_query($connection,$sql);
            case 'location':
                $sql = "SELECT DISTINCT v.name,v.spId FROM vendor v INNER JOIN service s ON  v.spId=s.spId WHERE s.location='Y';";
                return mysqli_query($connection,$sql);
                
        }
        
       
    }

    function getTypes($id){
        global $connection;
        $sql = "SELECT packtype as 'type' from location WHERE spId='$id'";
        return mysqli_query($connection,$sql);
    }
    // get event data

    function getEvent($id){
        global $connection;
        
        $sqlBooking = 'SELECT * FROM booking WHERE bookingId='.$id;
        $resBooking = mysqli_query($connection,$sqlBooking);
        while($row = mysqli_fetch_assoc($resBooking)){
            return $row;
        }
       


    }
    function getMeals($spvId){
        global $connection;
        $sqlMeal = 'SELECT * FROM cateringbooking WHERE bookingId='.$spvId;
        $resMeal = mysqli_query($connection,$sqlMeal);
        return mysqli_fetch_assoc($resMeal);
        
    }
    function getPhoto($spvId){
        global $connection;
        $sqlMeal = 'SELECT * FROM photographybooking WHERE bookingId='.$spvId;
        $resMeal = mysqli_query($connection,$sqlMeal);
        return mysqli_fetch_assoc($resMeal);
        
    }
    function getVideo($spvId){
        global $connection;
        $sqlMeal = 'SELECT * FROM videographybooking WHERE bookingId='.$spvId;
        $resMeal = mysqli_query($connection,$sqlMeal);
        return mysqli_fetch_assoc($resMeal);
        
    }
    function getDeco($spvId){
        global $connection;
        $sqlMeal = 'SELECT * FROM decorationbooking WHERE bookingId='.$spvId;
        $resMeal = mysqli_query($connection,$sqlMeal);
        return mysqli_fetch_assoc($resMeal);
        
    }
    function getLocation($spvId){
        global $connection;
        $sqlMeal = 'SELECT * FROM decorationbooking WHERE bookingId='.$spvId;
        $resMeal = mysqli_query($connection,$sqlMeal);
        return mysqli_fetch_assoc($resMeal);
        
    }

    //delete event

    if(isset($_POST['deleteEvent'])){
        $bId = $_POST['bId'];
        $deleteSql = "DELETE FROM booking WHERE bookingId='$bId'";
        if(mysqli_query($connection,$deleteSql)){
            $_SESSION['deleteEvent']='Event Deleted Successfully';
        }else{
            $_SESSION['deleteEvent']='Event Delete Failed';
        }
        header("location: ../user/bookings.php");
        
    }
    // getEvent('48');

    if(isset($_POST['updateUserBtn'])){
        $uid = $_POST['userId'];
        $email = $_POST['email'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $contactNo = $_POST['contactNo'];
        $address = $_POST['address'];
        $sql = "UPDATE userdetail SET email='$email',fName='$fName',lName='$lName',gender='$gender',dob='$dob',contactNo='$contactNo',address='$address' WHERE userId='$uid'";
        echo $sql;
        if(mysqli_query($connection,$sql)){
            $_SESSION['updateAdmin'] = 'User Updated Succesfully';
        }else{
            $_SESSION['updateAdmin'] = 'User Update Failed';
        }
        header("location: ../Admin/Users.php");

    }
?>


<!-- while($row = mysqli_fetch_assoc($resBooking)){
            // array_push($final,$row['eventName'],$row['type'],$row['date'],$row['startTime'],$row['endTime'],$row['meal'],$row['photography'],$row['videography'],$row['decoration']);
            $final = array_merge($final,$row);
            // print_r($final);
           
            
            if($final['photography']=='y' || $final['photography']=='Y' ){
                
                $sqlPhoto = 'SELECT * FROM photographybooking WHERE bookingId='.$id;
                $resPhoto = mysqli_query($connection,$sqlPhoto);
                while($rowInner = mysqli_fetch_assoc($resPhoto)){
                    $final = array_merge($final,$rowInner); 
                }
                

            }
            if($final['videography']=='y' || $final['videography']=='Y'){
                
                $sqlvideo = 'SELECT * FROM photographybooking WHERE bookingId='.$id;
                $resVideo = mysqli_query($connection,$sqlvideo);
                while($rowInner = mysqli_fetch_assoc($resVideo)){
                    $final = array_merge($final,$rowInner); 
                }

            }
            if($final['decoration']=='y' || $final['decoration']=='Y'){
                // echo 'yes meal';
                $sqlDeco = 'SELECT * FROM decorationbooking WHERE bookingId='.$id;
                $resDeco = mysqli_query($connection,$sqlDeco);
                while($rowInner = mysqli_fetch_assoc($resDeco)){
                    $final = array_merge($final,$rowInner); 
                }

            }
        }
         -->