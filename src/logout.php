<?php 
session_start();
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] ==true){
    unset($_SESSION['authenticated']);
    header("Location: /src/login");
    exit;
};

?>