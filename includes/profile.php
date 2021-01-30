<div class="profile">
    <?php 
        require_once('../Controls/general.php'); 
        $res = getUSerDetails($_SESSION['userId']);
        while($row=mysqli_fetch_assoc($res)){
            $name = $row['fName'].' '.$row['lName'];
            $address = $row['address'];
            $email = $row['email'];
            $contactNo = $row['contactNo'];
            $userType = $row['userType'];
            $username = $row['username'];
            $userType = $row['userType'];
            // echo $email;
        }

    ?>
    <h2>My Profile</h2>
    <div class="wrap">
        <div class="lable">Name  </div> <span><?php echo $name ?></span>
        <div class="lable">Userame  </div> <span><?php echo $username ?></span>
        <div class="lable">Address  </div> <span><?php echo $address ?></span>
        <div class="lable">Email Address  </div> <span><?php echo $email ?></span>
        <div class="lable">Account Type  </div> <span><?php echo $userType ?></span>
        <div class="lable">Contact Number  </div> <span><?php echo $contactNo ?></span>
    </div>
    

    <div class="forms">
        <form action="../Controls/deleteAccount.php" method="POST">
            <button type="submit" id="delete" class="btn" name="btnDelete">Delete Account</button>
        </form>
        <form action="../Controls/logoutControl.php" method="post">
            <button type="submit" id="logout" class="btn">Logout</button>
        </form>
    </div>
    

</div>