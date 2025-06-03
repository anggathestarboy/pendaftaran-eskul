<?php
session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }


require_once "database.php";
$id_eskul = $_GET['id_eskul'];
$sql = "DELETE FROM eskul where id_eskul='$id_eskul'";
if ($db->query($sql)) {
    header("Location: eskul.php");
}

?>