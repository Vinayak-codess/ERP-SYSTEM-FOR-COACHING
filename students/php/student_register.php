<?php
require "../../config/db.php";

// JSON body read karo
$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"];
$phone = $data["phone"];
$email = $data["email"];
$password = $data["password"];
$course_id = $data["course_id"];
$batch_id = $data["batch_id"];
$admission_date = $data["admission_date"];

$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO student
(name, Phone_number, Email, Password, course_id, batch_id, admission_date)
VALUES
('$name','$phone','$email','$hashed','$course_id','$batch_id','$admission_date')";

if (mysqli_query($conn, $sql)) {
    echo "Student registered successfully";
} else {
    echo mysqli_error($conn);
}

mysqli_close($conn);

