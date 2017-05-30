<head>
    <title>PUG</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="functions.js" type="text/javascript"></script>
</head>
<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">';
    echo 'if(!(document.location.href.includes("login") || document.location.href.includes("signup"))) {';
    echo 'document.location.href="/pug/login.php";';
    echo '}';
    echo '</script>';
}
?>
