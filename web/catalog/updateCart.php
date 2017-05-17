<?php
session_start();
if (isset($_SESSION['items'])) {
    $index = (int)$_POST["id"];
    $count = (int)$_POST["count"];
    echo $index;
    $_SESSION['items'][$index]['count'] = $count;
}
echo "Index: " . $index . " == " . $_SESSION['items'][$index]['count'];
echo "Count: " . $count;
?>