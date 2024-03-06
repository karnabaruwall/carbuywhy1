<?php
// index.php

// Include header
// include_once(__DIR__ . "/header.php");

//TODO - Include the content file commenting out 
// include_once(__DIR__ . "/content.php");

// Database configuration
$servername = "localhost"; // Replace with your server name
$username = "student"; // Replace with your MySQL username
$password = "student"; // Replace with your MySQL password
$dbname = "ijdb"; // Replace with your MySQL database name

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch the 10 most recently added auctions
    $sql = "SELECT * FROM auctions ORDER BY created_at DESC LIMIT 10";
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->rowCount() > 0) {
        // Output data of each row
        foreach ($result as $row) {
            // Display the auction details
            echo "<li>";
            echo "<img src='images/{$row['image']}' alt='{$row['title']}'>";
            echo "<article>";
            echo "<h2>{$row['title']}</h2>";
            echo "<h3>{$row['category']}</h3>";
            echo "<p>{$row['description']}</p>";
            echo "<p class='price'>Current bid: £{$row['current_bid']}</p>";
            echo "<a href='#' class='more auctionLink'>More &gt;&gt;</a>";
            echo "</article>";
            echo "</li>";
        }
    } else {
        echo "No auctions found";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Include footer
//TODO - Include the footer file commenting out
// include_once("includes/footer.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Carbuy Auctions</title>
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

			<form action="#">
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
		<img src="banners/1.jpg" alt="Banner" />

		<main>
			<h1>Latest Car Listings / Search Results / Category listing</h1>
			<ul class="carList">
				<li>
					<img src="car.png" alt="car name">
					<article>
						<h2>Car model and make</h2>
						<h3>Car category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>

						<p class="price">Current bid: £1234.00</p>
						<a href="#" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
				<li>
					<img src="car.png" alt="car name">
					<article>
						<h2>Car model and make</h2>
						<h3>Car category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>

						<p class="price">Current bid: £2000</p>
						<a href="#" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
				<li>
					<img src="car.png" alt="car name">
					<article>
						<h2>Car model and make</h2>
						<h3>Car category</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>

						<p class="price">Current bid: £3000</p>
						<a href="#" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
			</ul>

			<hr />

			<h1>Car Page</h1>
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
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus enim.</p>


					</section>

					<section class="reviews">
						<h2>Reviews of User.Name </h2>
						<ul>
							<li><strong>John said </strong> great car seller! Car was as advertised and delivery was quick <em>29/01/2024</em></li>
							<li><strong>Dave said </strong> disappointing, Car was slightly damaged and arrived slowly.<em>22/12/2023</em></li>
							<li><strong>Susan said </strong> great value but the delivery was slow <em>22/07/2023</em></li>

						</ul>

						<form>
							<label>Add your review</label> <textarea name="reviewtext"></textarea>

							<input type="submit" name="submit" value="Add Review" />
						</form>
					</section>
					</article>

					<hr />
					<h1>Sample Form</h1>

					<form action="#">
						<label>Text box</label> <input type="text" />
						<label>Another Text box</label> <input type="text" />
						<input type="checkbox" /> <label>Checkbox</label>
						<input type="radio" /> <label>Radio</label>
						<input type="submit" value="Submit" />

					</form>



			<footer>
				&copy; Carbuy 2024
			</footer>
		</main>
	</body>
</html>