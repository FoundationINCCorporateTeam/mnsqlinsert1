<?php
// your-php-script.php

// Database connection variables
$dbHost = 'sql300.infinityfree.com';
$dbUsername = 'if0_36213692';
$dbPassword = 'MN4444';
$dbName = 'if0_36213692_mngames1';

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the JSON data from the request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); // convert JSON into array

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO searchdata (search_query) VALUES (is)");
$stmt->bind_param("s", $inputValue);

$inputValue = $input['inputValue'];

// Execute the query
if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
