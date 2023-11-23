<?php
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['user_name']);
    header('location: /../public/index.php');
?>
