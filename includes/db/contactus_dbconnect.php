<?php

$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="contactus";

$db_connect = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die();

if(mysqli_connect_error())
{
    echo" Failed to connect to MYSQL:".mysqli_connect_error();
}