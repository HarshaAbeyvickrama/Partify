<?php
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    include('validate.php');

    //Book New event

    if(isset($_POST['btnBookEvent'])){
        $eventName=validate($_POST['eventName']);
        $eventLocation=validate($_POST['eventLocation']);
        $eventDate=validate($_POST['eventDate']);
        $startTime=validate($_POST['startTime']);
        $endTime=validate($_POST['endTime']);

        //Meals 
        if(isset($_POST['needMeal'])){
            $cateringService=validate($_POST['cateringService']);
            $mealType=validate($_POST['mealType']);
        }
        
        if(isset($_POST['needPhotography'])){
            $photographer=validate($_POST['photographer']);
            $photographyPackage=validate($_POST['photographyPackage']);
        }

        if(isset($_POST['needVideography'])){
            $photographer=validate($_POST['videographer']);
            $photographyPackage=validate($_POST['videographyPackage']);
        }

        if(isset($_POST['needDecoration'])){
            $photographer=validate($_POST['decorator']);
            $photographyPackage=validate($_POST['decoratorPackage']);
        }
            
       
        
    }

?>