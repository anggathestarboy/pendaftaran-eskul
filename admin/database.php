<?php
    $db = new mysqli("localhost", "root", "", "upk");

    if ($db->connect_error) {
        die("database error");
    }

?>

