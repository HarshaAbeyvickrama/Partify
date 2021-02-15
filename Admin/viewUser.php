<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='Admin'){
        header("Location: ../login.php");
    }
    require_once('../includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();
    include('../includes/template.php');
    require_once('../Controls/general.php'); 
        $id = $_POST['uid'];   
        $res = viewUser($id);
        while($row=mysqli_fetch_assoc($res)){
            $userType = $_SESSION['userType'];
                $email=$row['email'];
                $name = $row['fName'].' '.$row['lName'];
                $gender=$row['gender'];
                $dob=$row['dob'];
                $contactNo=$row['contactNo'];
                $address=$row['address'];
?>
<link rel="stylesheet" type="text/css" href="../css/profile.css">
<div class="profile">
<h2><?php echo $name ?>'s Profile</h2>
    <div class="wrap">
    <?php 
        
                echo "<div class='lable'>Email  </div> <span>".$email."</span>
                <div class='lable'>Name  </div> <span>".$name."</span>
                <div class='lable'>Gender  </div> <span>".$gender."</span>
                <div class='lable'>DOB  </div> <span>".$dob."</span>
                <div class='lable'>Contact Number  </div> <span>".$contactNo." </span>
                <div class='lable'>Address </div> <span>".$address." </span>";
        }
    ?>     
    </div>
    <div class="forms">
        <form action="../Controls/deleteAccount.php" method="POST">
            <button type="submit" id="delete" class="btn" name="btnDelete">Delete Account</button>
        </form>
        <form action="./editUser.php" method="POST">
            <input type="hidden" name="uid" id="uid" value="<?php echo $id ?>">
            <button type="submit" id="editAccountBtn" class="btn" name="btnEdit">Edit Account</button>
        </form>
        
    </div>
    

    </div>
</div>
    
</body>
</html>