<?php
/**
 * @var PDO $pdo
 */
require_once '/home/fares/PhpstormProjects/HelloWorld/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);

    $passwordRepeat = password_hash($_POST['psw-repeat'], PASSWORD_DEFAULT);

    if ($_POST['psw'] !== $_POST['psw-repeat']) {
        echo "Passwords do not match!";
        exit;
    }

    $statement = $pdo->prepare("INSERT INTO users (username, password) VALUES (:email, :password)");

    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->execute();

}


?>



<!DOCTYPE html>
<html>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Add a background color when the inputs get focus */
    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 300px;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn {
        float: left;

        width: 300px;
    }



    .modal {
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 20px;
        top: 0;
        width: 400px; /* Full width */

    }

</style>
<body>





<div id="id01" class="modal">
    <form class="modal-content" method="POST" onsubmit="showSuccessMessage(eve)">

        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="submit" class="signupbtn">Sign Up</button>
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

        </div>
</div>
</form>

</div>

<script>
    function showSuccessMessage(eve) {
        eve.preventDefault();
        alert("You have successfully signed up!");
    }
</script>

</body>
</html>



