<?php
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        header('Location: /tests/home.php'.$_GET["path"].'/'.$_SESSION['user']);
    } else {
        header('Location: /tests/Form.php');
    }