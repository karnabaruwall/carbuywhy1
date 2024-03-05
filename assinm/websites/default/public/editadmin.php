<?php
// editAdmin.php

// Include header
include_once("includes/header.php");

// Include database connection code
include 'db_connection.php';

// Initialize variables
$id = "";
$email = "";
$name = "";

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch admin user details from the database
    $sql = "SELECT email, name FROM admin_users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Output data of the row
        $email = $row["email"];
        $name = $row["name"];
    } else {
        echo "Admin user not found";
    }
}

// Check if form is submitted for updating admin user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $name = $_POST["name"];

    // Update admin user details in the database
    $sql = "UPDATE admin_users SET email = :email, name = :name WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Admin user updated successfully";
    } else {
        echo "Error updating record: " . $conn->errorInfo()[2];
    }
}

// Close connection
$conn = null;

// Include footer
include_once("includes/footer.php");
?>