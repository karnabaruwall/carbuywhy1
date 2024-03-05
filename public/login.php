<?php
require 'header.php';
require 'datacon.php';
if (isset($_POST['log_in'])) {
	$e_ail = $pa_sword = $catego = $pass_bord = "";
	if (isset($_POST['ema_li'])) {
		$e_ail = $_POST["ema_li"];
	} else {
		$e_ail = -9;
	}
	if (isset($_POST['pass_ord'])) {
		$pa_sword = $_POST["pass_ord"];
	} else {
		$pa_sword = -9;
	}
	if (isset($_POST['cat_login'])) {
		$catego = $_POST['cat_login'];
	} else {
		$catego = -9;
	}
	if ($catego == "Adm_ni") {
		$dat_r = $Connection->prepare('SELECT email FROM Admin WHERE email=:e_ali');
		$usr_criteria = [
			':e_ali' => $e_ail
		];
		$dat_r->execute($usr_criteria);
		$resul_t = $dat_r->fetch();
		if ($resul_t != 0) {
			$dat_r = $Connection->prepare('SELECT email FROM Admin WHERE email=:e_ali');
			$usr_criteria = [
				':e_ali' => $e_ail
			];
			$dat_r->execute($usr_criteria);
			$resul_t = $dat_r->fetch();

			if ($resul_t != 0) {
				$pas_a = $Connection->prepare('SELECT password FROM Admin where email=:e_ali');
				$pass_em_criter = [
					':e_ali' => $e_ail
				];
				$pas_a->execute($pass_em_criter);
				$resul_t_pass = $pas_a->fetchAll();
				foreach ($resul_t_pass as $usr_data) {
					$database_pass_bord = $usr_data['password'];
				}
				if (password_verify($pa_sword, $database_pass_bord)) {
					$_SESSION['admin_logged'] = $e_ail;
					echo "<script>window.location.href = 'index.php';</script>";
				} else {
					echo 'wrong password';
				}
			} else {
				echo 'email doesnot exist';
			}
		}
	} else {
		$dat_r = $Connection->prepare('SELECT email FROM user WHERE email=:e_ali');
		$usr_criteria = [
			':e_ali' => $e_ail
		];
		$dat_r->execute($usr_criteria);
		$resul_t = $dat_r->fetch();

		if ($resul_t != 0) {
			// echo 'hello';

			$pas_a = $Connection->prepare('SELECT password FROM user where email=:e_ali');
			$pass_em_criter = [
				':e_ali' => $e_ail
			];
			$pas_a->execute($pass_em_criter);
			$resul_t_pass = $pas_a->fetchAll();
			foreach ($resul_t_pass as $usr_data) {
				$database_pass_bord = $usr_data['password'];
			}
			if (password_verify($pa_sword, $database_pass_bord)) {
				$_SESSION['usr_logged'] = $e_ail;
				echo "<script>window.location.href = 'index.php';</script>";

			} else {
				echo 'wrong password';
			}
		} else {
			echo 'email doesnot exist';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="buy.css">
	<link rel="stylesheet" href="ok.css">
</head>

<body>
	<main>
		<div class="log_body">
			<div class="log_hed">
				<h1>LOGIN</h1>
			</div>
			<div class="log_bod">
				<form action="login.php" method="post">
					<label for="email">Email:</label><br>
					<input type="email" name="ema_li"><br>
					<label for="password">Password:</label><br>
					<input type="password" name="pass_ord"><br>
					<label for="adminselec_t">Login Category</label>
					<select name="cat_login" class="cat_login">
						<option value="Adm_ni" class="cat_login" name="Adm_mem">Admin</option>
						<option value="memb_re" class="cat_login" name="Adm_mem">Member</option>
					</select>
					<div class="log_err">
						<a href="">Forgot password?</a>
						<a href="register.php">Create new account</a><br>
						<br>
					</div>
					<button name="log_in" type='submit' class='bt_n'>LOGIN</button>
				</form>
			</div>
		</div>
		<?php


		?>
		<h1>Latest Car Listings / Search Results / Category listing</h1>
		<ul class="carList">
			<li>
				<img src="car.png" alt="car name">
				<article>
					<h2>Car model and make</h2>
					<h3>Car category</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet
						dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin
						nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex
						nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in
						sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis,
						facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum.
						Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam.
						Integer in tempus enim.</p>

					<p class="price">Current bid: £1234.00</p>
					<a href="#" class="more auctionLink">More &gt;&gt;</a>
				</article>
			</li>
			<li>
				<img src="car.png" alt="car name">
				<article>
					<h2>Car model and make</h2>
					<h3>Car category</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet
						dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin
						nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex
						nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in
						sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis,
						facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum.
						Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam.
						Integer in tempus enim.</p>

					<p class="price">Current bid: £2000</p>
					<a href="#" class="more auctionLink">More &gt;&gt;</a>
				</article>
			</li>
			<li>
				<img src="car.png" alt="car name">
				<article>
					<h2>Car model and make</h2>
					<h3>Car category</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet
						dolor sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin
						nec iaculis nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex
						nec, scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in
						sapien non erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis,
						facilisis porta tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum.
						Aliquam sed arcu vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam.
						Integer in tempus enim.</p>

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
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales ornare purus, non laoreet dolor
					sagittis id. Vestibulum lobortis laoreet nibh, eu luctus purus volutpat sit amet. Proin nec iaculis
					nulla. Vivamus nec tempus quam, sed dapibus massa. Etiam metus nunc, cursus vitae ex nec,
					scelerisque dapibus eros. Donec ac diam a ipsum accumsan aliquet non quis orci. Etiam in sapien non
					erat dapibus rhoncus porta at lorem. Suspendisse est urna, egestas ut purus quis, facilisis porta
					tellus. Pellentesque luctus dolor ut quam luctus, nec porttitor risus dictum. Aliquam sed arcu
					vehicula, tempor velit consectetur, feugiat mauris. Sed non pellentesque quam. Integer in tempus
					enim.</p>


			</section>

			<section class="reviews">
				<h2>Reviews of User.Name </h2>
				<ul>
					<li><strong>John said </strong> great car seller! Car was as advertised and delivery was quick
						<em>29/01/2024</em>
					</li>
					<li><strong>Dave said </strong> disappointing, Car was slightly damaged and arrived
						slowly.<em>22/12/2023</em></li>
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

	</main>
	<footer>
		&copy; Carbuy 2024
	</footer>
</body>

</html>