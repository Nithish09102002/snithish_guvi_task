<?php
header('Content-Type: application/json'); // Set the content type to JSON

$hostname = 'localhost';
$port = 8111;
$username = 'root';
$password = '';
$databasename = 'registerform';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename, $port);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $bloodGroup = $_POST['bloodGroup'];
    $phone = $_POST['phone'];

  
    $sql = "INSERT INTO profile (name, dob, age, bloodGroup, phone) VALUES ('$name', '$dob', '$age', '$bloodGroup', '$phone')";

    if ($mysqli->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Profile saved successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save profile: " . $mysqli->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

$mysqli->close();
?>
