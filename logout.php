<?php 
    session_start();
    session_destroy();
    setcookie('userId', $userId, time() - 86400, '/');
    setcookie('password', $password, time() - 86400, '/');
    setcookie('role', $role, time() - 86400, '/');
    header('Location: home.php');
?>