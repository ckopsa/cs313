<?php
require "dbConnect.php";
$db = get_db();
session_start();
$sth = $db->prepare('DELETE FROM enrollment WHERE userid = :userid AND eventid = :eventid');
$sth->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
$sth->bindParam(':eventid', $_POST['eventid'], PDO::PARAM_INT);
$sth->execute();
?>
