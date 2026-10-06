<?php
$path = parse_url($_SERVER['REQUEST_URI'])['path'];
switch ($path) {
    case '/src/home':
        require 'home.php';
        break;
    case '/src/login':
        require 'login.php';
        break;
    case '/src/register':
        require 'register.php';
        break;
    case '/src/wallet';
        require 'wallet.php';
        break;
    default:
        require '404.php';
        break;
}

?>