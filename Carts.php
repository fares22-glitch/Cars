<?php
/**
 * @var PDO $pdo
 */
require_once '/home/fares/PhpstormProjects/HelloWorld/db.php';

// start session
session_start();

$statement = $pdo->prepare("  SELECT  
            c.name AS car_name,
            c.price AS price,
            c.image_path AS image_path
        FROM 
            carts ca
        JOIN 
            cars c ON ca.car_id = c.id
        JOIN 
            users u ON ca.user_id = u.id
        WHERE 
            u.id = :user_id;

    ");

$statement->bindParam(':user_id', $_SESSION["user"]);
$statement->execute();
$cars = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head >
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE+edge" />
    <!-- <title>Fares HTML</title> -->
    <meta name="Descriptions" content="this is our  store" />
    <link rel="stylesheet" href="Cart.css">
    <script src="Cart.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        .paraa{
            height: 100px;

        }
        .car-image {
            width: 150px;
            height: 150px;
        }
        .welcome {
            position: relative;
            top: 110px;
            left: 20px;
        }
        .table{
            position: relative;
            top: 120px;
            left: 20px;
        }
    </style>

</head>
<body>

<header class="header">
    <div class="header2">
        <div>
            <img class="img" src="./images/Logo-Primary bg (1).png" alt="" >
        </div>
        <div >
            <img class="location" src="./images/Location.png" alt="">

        </div>
        <div class="search">
            <form action=""></form>
            <input  class="search2" type="text" value="Search Aladdin"  >
            <select class="selsectCategories">
                <option>All Categories</option>
                <option>fares</option>
                <option>ahmed</option>
                <!-- Add more categories here -->
            </select>
            <button class="butn"><img src="./images/Frame 72.png" alt=""></button>
        </div >
        <img class="flag" src="./images/Frame 73.png" alt="">

        <div class="text1">
            <p class="text1">Hello, Kiran <br><span class="spann">Account for Eshopify...</span></p>
        </div>
        <div class="cart1" id="cart1">
            <button class="cart2">Cart </button>
            <img class="card3" src="./images/add_shopping_cart.png" alt="">
        </div>
    </div>
</header>

<!--<p class="paraa">.</p>-->

<div class="hh">
<!--    <h1 class="welcome">--><?php //echo "Welcome \"" . htmlspecialchars($_SESSION["user"]) . "\"<br>The list of cars you have selected is:"; ?><!--</h1>-->

</div>

<?php
if ($cars) {
echo "<table class='table'>
    <tr>
        <th>ID</th>
        <th>Car Name</th>
        <th>Price</th>
        <th>Car image</th>

    </tr>";
    $rowNumber = 1;

    foreach ($cars as $car) {
        echo "<tr>
            <td>" . $rowNumber . "</td>
            <td>" . htmlspecialchars($car['car_name']) . "</td>
            <td>$" . htmlspecialchars($car['price']) . "</td>
            <td><img src='" . htmlspecialchars($car['image_path']) . "' class='car-image'></td>

        </tr>";
        $rowNumber++;
    }

    echo "</table>";
} else {
echo "<p>No cars found for user: " . htmlspecialchars($_SESSION["user"]) . "</p>";
}

echo "</body>
</html>"
?>