<?php 
    session_start();
?>
<html lang="en">
<head>
    <title>Log in</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>


<form action="./Controls/loginControl.php" method="post">

    <div class="container">
        <div style="text-align: center;">
            <?php
                if(isset($_SESSION['status'])){
                    echo $_SESSION['status'];
                }
            ?>
        </div>
        <br>
        <label for="uname"><b>Username</b></label>
        <input type="text"  name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password"  name="psw" required>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label><br>
        <button type="submit" name="btnLogin">Login</button><br>


        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw"><a href="#">I forget my password</a></span>
    </div>
</form>

</body>
</html>
