<?php
session_start();
if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = array(
        array("id" => 0, "count" => 0, "name" => "British Shorthair", "price" => 15.99, "url-pic" => "http://cdn2-www.cattime.com/assets/uploads/gallery/british-shorthair-cats-and-kittens/british-shorthair-cats-and-kittens-1.jpg"),
        array("id" => 1, "count" => 0, "name" => "Siamese", "price" => 25.99, "url-pic" => "http://cdn2-www.cattime.com/assets/uploads/gallery/siamese-cats-and-kittens-pictures/siamese-cat-kitten-picture-5.jpg"),
        array("id" => 2, "count" => 0, "name" => "Persian", "price" => 20.99, "url-pic" => "http://cdn1-www.cattime.com/assets/uploads/gallery/persian-cats-and-kittens/persian-cats-and-kittens-8.jpg"),
        array("id" => 3, "count" => 0, "name" => "Ragdoll", "price" => 15.99, "url-pic" => "https://upload.wikimedia.org/wikipedia/commons/6/64/Ragdoll_from_Gatil_Ragbelas.jpg"),
        array("id" => 4, "count" => 0, "name" => "Maine Coon", "price" => 40.99, "url-pic" => "http://cdn1-www.cattime.com/assets/uploads/gallery/maine-coon-cats-and-kittens/maine-coon-cats-and-kittens-1.jpg")
    );
}
?>
<html>
    <head>
        <title>Browse</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="./style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li><a href="cart.php">See Shopping Cart</a></li>
            </ul>
        </div>
        <div class="catalog-container">
            <h1>Cat-alog</h1>
            <?php
            foreach ($_SESSION['items'] as $item) {
                echo "<div class='item-container'>";
                echo "<h2>". $item['name']. "</h2>";
                echo "<p>" . $item['price'] . "</p>";
                echo "<button type='submit' onclick='updatePHP(" . $item['id'] . ", " . 1 . ")' >Add to Cart</button>";
                echo "<img src='" . $item['url-pic']. "' alt='" . $item['name'] . "'/>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
    <script type="text/javascript">
     function updatePHP(pId, pCount) {
         $.post("updateCart.php", {id: pId, count: pCount})
             .done(function( data ) {
                 alert("Item added to cart");
             });
     }
    </script>
</html>
