<?php
session_start();
require 'connection.php'; // reference connection page

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $user;
        header("Location: ../home.php"); // Redirect to dashboard page
    } else {
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>
