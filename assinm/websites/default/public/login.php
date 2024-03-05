<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle login form submission
}
?>
<body>
  <div class="login">
    <form method="post" action="login.php">
      <h1>Login</h1>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login">
    </form>
  </div>
</body>
  <style>
.login {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
body {
  background-color: #f6f5f4;
  font-family: 'Oxygen-Regular', sans-serif;
}

form {
  background-color: #fff;
  border: 1px solid #ddd;
  padding: 20px;
  width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="email"],
input[type="password"] {
  border: 1px solid #ddd;
  padding: 10px;
  width: 100%;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #3665f3;
  color: #fff;
  border: 0;
  padding: 10px 20px;
  cursor: pointer;
}
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the email and password from the form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Check if the email and hashed password match a record in the database
  // If they do, log the user in
  // If not, display an error message
}
?>