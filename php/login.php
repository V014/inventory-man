<?php
session_start();

// Placeholder for your database connection
$host = 'localhost';
$dbname = 'inventory_db';
$username = 'root';
$password = '';  // Assuming no password for local environment
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        header("Location: dashboard.php"); // Redirect to dashboard page
    } else {
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>
