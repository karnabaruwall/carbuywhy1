<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        echo $_SESSION["name"] . ".<br>";
        echo $_SESSION["address"];

    </body>
</html>