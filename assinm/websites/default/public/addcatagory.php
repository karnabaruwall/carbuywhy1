<?php
// addCategory.php

// Include header
include_once("includes/header.php");

// Your PHP logic for adding categories goes here
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit;
}

// Include database connection code
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];

    // Add your validation and sanitization code here

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO category (name) VALUES (?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $name);

        // Execute the statement
        if ($stmt->execute()) {
            // Category added successfully, redirect to a confirmation page or the category management page
            header("Location: adminCategories.php");
            exit;
        } else {
            // Error occurred, handle it appropriately
            echo "Error: Unable to add category";
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        echo "Error: " . $e->getMessage();
    }

    // Close statement
    $stmt = null;
}

// Close connection
$conn = null;

// Include footer
include_once("includes/footer.php");
?>