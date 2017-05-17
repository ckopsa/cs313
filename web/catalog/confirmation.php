<?php
session_start();
?>

<html>
    <head>
        <title>Checkout</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="./style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li><a href="browse.php">Back to Browsing</a></li>
            </ul>
        </div>
        <div class="catalog-container">
            <h2>Order Confirmed</h2>
            <?php
            echo "<h3>Thank you for shopping, " . htmlspecialchars($_POST['Name']) . "!</h3>";
            echo "<p>" . htmlspecialchars($_POST['Address']) . "</p>";
            echo "<p>" . htmlspecialchars($_POST['City']) . ", " . $_POST['State'] . " " . $_POST['Zip'] ." </p>";
            echo "<p>" . htmlspecialchars($_POST['Zip']) . "</p>";
            echo "<p>" . htmlspecialchars($_POST['Phone']) . "</p>";
            ?>
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
<?php
session_destroy();
?>
