<?php
// Start the session
session_start();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle sign-up form submission
}
?>
<?php
 require 'datacon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... other meta tags and stylesheets... -->
    
    <title>Sign Up </title>
</head>
<body>
    <!-- Include main layout from index.php -->
    

    <!-- <h1>Create an Account</h1> -->
    
    <form method="post" action="insertdata.php">
    <h1>SIGN UP</h1>
    <h2>Create an Account</h2>
        <!-- Form fields go here -->
        <label for="username">Username:</label>
        <input type="text" name="username" required />
        <br/>
        <label for="email">Email:</label>
        <input type="email" name="email" required />
        <br/>
        <label for="password">Password:</label>
        <input type="password" name="password" required />
        <br/>
        <button type="submit" value="submit" name="submit"><a href="index.php">Submit</a></button>
    </form>
    


</body>
</html>
<style>
  /* Reset default margin and padding */

body{
  font-family: 'Oxygen-Regular', sans-serif;

}
/* Apply basic styles to the form and its elements */
form {
    max-width: 300px;
    margin: 20px auto;
    padding: 20px;
    background: #f4f7f6;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label,
input {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #45a049;
}

</style>
