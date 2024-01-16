<?php

require 'config.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$q = "SELECT COUNT(*) as count from users where username = '$username' and password = '$password'";

$query = mysqli_query($conn,$q);
$array = mysqli_fetch_array($query);

if($array['count']>0){
    $_SESSION['username'] = $username;
    header("location: index.php");
}
else{
    header("location: wrong_credentials.php");
}

?>