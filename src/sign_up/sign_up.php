<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "sql111.infinityfree.com";
$username = "if0_37502348";
$password = "sYZaxkBzbMfv";
$dbname = "if0_37502348_dbms_music_db";
echo "Hey there";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "connection error";
    die("Connection failed: " . $conn->connect_error);
}
echo "connected to mysql";
// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    
    
    // Insert data into the database
    
    $sql = "INSERT INTO user (user_name, password, name) VALUES (?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    echo "executing query";
    $stmt->bind_param("sss", $user, $pass, $email); // Change to "sss" for three string parameters
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
