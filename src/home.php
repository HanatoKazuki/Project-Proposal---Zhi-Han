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

.box.balance,
.box.income,
.box.expense {
    height: 20vh;
    width: 450px;
}

.box.balance {
    border-bottom: 10px solid lightgreen;
}

.box.income {
    border-bottom: 10px solid rgb(127, 241, 127);
}

.box.expense {
    border-bottom: 10px solid rgb(250, 207, 67);
}

.box {
    transition: transform 0.5s ease;
    box-sizing: border-box;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
}

.box:hover {
    transform: translate(0, -10px);
    transform: scale(1.1);
}

.balanceTitle {
    font-size: 28px;
    font-weight: 1px;
    margin: 0px;
    color: rgba(121, 130, 135);
}

.amount{
    font-size: 28px;
    font-weight: bold;
    margin: 0px;
    color: rgba(10, 57, 51);
}


.selected {
    text-decoration: underline;
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
    font-size: 10px ;
}
</style>

<body>
    <nav class="navbar">
        <div class="navbar-brand"><a href="#"><i class="bi bi-wallet2"></i> Lexus</a></div>
        <ul class="navbar-navigation">
            <li><a class='selected'>Home</a></li>
            <li><a>Wallet</a></li>
            <li><a>Goals</a></li>
            <li><a href="logout.php" id="logoutIcon" title="Logout"><i class="bi bi-door-closed" id=""></i></a></li>
        </ul>
    </nav>
    <center>
        <h1 style='color: rgba(10, 57, 51);'>Welcome Back, <?php echo $_SESSION['user']['name']?>!</h1>
        <p style='color: #656a6b; font-weight: 1px; font-size: 24px;'>Role: <?php echo $_SESSION['user']['role']?></p>
        <p style='color: #656a6b; font-weight: 1px; font-size: 24px'>Have a look at your financial summary.</p>
    </center>
    <div class="container">
        <div class="box balance" id="balance">
            <div class='balanceIcon'></div>
            <div class="balanceContent">
                <p class="balanceTitle">Total Balance</p><br>
                    <p class='amount'>MYR 999,999,999,999
                </p>
            </div>
        </div>
        <div class="box income" id="income">
                <div class='balanceIcon'></div>
                <div class='balanceContent'>
                <p class="balanceTitle">Income</p><br>
                   <p class='amount'> MYR 999,999,999,999
                     </p>
</div>
               
        </div>
        <div class="box expense" id="expense">
            <div class='balanceIcon'></div>
            <div class="balanceContent">
                <p class="balanceTitle">Expense</p><br>
                    <p class='amount'>MYR 999,999,999,999
                </p>
            </div>
        </div>
</body>

</html>