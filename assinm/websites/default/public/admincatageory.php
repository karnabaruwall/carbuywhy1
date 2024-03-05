<?php
// adminCategories.php

// Include header
include_once("includes/header.php");

// Your PHP logic for managing categories goes here
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

try {
    // Retrieve all categories from the database
    $sql = "SELECT * FROM category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any categories
    if ($categories) {
        // Display each category
        foreach ($categories as $row) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
            echo "<a href='editCategory.php?id=" . $row["id"] . "'>Edit</a> | ";
            echo "<a href='deleteCategory.php?id=" . $row["id"] . "'>Delete</a><br><br>";
        }
    } else {
        echo "No categories found.";
    }
} catch (PDOException $e) {
    // Handle PDO exceptions
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;

// Include footer
include_once("includes/footer.php");
?>