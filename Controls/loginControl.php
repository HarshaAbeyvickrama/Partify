<?php
    session_start();

    include('./validate.php');
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();

    if(isset($_POST['btnLogin'])){
        $username=validate($_POST['uname']);
        $pass=validate($_POST['psw']);
        
        $sql="SELECT * FROM user WHERE username='$username'";
        $res=mysqli_query($connection,$sql);
        $count=mysqli_num_rows($res)>0;
        if($count>0){
            $row=$res->fetch_assoc();
            $hash=$row['password'];
            if(password_verify($pass,$hash)){
                $_SESSION['userId']=$row['userId'];
                $_SESSION['username']=$username;
                $_SESSION['userType']=$row['userType'];
                $_SESSION['loggedIn']='true';
                switch ($_SESSION['userType']){
                    case 'User':
                        header("location: ../User/dashboard.php");
                        break;
                    case 'Admin':
                        header("location: ../Admin/dashboard.php");
                        break;
                    case 'Vendor':
                        header("location: ../Vendor/dashboard.php");
                        break;
                    default:
                    
                        break;
            }}else{
                $_SESSION['status']='Wrong Username/Password';
                header("Location: ../login.php"); 
             
            
            
        }}else{
           $_SESSION['status']='Wrong Username/Password';
           header("Location: ../login.php"); 
        }
    }

?>