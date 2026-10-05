<?php
session_start();
$error = '';  

if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] ==true){
    header('Location: /src/home');
    exit;
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];


require_once __DIR__ . '/DB/database.php';

$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$statement->execute(array(
  ':email' => $email
));
$user = $statement->fetch(PDO::FETCH_ASSOC);
if ($user) {
  $error = 'Email is already registered!';
}else {
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $statement = $pdo->prepare("INSERT INTO users (name,email,password)values(:name,:email,:password)");
  $statement->execute(array(
    ':name' => $name,
    ':email' => $email,
    ':password' => $hash_password
  ));



  header('Location: /src/login');
  exit;
};
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Tracker Registration</title>
    <link rel="stylesheet" href="./styles.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="form-container">
        <form class="form" action="/src/register" method="POST">
            <?php if ($error): ?>
            <?php endif; ?>
            <div style=" text-align: center;">
                <p style="font-size: 32px; font-weight: bold;">Account Registration</p>
            </div>
            <div class="form-group"> <label for="name" class="form-label">Name</label><br>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group"> <label for="email" class="form-label">Email address</label><br>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label><br>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div style="color: red; text-align: center;"><p><?= htmlspecialchars($error) ?></p></div>
            <p style="font-weight: bold; margin: 0; margin-bottom: 10px; text-align: center;">Already Have an account? <a href="/src/login.php">Login</a></p>
            <div class="submit-button-container">
                <button type="submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>