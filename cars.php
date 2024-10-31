<?php
/**
 * @var PDO $pdo
 */
require_once '/home/fares/PhpstormProjects/HelloWorld/db.php';

// start session
session_start();

    $cars = $pdo->query("SELECT * FROM cars")->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $carId = $_POST['car_id'];

        $statement = $pdo->prepare("INSERT INTO carts (car_id, user_id) VALUES (:carId, :userID)");
        $statement->bindParam(':carId', $carId);
        $statement->bindParam(':userID', $_SESSION["user"]);
        $statement->execute();

    }

?>



<!DOCTYPE html>
<html>

<head >
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE+edge" />
    <meta name="Descriptions" content="this is our  store" />
     <link rel="stylesheet" href="cars.css">
    <script src="cars.js"></script>
    <style>
        .p1{width: 600px}
        .hr{height: 250px}
        .btt { padding: 8px 12px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .btt:hover { background-color: #0056b3; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        img { width: 100px; height: auto; }
        .table{top: 700px;}

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
                </select>
<!--                <button class="butn"><img src="./images/Frame 72.png" alt=""></button>-->
            </div >
              <img class="flag" src="./images/Frame 73.png" alt="">

                <div class="te1">
                    <p class="te1">Hello, Kiran <br><span class="sp">Account for Eshopify...</span></p>
                </div>
                <div class="cart1" id="cart1">
                    <button class="cart2">Cart </button>
                    <img class="card3" src="./images/add_shopping_cart.png" alt="">
                </div>
        </div>
    </header>

    <nav></nav>

    <section>
        <div class="title">
            <div class="para">
                <p class="p1">AL-OMARI STORE</p>
                <p class="p2">Best Car Collection</p>
            </div>
        </div>


        <table class="table">
            <p class="hr">.</p>
            <thead>
            <tr>
                <th>Image</th>
                <th>Car Name</th>
                <th>Price</th>
                <th>Add to Cart</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><img src="<?= htmlspecialchars($car['image_path']) ?>" alt="<?= htmlspecialchars($car['name']) ?>"></td>
                    <td><?= htmlspecialchars($car['name']) ?></td>
                    <td>$<?= number_format($car['price'], 2) ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="car_id" value="<?= htmlspecialchars($car['id']) ?>">
                            <button type="submit" class="btt">Add To Cart</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</body>
</html>