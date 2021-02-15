<?php
require_once('../Includes/db/dbConnection.php');
include('./validate.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$db = DBConnection::getInstance();
$connection = $db->getConnection();

//A new Vendor adds services


// mysqli_autocommit($connection,FALSE);
// mysqli_commit($connection);
$status=TRUE;

if(isset($_POST['btnAddService'])){

    $spId=$_SESSION['userId'];

    //add catering options
    if(isset($_POST['needMeal'])){
        $provideMeal='Y';

        //add breakfast
        if(isset($_POST['breakfast'])){
            $breakfast='Y';
            $breakfastPrice=validate($_POST['breakfastPrice']);
        }
        else{
            $breakfast='N';
            $breakfastPrice=0;
        }

        //add lunch
        if(isset($_POST['lunch'])){
            $lunch='Y';
            $lunchPrice=validate($_POST['lunchPrice']);
        }
        else{
            $lunch='N';
            $lunchPrice=0;
        }

        //add dinner
        if(isset($_POST['dinner'])){
            $dinner='Y';
            $dinnerPrice=validate($_POST['dinnerPrice']);
        }
        else{
            $dinner='N';
            $dinnerPrice=0;
        }

        $meal = "INSERT INTO catering VALUES ('$spId','$breakfast','$lunch','$dinner','$breakfastPrice','$lunchPrice','$dinnerPrice')";
        $result = mysqli_query($connection,$meal);
        if($result){
            $status=FALSE;
        }else{
            echo 'no';
        }

    }else {
        $provideMeal='N';
    }

    //add photography options
    if(isset($_POST['needPhotography'])){
        $providePhotography='Y';

        //add packages
        for ($i=0; $i < count($_POST['typeP']);  $i++) { 
            $ptype=$_POST['typeP'][$i];
            $pdesc=$_POST['descriptionP'][$i];
            $pprice=$_POST['priceP'][$i];

            $photo = "INSERT INTO photography VALUES (NULL,'$spId','$ptype','$pprice','$pdesc')";
            $result = mysqli_query($connection,$photo);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }
        

    }else{
        $providePhotography='N';
    }

    //add videography options
    if(isset($_POST['needVideography'])){
        $provideVideography='Y';

         //add packages
         for ($i=0; $i < count($_POST['typeV']);  $i++) { 
            $vtype=$_POST['typeV'][$i];
            $vdesc=$_POST['descriptionV'][$i];
            $vprice=$_POST['priceV'][$i];

            $video = "INSERT INTO videography VALUES (NULL,'$spId','$vtype','$vprice','$vdesc')";
            $result = mysqli_query($connection,$video);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }
    }else{
        $provideVideography='N';
    }

    //add decoration options
    if(isset($_POST['needDecoration'])){
        $provideDecor='Y';

         //add packages
         for ($i=0; $i < count($_POST['typeD']);  $i++) { 
            $dtype=$_POST['typeD'][$i];
            $ddesc=$_POST['descriptionD'][$i];
            $dprice=$_POST['priceD'][$i];

            $decor = "INSERT INTO decoration VALUES (NULL,'$spId','$dtype','$dprice','$ddesc')";
            $result = mysqli_query($connection,$decor);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }

    }else{
        $provideDecor='N';
    }

    //add location options
    if(isset($_POST['needLocation'])){
        $provideLocation='Y';

        if(isset($_POST['swimmingPool'])){
            $pool='Y';
        }
        if(isset($_POST['airCondition'])){
            $aircondition='Y';
        }else{
            $aircondition='N';
        }
        $location=validate($_POST['locationName']);

         //add packages
         for ($i=0; $i < count($_POST['typeL']);  $i++) { 
            $ltype=$_POST['typeL'][$i];
            $ldesc=$_POST['descriptionL'][$i];
            $lprice=$_POST['priceL'][$i];

            $place = "INSERT INTO location VALUES (NULL,'$spId','$ltype','$lprice','$ldesc','$location','$aircondition','$pool')";
            $result = mysqli_query($connection,$place);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }

    }else{
        $provideLocation='N';
    }

        $sql= "INSERT INTO service VALUES ('$spId','$provideMeal','$providePhotography','$provideVideography','$provideDecor','$provideLocation')";
        $result = mysqli_query($connection,$sql);
        if($result){
            $status=FALSE;
        }else{
            echo 'no';
        }
    
        
    if(!$status){
        mysqli_rollback($connection);
    }
} 

header("Location: ../Vendor/addServices.php");

?>