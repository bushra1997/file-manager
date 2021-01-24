<?php
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        header('Location: /test5/home.php'.'?users'.'/'.$_SESSION['user']);
    } else {
        header('Location: /test5/form.php');
    }