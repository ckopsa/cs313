<?php
require "dbConnect.php";
$db = get_db();
session_start();

$sth = $db->prepare('DELETE FROM enrollment WHERE userid = :userid');
$sth->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
$sth->execute();

$sth = $db->prepare('DELETE FROM event WHERE host = :userid');
$sth->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
$sth->execute();

$sth = $db->prepare('DELETE FROM participant WHERE id = :userid');
$sth->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
$sth->execute();
?>
