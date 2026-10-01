<?php
session_start();

if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] ==true){
    header('Location: home.php');
    exit;
};

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
require_once __DIR__ . '/DB/database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute(array(
        ':email' => $email
    ));
    $user = $statement->fetch(PDO::FETCH_ASSOC);



    if ( $user && password_verify($password,$user['password']) ){
            $statement = $pdo->prepare("SELECT name FROM users WHERE email = :email");
    $statement->execute(array(
        ':email' => $email
    ));
    $username = $statement->fetch(PDO::FETCH_ASSOC);
    $theName = $username['name'];
        $_SESSION['user'] = [
            'id' => $pdo->lastInsertId(),
            'email' => $email
        ];
        $_SESSION['authenticated']=true;
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $theName
        ];
        header("Location: home.php");
        exit;   
    } else {
        $error = 'Invalid email or password.';
    };
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Tracker Login</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="form-container">
        <form class="form" action="login.php" method="POST">
            <?php if ($error): ?>
            <?php endif; ?>
            <div style=" text-align: center;">
                <p style="font-size: 32px; font-weight: bold;">Login Account</p>
            </div>
            <div class="form-group"> <label for="email" class="form-label">Email address</label><br>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label><br>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div style="color: red; text-align: center;">
                <p><?= htmlspecialchars($error) ?></p>
            </div>
            <p style="font-weight: bold; margin: 0; margin-bottom: 10px; text-align: center;">Don't have an account? <a
                    href="/src/register.php">Create Account</a></p>
            <div class="submit-button-container">
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>