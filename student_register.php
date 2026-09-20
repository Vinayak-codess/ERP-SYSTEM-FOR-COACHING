<?php

$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die(" connection failed: " . mysqli_connect_error());
}

$db = "erp_system";
$create_db = "CREATE DATABASE IF NOT EXISTS $db";
if (!mysqli_query($conn, $create_db)) {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_select_db($conn, $db);

$create_table = "CREATE TABLE IF NOT EXISTS student (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    Phone_number VARCHAR(15) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    course_id INT(11) NOT NULL,
    batch_id INT(11) NOT NULL,
    admission_date DATE NOT NULL
)";

if (!mysqli_query($conn, $create_table)) {
    echo "Error creating table: " . mysqli_error($conn);
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method";
    mysqli_close($conn);
    exit;
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'] ?? '';    
$course_id = $_POST['course_id'];
$batch_id = $_POST['batch_id'];
$admission_date = $_POST['admission_date'];




if ($name === '' || $phone === '' || $email === '' || $password === '' || $confirm_password === '' || $course_id === '' || $batch_id === '' || $admission_date === '') {
    echo "Please fill in all required fields.";
    mysqli_close($conn);
    exit;
}

if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    mysqli_close($conn);
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO student 
        (name, Phone_number, Email, Password, course_id, batch_id, admission_date)
        VALUES 
        ('$name', '$phone', '$email', '$hashed_password', '$course_id', '$batch_id', '$admission_date')";

if (mysqli_query($conn, $sql)) {
    echo "Student registered successfully";

} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
