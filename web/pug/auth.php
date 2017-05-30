<?php
require "dbConnect.php";
$db = get_db();
session_start();

$sth = $db->prepare('SELECT id FROM participant p WHERE email = :email AND password = :password ');
$sth->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
if (isset($row)) {
    $_SESSION['user_id'] = $row['id'];
}
?>
