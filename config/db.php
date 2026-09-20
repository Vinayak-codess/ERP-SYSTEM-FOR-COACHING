<?php

$conn = mysqli_connect("localhost", "root", "", "erp_system"); 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Database create  Database Name:( erp_system )
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS erp_system");
mysqli_select_db($conn, "erp_system");


// schema folder se saari .sql files run.
$files = glob("schema/*.sql");

foreach ($files as $file) {
    $sql = file_get_contents($file);

    if (mysqli_multi_query($conn, $sql)) {
        while (mysqli_more_results($conn)) {
            mysqli_next_result($conn);
        }
    } else {
        echo "Error in $file : " . mysqli_error($conn);
    }
}

?>
