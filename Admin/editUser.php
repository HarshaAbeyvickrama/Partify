<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='Admin'){
        header("Location: ../login.php");
    }  
    include('../Includes/template.php');  
    $accountId = $_POST['uid'];
    include('../Controls/general.php');
    $userDetails = viewUser($accountId);
    $res = mysqli_fetch_assoc($userDetails);
?>
    <form method="POST" action="../Controls/userControl.php">
    <link rel="stylesheet" type="text/css" href="../css/regiUser1.css">
    <div class="container">
            <?php
                $gender = $res['gender'];
                echo "<input type='hidden' name='userId' value='$accountId'>";
            ?>

            <h1><div style="text-align: center;">Update USER</div></h1>
            <hr>
            
            <div class = "user form" id ="user">
            <input type="hidden" name="userType" value="User">
            <br><br>
            <label for="useremail"><b>Email Address</b></label><br>
            <input type="email" placeholder="Email Address" name="email" id="email" value="<?php echo $res['email'] ?>" required><br><br>

            <label for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="First Name" name="fName" id="fName" value="<?php echo $res['fName'] ?>" required>

            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Last Name" name="lName" id="lName" value="<?php echo $res['lName'] ?>" required>

            <label for="male"><b>Gender</b></label><br>
            <input type="radio" id="male" name="gender" value="M" <?php if($gender == 'M') echo 'checked' ?>>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="F" <?php if($gender == 'F') echo 'checked' ?>>
            <label for="female">Female</label><br><br>

            <label for="dob"><b>Date of Birth :</b></label><br>
            <input type="date" placeholder="Date of Birth" name="dob" id="dob" value="<?php echo $res['dob'] ?>" required><br><br>

            <label for="usercontactno"><b>Contact Number</b></label>
            <input type="text" placeholder="Contact Number" name="contactNo" id="contactNo" value="<?php echo $res['contactNo'] ?>" required>

            <label for="useraddress"><b>Address</b></label>
            <input type="text" placeholder="Your Address" name="address" id="address" value="<?php echo $res['address'] ?>">

            <hr>
            <button type="submit" class="btn userRegisterBtn" name="updateUserBtn" id="updateUserBtn">Update User</button>
    
            </div>
            </form>

        </div>

        </div>
    </form>


</body>
</html>
