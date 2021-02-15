<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }
    include('../includes/header.php');
    ?>
<?php
require_once('../includes/db/dbConnection.php');
include('./validate.php');

$db = DBConnection::getInstance();
$connection = $db->getConnection();

//vendor deletes serivess



// mysqli_autocommit($connection,FALSE);
// mysqli_commit($connection);
$status=TRUE;

if(isset($_POST['delete_btn'])){

    $user=$_SESSION['userId'];

    $table=$_POST['delete_tab'];
    $meal=$_POST['delete_meal'];
    $count=0;

    if($table=="catering"){

        if($meal=="breakfast"){
            $breakfast="UPDATE catering SET breakfast='N',breakfastPlate=0 WHERE spId='$user'";
            $result = mysqli_query($connection,$breakfast);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }
        if($meal=="lunch"){
            $lunch="UPDATE catering SET lunch='N',lunchPlate=0 WHERE spId=$user";
            $result = mysqli_query($connection,$lunch);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }
        if($meal=="dinner"){
            $dinner="UPDATE catering SET dinner='N',dinnerPlate=0 WHERE spId=$user";
            $result = mysqli_query($connection,$dinner);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
            }
        }

        $noMeal="SELECT * FROM catering WHERE spId=$user";
        $result=mysqli_query($connection,$noMeal);
        $data=mysqli_fetch_assoc($result);
        

        if($data['breakfast']=='N' && $data['lunch']=='N' && $data['dinner']=='N'){
            $catering="DELETE FROM catering WHERE spId=$user";
            $result1 = mysqli_query($connection,$catering);
            if($result1){
                $status=FALSE;
            }else{
                echo 'no';
            }
            $service="UPDATE service SET catering='N' WHERE spId=$user";
            $result = mysqli_query($connection,$service);
            if($result){
                $status=FALSE;
            }else{
                echo 'no';
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

    }
        
    if(!$status){
        mysqli_rollback($connection);
    }
}
header("Location: ../Vendor/viewServices.php");    
?>