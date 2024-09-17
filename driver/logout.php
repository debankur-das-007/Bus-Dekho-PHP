<?php
    session_start();
    unset($_SESSION['driver']);
    session_destroy();
    header("Location: ./index.php");
?>