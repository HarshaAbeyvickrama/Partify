<?php

include("contactus_dbconnect.php");
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $messege=$_REQUEST['messege'];
$query=mysqli_query($db_connect,
"INSERT INTO con_user(name,email,phone,messege) VALUES('$name','$email','$phone','$messege')") or die(mysqli_error($db_connect));
mysqli_close($db_connect);
header("location:contactus.php?note=success");
?>