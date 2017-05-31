<?php
require "dbConnect.php";
$db = get_db();
session_start();

$sth = $db->prepare('SELECT id, password FROM participant p WHERE email = :email');
$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
if (password_verify($_POST['password'], $row['password'])) {
    $_SESSION['user_id'] = $row['id'];
}
?>
