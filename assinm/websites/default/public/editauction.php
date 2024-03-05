<!-- <?php
// editAuction.php

// Include header
// include_once("includes/header.php");

// Your PHP logic for editing auctions goes here
// Start the session
// session_start();

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to the login page if not logged in
//     header("Location: login.php");
//     exit;
// }

// Include database connection code
// include 'db_connection.php';

// // Check if the auction ID is provided via GET request
// if (!isset($_GET['id'])) {
//     // Redirect to the homepage or display an error message
//     header("Location: index.php");
//     exit;
// }

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve form data
//     $auctionId = $_GET['id'];
//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     $category = $_POST['category'];
//     $endDate = $_POST['endDate'];

    // Add your validation and sanitization code here

    // Prepare the SQL statement
//     $sql = "UPDATE auction SET title=?, description=?, categoryId=?, endDate=? WHERE id=? AND userId=?";

//     try {
//         // Prepare the statement
//         $stmt = $conn->prepare($sql);

//         // Bind parameters
//         $stmt->bindParam(1, $title);
//         $stmt->bindParam(2, $description);
//         $stmt->bindParam(3, $category);
//         $stmt->bindParam(4, $endDate);
//         $stmt->bindParam(5, $auctionId);
//         $stmt->bindParam(6, $_SESSION['user_id']);

//         // Execute the statement
//         if ($stmt->execute()) {
//             // Auction updated successfully, redirect to a confirmation page or the auction details page
//             header("Location: auctionDetails.php?id=" . $auctionId);
//             exit;
//         } else {
//             // Error occurred, handle it appropriately
//             echo "Error: Unable to update auction";
//         }
//     } catch (PDOException $e) {
//         // Error occurred, handle it appropriately
//         echo "Error: " . $e->getMessage();
//     }

//     // Close statement
//     $stmt = null;
// }

// Close connection
// $conn = null;

// // Include footer
// include_once("includes/footer.php");
// ?> -->







<!-- chat -->

//<?php 
// session_start(); 

// Check if the user is logged in
// Replace this with your actual authentication logic
// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit;
// }

// Check if auction ID is provided in the URL
// if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
//     // Redirect to index page if ID is not provided or not numeric
//     header("Location: index.php");
//     exit;
// }

// Assume you have a function to retrieve auction details from the database by ID
// Replace this with your actual database retrieval logic
// $auction_id = $_GET['id'];
// $auction = array(
//     'id' => $auction_id,
//     'title' => 'Sample Auction', // Replace with actual auction title
//     'description' => 'Lorem ipsum dolor sit amet.', // Replace with actual auction description
//     'category' => 'Sample Category', // Replace with actual auction category
//     'end_date' => '2024-03-31 23:59:59' // Replace with actual auction end date
// );

// // Check if the logged-in user is the creator of the auction
// // Replace this with your actual logic to check if the user is the creator of the auction
// if ($_SESSION['user']['id'] !== $auction['creator_id']) {
//     // Redirect to index page if the logged-in user is not the creator of the auction
//     header("Location: index.php");
//     exit;
// }

// Check if form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Validate form data
//     $title = $_POST["title"];
//     $description = $_POST["description"];
//     $category = $_POST["category"];
//     $end_date = $_POST["end_date"];

    // Update auction details in the database
    // Replace this with your actual database update logic
    // updateAuction($auction_id, $title, $description, $category, $end_date);

    // Redirect to auction page after updating auction details
//     header("Location: auction.php?id=" . $auction_id);
//     exit;
// }
// ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Auction - Carbuy Auctions</title>
    <link rel="stylesheet" href="sac.css">
    <link rel="stylesheet" href="vje.css">
    <link rel="stylesheet" href="customstyle.css">
</head>
<body>
    <header>
        <h1><span class="C">C</span><span class="a">a</span><span class="r">r</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php" class="categoryLink">Home</a></li>
            <li><a href="logout.php" class="categoryLink">Logout</a></li>
        </ul>
    </nav>

    <main>
        <h1>Edit Auction</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $auction_id); ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($auction['title']); ?>" required><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required><?php echo htmlspecialchars($auction['description']); ?></textarea><br><br>
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="Sample Category">Sample Category</option> <!-- Replace with actual category options -->
            </select><br><br>
            <label for="end_date">End Date:</label>
            <input type="datetime-local" id="end_date" name="end_date" value="<?php echo date('Y-m-d\TH:i', strtotime($auction['end_date'])); ?>" required><br><br>
            <input type="submit" value="Save Changes">
        </form>
    </main>

    <footer>
        &copy; Carbuy 2024
    </footer>
</body>
</html>
