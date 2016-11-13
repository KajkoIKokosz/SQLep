<?php
session_start();
if ($_SERVER['HTTP_REFERER'] == 'http://localhost:1337/sqlep/src/index.php') {
    $_SESSION['user_id'] = null;
    session_unset();
    header('Location: index.php');
}

