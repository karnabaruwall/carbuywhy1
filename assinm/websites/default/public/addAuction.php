<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carbuy Auctions - Auction Title</title>
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

    <form action="search.php" method="GET">
        <input type="text" name="search" placeholder="Search for a car" />
        <input type="submit" name="submit" value="Search" />
    </form>
</header>

<nav>
    <ul>
        <li><a class="categoryLink" href="#">Estate</a></li>
        <li><a class="categoryLink" href="#">Electric</a></li>
        <li><a class="categoryLink" href="#">Coupe</a></li>
        <li><a class="categoryLink" href="#">Saloon</a></li>
        <li><a class="categoryLink" href="#">4x4</a></li>
        <li><a class="categoryLink" href="#">Sports</a></li>
        <li><a class="categoryLink" href="#">Hybrid</a></li>
        <li class="dropdown">
            <a href="#" class="dropbtn categoryLink">More</a>
            <ul class="dropdown-content">
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a class="categoryLink" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a class="categoryLink"  href="login.php">Login</a></li>
                    <li><a class="categoryLink" href="signup.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
</nav>

<main>
    <h1>Auction Title</h1>
    <article class="car">
        <img src="car.png" alt="car name">
        <section class="details">
            <h2>Car model and make</h2>
            <h3>Car category</h3>
            <p>Auction created by <a href="#">User.Name</a></p>
            <p class="price">Current bid: £4000</p>
            <time>Time left: 8 hours 3 minutes</time>
            <form action="#" class="bid">
                <input type="text" name="bid" placeholder="Enter bid amount" />
                <input type="submit" value="Place bid" />
            </form>
        </section>
        <section class="description">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.
            </p>
        </section>
        <section class="reviews">
            <h2>Reviews of User.Name</h2>
            <ul>
                <li><strong>John said </strong> great car seller! Car was as advertised and delivery was quick <em>29/01/2024</em></li>
                <li><strong>Dave said </strong> disappointing, Car was slightly damaged and arrived slowly.<em>22/12/2023</em></li>
                <li><strong>Susan said </strong> great value but the delivery was slow <em>22/07/2023</em></li>
            </ul>
            <form action="#" method="POST">
                <label>Add your review</label> <textarea name="reviewtext"></textarea>
                <input type="submit" name="submit" value="Add Review" />
            </form>
        </section>
    </article>
</main>

<footer>
    &copy; Carbuy 2024
</footer>
</body>
</html>



<!-- <form action="addAuction.php" method="post">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>
    
    <label for="category">Category:</label><br>
    <select id="category" name="category">
        <option value="1">Category 1</option>
        <option value="2">Category 2</option>
        <option value="3">Category 3</option>
        <!-- Add more options as needed -->
    <!-- </select><br>
    
    <label for="auction_end_date">Auction End Date:</label><br>
    <input type="text" id="auction_end_date" name="auction_end_date"><br>
    
    <input type="submit" value="Submit">
</form>  -->

<!-- <?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "auction_db";

// $conn = new mysql($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get 10 upcoming auctions
function getUpcomingAuctions($conn) {
    $sql = "SELECT * FROM auctions ORDER BY end_date ASC LIMIT 10";
    $result = $conn->query($sql);
    $auctions = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $auctions[] = $row;
        }
    }
    return $auctions;
}

// Function to get auctions in a specific category
function getAuctionsByCategory($conn, $category) {
    $sql = "SELECT * FROM auctions WHERE category = '$category'";
    $result = $conn->query($sql);
    $auctions = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $auctions[] = $row;
        }
    }
    return $auctions;
}

// Function to get reviews for a specific auction
function getAuctionReviews($conn, $auction_id) {
    $sql = "SELECT * FROM reviews WHERE auction_id = '$auction_id'";
    $result = $conn->query($sql);
    $reviews = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }
    return $reviews;
}

// Display auctions
function displayAuction($auction) {
    // HTML code to display auction details
    echo "<div class='auction'>";
    echo "<h2>" . $auction['title'] . "</h2>";
    echo "<p>" . $auction['description'] . "</p>";
    echo "<p>End Date: " . $auction['end_date'] . "</p>";
    echo "<a class='more auctionLink' href='auction.php?id=" . $auction['id'] . "'>More</a>";
    echo "</div>";
}

// Display review form
function displayReviewForm($auction_id) {
    // HTML code for review form
    echo "<form action='add_review.php' method='post'>";
    echo "<textarea name='reviewText'></textarea><br>";
    echo "<input type='hidden' name='auction_id' value='$auction_id'>";
    echo "<input type='submit' name='submit' value='Submit Review'>";
    echo "</form>";
}

// Display bid form
function displayBidForm($auction_id) {
    // HTML code for bid form
    echo "<form action='place_bid.php' method='post'>";
    echo "Bid: <input type='text' name='bid'><br>";
    echo "<input type='hidden' name='auction_id' value='$auction_id'>";
    echo "<input type='submit' name='submit' value='Place Bid'>";
    echo "</form>";
}

// Display 10 upcoming auctions on index.php
$upcoming_auctions = getUpcomingAuctions($conn);
foreach ($upcoming_auctions as $auction) {
    displayAuction($auction);
}

// Display auctions in a specific category on category pages
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $auctions_in_category = getAuctionsByCategory($conn, $category);
    foreach ($auctions_in_category as $auction) {
        displayAuction($auction);
    }
}

// Display auction details and reviews on auction pages
if (isset($_GET['auction_id'])) {
    $auction_id = $_GET['auction_id'];
    $auction_details = getAuctionDetails($conn, $auction_id);
    if ($auction_details) {
        displayAuction($auction_details);
        $auction_reviews = getAuctionReviews($conn, $auction_id);
        foreach ($auction_reviews as $review) {
            // Display review details
        }
        if (isset($_SESSION['user_id'])) {
            displayReviewForm($auction_id);
            displayBidForm($auction_id);
        }
    } else {
        echo "Auction not found.";
    }
}

// Close connection
$conn->close();
?> -->
