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
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="browse.php">Back to Browsing</a></li>
            </ul>
        </div>
        <div class="catalog-container">
            <?php
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $item) {
                    if ($item['count'] > 0) {
                        echo "<div class='item-container'>";
                        echo "<h2>". $item['name']. "</h2>";
                        echo "<p>" . $item['price'] . "</p>";
                        echo "<p>" . $item['count'] . "</p>";
                        echo "<button type='submit' onclick='updatePHP(" . $item['id'] . ", " . 0 . ")' >Remove From Cart</button>";
                        echo "<img src='" . $item['url-pic']. "' alt='" . $item['name'] . "'/>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<h1>No Items in Cart</h1>";
            }
            ?>
        </div>
    </body>
    <script type="text/javascript">
     function updatePHP(pId, pCount) {
         $.post("updateCart.php", {id: pId, count: pCount})
          .done(function( data ) {
              alert("Item Removed. Refresh page to see changes.");
          });
     }
    </script>
</html>
