<?php
require "dbConnect.php";
$db = get_db();
session_start();
$st0 = $db->prepare('SELECT id FROM event WHERE id = :eventid AND host = :userid');
$st0->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
$st0->bindParam(':eventid', $_POST['eventid'], PDO::PARAM_INT);
$st0->execute();
$row = $st0->fetch(PDO::FETCH_ASSOC);
if (isset($row['id'])) {
    $st1 = $db->prepare('DELETE FROM enrollment WHERE eventid = :eventid');
    $st1->bindParam(':eventid', $_POST['eventid'], PDO::PARAM_INT);
    $st1->execute();

    $st2 = $db->prepare('DELETE FROM event WHERE id = :eventid');
    $st2->bindParam(':eventid', $_POST['eventid'], PDO::PARAM_INT);
    $st2->execute();
}
?>
