<?php
require 'header.php';
require 'datacon.php';
if (isset($_POST['log_ut'])) {

    $_SESSION = array();
    echo "<script>window.location.href = 'index.php';</script>";
    session_destroy();
} 
if (isset($_POST['canc_logut'])) {
    echo "<script>window.location.href = 'index.php';</script>";
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
    <head>
        <div class="logot_hed">
            <h1>Logout</h1>
        </div>
    </head>
	<main>
		<div class="logot_body">			
            <form action="logout.php" method="post">
                <label for="logout">DO YOU SURE WANT TO LOGOUT ?</label>
                <button name="canc_logut" type='submit'class='bt_n1' >NO</button>
                <button name="log_ut" type='submit' class='bt_n'>YES</button>                
			</form>
		</div>
	</main>	
</body>

</html>