 <?php
// addAdmin.php

// Include header
// include_once("includes/header.php");

// Your PHP logic for adding admin users goes here
// Include database connection code
include 'datacon.php';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // Assuming password is hashed for security
    $name = $_POST['name'];

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO admin_users (email, password, name) VALUES (?, ?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $name);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Admin user added successfully";
        } else {
            echo "Error: Unable to add admin user";
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
// include_once("includes/footer.php");
?> 



<!-- chat -->
<!-- <?php
session_start();

// Check if the user is logged in and is an admin
// if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
//     header("Location: login.php");
//     exit;
// }

// // Include database connection or any necessary functions
// // include_once "db_connection.php"; // Include your database connection file if needed

// // Logic to add a new admin
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve form data
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $name = $_POST["name"];
    
    // Perform validation, e.g., check if email is valid, etc.
    
    // Add new admin to the database
    // Replace this with your actual database insertion logic
    // $sql = "INSERT INTO admins (email, password, name) VALUES ('$email', '$password', '$name')";
    // $result = mysqli_query($connection, $sql);
    
    // Redirect to manageAdmins.php after adding admin
    // header("Location: manageAdmins.php");
//     exit;
// }
?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Admin - Carbuy Auctions</title>
    <link rel="stylesheet" href="sac.css" />
    <link rel="stylesheet" href="vje.css" />
    <link rel="stylesheet" href="customstyle.css" />
</head>
<body>
<header>
    <h1><span class="C">C</span>
        <span class="a">a</span>
        <span class="r">r</span>
        <span class="b">b</span>
        <span class="u">u</span>
        <span class="y">y</span></h1>
</header>

<nav>
    <ul>
        <li><a href="adminCategories.php" class="categoryLink">Manage Categories</a></li>
        <li><a href="manageAdmins.php" class="categoryLink">Manage Admins</a></li>
        <li><a href="logout.php" class="categoryLink">Logout</a></li>
    </ul>
</nav>

<main>
    <h1>Add Admin</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        
        <input type="submit" value="Add Admin">
    </form>
</main>

<footer>
    &copy; Carbuy 2024
</footer>

</body>
</html>
