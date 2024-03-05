<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="vjee.css">
</head>

<body>
	<header>
		<h1><span class="C">C</span>
			<span class="a">a</span>
			<span class="r">r</span>
			<span class="b">b</span>
			<span class="u">u</span>
			<span class="y">y</span>
		</h1>

		<form action="index.php" method="post">
			<input type="text" name="search" placeholder="Search for a car" />
			<input type="submit" name="submit" value="Search" />
			<!-- //if session set login register need to be hidden -->
			<?php
			if (isset($_SESSION['admin_logged'])) {
				echo $_SESSION['admin_logged'];
			} elseif (isset($_SESSION['usr_logged'])) {
				echo $_SESSION['usr_logged'];
			} else {
				echo '<a href="login.php" type="submit" name="log_ni" class="re_di">Login</a>';
				echo '<a href="register.php" type="submit" name="sign_pu" class="re_di">Register</a>';
			}
			?>
			<!-- //only session user email need to be displayed  -->
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
			<div class="drp">
				<li><a class="categoryLink" href="#">More</a></li>
				<?php
				if (isset($_SESSION['usr_logged'])) { ?>
					<div class="drp_ctn">
						<a href="logout.php">Logout</a>
						<a href="">link1</a>
						<a href="">link 3</a>
					</div>
					<?php
				} ?>
				<?php
				if (isset($_SESSION['admin_logged'])) { ?>
					<div class="drp_ctn">
						<a href="logout.php">Logout</a>
						<a href="adminRegister.php">Add Admin</a>
						<a href="">link 3</a>
					</div>
					<?php
				} ?>

			</div>


		</ul>
	</nav>

</body>

</html>