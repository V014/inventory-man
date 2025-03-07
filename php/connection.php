<?php
// Placeholder for database connection
$host = 'localhost';
$dbname = 'inventory-man';
$username = 'root';
$password = '';

try {
    // Creating a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Setting the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully!";
} catch (PDOException $e) {
    // Display error message if the connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>