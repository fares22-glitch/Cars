<?php
/**
 * @var PDO $pdo
 */
require_once '/home/fares/PhpstormProjects/HelloWorld/db.php';

// start session
session_start();

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// get user
if (isset($_SESSION['user'])) {
    // Prepare a statement to fetch the user based on the session user ID
    $statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $statement->bindParam(':id', $_SESSION['user'], PDO::PARAM_INT);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity:1;
        }
    </style>
</head>
<body>

<h2>Modal Signup Form</h2>

<button onclick="window.location.href='signup.php';" style="width:auto;">Sign Up</button>
<button onclick="window.location.href='login.php';" style="width:auto;">LOGIN</button>



</body>
</html>
