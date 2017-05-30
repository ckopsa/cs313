<?php
require "dbConnect.php";
$db = get_db();
session_start();

$sth = $db->prepare('INSERT INTO participant(username, email, password, location) VALUES (:username, :email, :password, :location)');
$sth->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
$sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$sth->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
$sth->bindParam(':location', $_POST['location'], PDO::PARAM_STR);
$sth->execute();
?>
