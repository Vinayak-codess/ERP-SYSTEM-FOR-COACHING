<?php

$conn = mysqli_connect("localhost", "root", "", "erp system");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$course_id = $_POST['course_id'];
$batch_id = $_POST['batch_id'];
$admission_date = $_POST['admission_date'];

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