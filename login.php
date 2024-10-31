<?php
/**
 * @var PDO $pdo
 */
require_once '/home/fares/PhpstormProjects/HelloWorld/db.php';

// start session
session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['psw'];

        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :email");
        $statement->bindParam(':email', $email);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user'] = $user['id'];

            if (password_verify($password, $user['password'])) {
                header("Location: main.php");
                exit();
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "No account found with that email address!";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;

        }
        .modal {
            position: fixed;
            z-index: 1;
            left: 0px;
            top: 50px;
            width: 400px; /* Full width */

        }


    </style>
</head>

<body>

<h2>Login</h2>

<div id="id01" class="modal">
    <form class="modal-content animate" method="post">


        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>


    </form>
</div>

</body>
</html>


