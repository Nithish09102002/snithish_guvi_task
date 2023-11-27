<?php
$hostname = 'localhost';
$port = 8111;
$username = 'root';
$password = '';
$databasename = 'registerform';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename, $port);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

   
     $chashedPassword = password_hash($cpassword, PASSWORD_DEFAULT);
    
    $result = mysqli_query($mysqli, "INSERT INTO `register` (`username`, `email`, `password`, `cpassword`) VALUES ('$username', '$email', '$password', '$chashedPassword')");


    if ($result) {
        header("Location: login.html");
        exit();
    } else {
        echo "Something went wrong: " . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>
