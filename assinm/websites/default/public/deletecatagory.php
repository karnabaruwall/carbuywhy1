<?php
// deleteCategory.php

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

// Check if the category ID is provided via GET request
if (!isset($_GET['id'])) {
    // Redirect to the category management page or display an error message
    header("Location: adminCategories.php");
    exit;
}

try {
    // Retrieve the category ID
    $categoryId = $_GET['id'];

    // Prepare the SQL statement
    $mysqli = "DELETE FROM category WHERE id=:id";

    // Prepare the statement
    $stmt = $conn->prepare($mysqli);

    // Bind parameters
    $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        // Category deleted successfully, redirect to a confirmation page or the category management page
        header("Location: adminCategories.php");
        exit;
    } else {
        // Error occurred, handle it appropriately
        echo "Error: Unable to delete category";
    }
} catch (PDOException $e) {
    // Handle PDO exceptions
    echo "Error: " . $e->getMessage();
}

// Close statement
$stmt = null;

// Close connection
$conn = null;
?>