<?php
session_start();
?>

<html>
    <head>
        <title>Cart</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="./style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li><a href="cart.php">Back to Shopping Cart</a></li>
            </ul>
        </div>
        <div class="catalog-container">
            <h2>Please enter your information: </h2>
            <form action="confirmation.php" method="post">
                <input name="Name" type="text" placeholder="Full Name" required/>
                <input name="Phone" type="text" placeholder="Phone Number" required/>
                <br/>
                <input name="Address" type="text" placeholder="Address" required/>
                <input name="City" type="text" placeholder="City" required/>
                <br/>
                <input name="State" type="text" placeholder="State" required/>
                <input name="Zip" type="text" placeholder="Zip Code" required/>
                <br/>
                <input name="" type="submit" value="Submit Order" required/>
            </form>
            <div class="checkout-container">
                <?php
                if (isset($_SESSION['items'])) {
                    $total = 0;
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Item Name</th>";
                    echo "<th>Item Price</th>";
                    echo "<th>Quantity</th>";
                    echo "</tr>";
                    foreach ($_SESSION['items'] as $item) {
                        if ($item['count'] > 0) {
                            $total += (float) $item['price'];
                            echo "<tr>";
                            echo "<td>". $item['name']. "</td>";
                            echo "<td>" . $item['price'] . "</td>";
                            echo "<td>" . $item['count'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "<tr>";
                    echo "<td>Total</td>";
                    echo "<td>$total</td>";
                    echo "<td></td>";
                    echo "</tr>";
                    echo "</table>";
                } else {
                    echo "<h1>No Items to Checkout</h1>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
