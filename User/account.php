<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }
    include('../Includes/header.php');
    
?>
    <div class="container">
        <?php 
            include('./nav.php'); 
            include('../Includes/profile.php');    
        ?>
    </div>
    <?php include('../Includes/footer.php'); ?>
</body>
</html>
