<?php
// editCategory.php

// Include header
include_once("includes/header.php");

// Your PHP logic for editing categories goes here
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
    $categoryId = $_POST['categoryId'];
    $name = $_POST['name'];

    // Add your validation and sanitization code here

    // Prepare the SQL statement
    $sql = "UPDATE category SET name=:name WHERE id=:categoryId";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':categoryId', $categoryId);

        // Execute the statement
        if ($stmt->execute()) {
            // Category updated successfully, redirect to a confirmation page or the category management page
            header("Location: adminCategories.php");
            exit;
        } else {
            // Error occurred, handle it appropriately
            echo "Error: Unable to update category";
        }
    } catch (PDOException $e) {
        // Error occurred, handle it appropriately
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