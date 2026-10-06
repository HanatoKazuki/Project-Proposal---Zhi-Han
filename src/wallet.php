<?php
session_start();
if (empty($_SESSION['authenticated'])) {
    header('Location: /src/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<style>
body,
html {
    margin: 0;
}

.navbar-brand {
    display: flex;
    align-items: center;
    padding: 20px;
}

.navbar-brand a {
    text-decoration: none;
    font-size: 32px;
    color: rgba(10, 57, 51);
}

.navbar {
    background-color: white;
    /*rgb(0, 119, 255)*/
    display: flex;
    justify-content: space-between;
}

.navbar-navigation {
    list-style: none;
    display: flex;
    flex-direction: row;
}

.navbar-navigation li {
    margin-right: 10px;
    font-size: 24px;
    padding: 10px 20px;
    color: black;
}

.navbar-navigation a {
    transition: 0.5s;
}

.navbar-navigation a:hover {
    color: white;
    background-color: black;
    padding: 10px 20px;
    border-radius: 10px;
}

#logoutIcon {
    color: black;
}

#logoutIcon:hover {
    color: white;
    background-color: black;
    border-radius: 10px;
}

.container {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 50px;
    margin-top: 50px;
}

.box.balance {
    height: 20vh;
}

.group>.balance {
    flex: 1;
}

.box.balance {
    background: linear-gradient(to right, white, rgba(154, 206, 106, 0.2))
}


.box {
    transition: transform 0.5s ease;
    box-sizing: border-box;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    width: 100%;
}


.balanceTitle {
    font-size: 28px;
    font-weight: 1px;
    margin: 0px;
    color: rgba(121, 130, 135);
}

.amount {
    font-size: 28px;
    font-weight: bold;
    margin: 0px;
    color: rgba(10, 57, 51);
}

.navbar a {
    color: black;
    text-decoration: none;
}


body {
    background-image: url(./images/home-background.png);
    background-size: cover;
    /*makes the image strecthed out to cover whole page*/
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    height: 90vh;
    scroll-behavior: smooth;
}

.balanceIcon {
    font-size: 10px;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}

.group {
    background-color: #FFFAFA;
    border-radius: 10px;
    display: flex;
    width: 80%;
    height: 100%;
}

.sidebar {
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    padding: 20px;
    border-right: 1px solid rgba(101, 106, 107, 0.4);
    width: 100%;
    max-width: 200px;
    align-items: center;
    color: #656a6b;
}



.wallet {
    color: rgba(10, 57, 51);
    background-color: rgba(154, 206, 106, 0.2);
    padding: 0px 50px;
    border-radius: 10px;
}

.transactions {
    transition: 0.5s ease;
}

.transactions:hover {
    color: rgba(10, 57, 51);
    background-color: rgba(154, 206, 106, 0.2);
    border-radius: 10px;
    padding: 5px 30px;
    margin: 10px;
    transform: scale(1.1)
}

.funds {
    transition: 0.5s ease;
}

.funds:hover {
    color: rgba(10, 57, 51);
    background-color: rgba(154, 206, 106, 0.2);
    border-radius: 10px;
    padding: 0px 30px;
    margin: 10px;
    transform: scale(1.1)
}

.sidebar a {
    text-decoration: none;
    color: rgba(10, 57, 51);
}

.text {
    padding: 20px;
    font-size: 1.2rem
}

.text h1 {
    color: rgba(10, 57, 51);
}

.text p {
    color: rgba(10, 57, 51);
}

a {
    text-decoration: none;
}

.addFund p {
    margin: 0;
}

.removeFund p {
    margin: 0;
}

.balanceBtns {
    display: flex;
    gap: 10px;
    justify-content: center;
    align-items: center;
}

.balanceBtns a {
    color: rgba(10, 57, 51);
}

.balance {
    display: flex;
    flex-direction: column;
}

</style>

<body>
    <nav class="navbar">
        <div class="navbar-brand"><a href="#"><i class="bi bi-wallet2"></i> Lexus</a></div>
        <ul class="navbar-navigation">
            <li><a href='/src/home'>Home</a></li>
            <li><a href='#' style='text-decoration: underline;' class='selected'>Wallet</a></li>
            <li><a href='#'>Goals</a></li>
            <li><a href="logout.php" id="logoutIcon" title="Logout"><i class="bi bi-door-closed" id=""></i></a></li>
        </ul>
    </nav>
</body>
<div class="container">
    <div class="group">
        <div class="sidebar">
            <a href='#' class='wallet'>
                <p> <i class="bi bi-wallet2"></i> Wallet</p>
            </a> <a href='#' class='transactions'>
                <p>Transactions</p>
            </a> <a href='#' class='funds'>
                <p>Add Funds</p>
            </a>
        </div>
        <div class='balance'>
            <div class='text'>
                <h1>My Wallet</h1>
                <p>Manage your money, track your spending, and reach your goals.</p>
                <div class="box balance" id="balance">
                    <div class="balanceContent">
                        <p class="balanceTitle">Total Balance</p><br>
                        <p class='amount'>MYR 999,999,999,999
                        </p>
                    </div>
                </div>
            </div>
            <div class='balanceBtns'>
                <a href="#" class='addFund'>
                    <p>Add Funds</p>
                </a> <a href="#" class='removeFund'>
                    <p>Remove Funds</p>
                </a>
            </div>
        </div>
    </diV>
</div>

</html>