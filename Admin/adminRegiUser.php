<html lang="en">
<head>
    <title>Register</title>
    <!-- <script src="./js/registerUser.js"></script> -->
    <link rel="stylesheet" type="text/css" href="../css/regiUser1.css">
</head>
<body>
        <div class="container">
            <h1><div style="text-align: center;">REGISTER USER</div></h1>
            <hr>
            <form method="POST" action="./Controls/registrationControl.php">
            <div class = "user form" id ="user">
            <br><br>
            <label for="useremail"><b>Email Address</b></label><br>
            <input type="email" placeholder="Email Address" name="useremail" id="useremail" required><br><br>

            <label for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="First Name" name="firstname" id="firstname" required>

            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Last Name" name="lastname" id="lastname" required>

            <label for="username"><b>Usename</b></label>
            <input type="text" placeholder="Username" name="username" id="username" required>

            <label for="male"><b>Gender</b></label><br>
            <input type="radio" id="male" name="gender" value="M">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="F">
            <label for="female">Female</label><br><br>

            <label for="dob"><b>Date of Birth :</b></label><br>
            <input type="date" placeholder="Date of Birth" name="dob" id="dob"><br><br>

            <label for="usercontactno"><b>Contact Number</b></label>
            <input type="text" placeholder="Contact Number" name="usercontactno" id="usercontactno" required>

            <label for="useraddress"><b>Address</b></label>
            <input type="text" placeholder="Your Address" name="useraddress" id="useraddress">

            <label for="userpsw"><b>Password</b></label>
            <input type="password" placeholder="Password" name="userpsw" id="userpsw" onkeyup='checkPassword();' required>

            <label for="userpsw_repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="userpsw_repeat" id="userpsw_repeat" onkeyup='checkPassword();' required>
            <span id="passtext"></span>
            <hr>
            <button type="submit" class="btn userRegisterBtn" name="userRegisterBtn" id="userRegisterBtn">Register</button>
            </div>
            </form>
            
            
            <!-- <button type="submit" class="registerbtn" name="registerbtn">Register</button> -->


            

            <p><i>Already have an account?</i> <a href="./login.php">Log in</a>.</p>


        </div>

        </div>
    </form>


</body>
</html>