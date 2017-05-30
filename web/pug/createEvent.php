<?php
require "dbConnect.php";
$db = get_db();
session_start();

$sth = $db->prepare('INSERT INTO event(title, host, location, eTime, eDate) VALUES (:title, :host, :location, :eTime, :eDate)');
$sth->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
$sth->bindParam(':host', $_SESSION['user_id'], PDO::PARAM_INT);
$sth->bindParam(':location', $_POST['location'], PDO::PARAM_STR);
$sth->bindParam(':eTime', $_POST['time'], PDO::PARAM_STR);
$sth->bindParam(':eDate', $_POST['date'], PDO::PARAM_STR);
$sth->execute();
?>
