<?PHP
require "dbConnect.php";
$db = get_db();
session_start();
?>
<!doctype html>
<html>
    <?php include "header.php"; ?>
    <body>
        <?php include "navbar.php"; ?>
        <h1>PUG</h1>
        <div class="main-page">
            <h2>Account Info</h2>
            <input style="float:right;" onclick="logout()" type="Button" value="Logout"/>
            <input style="float:right;" onclick="deleteUser()" type="Button" value="Delete Acocunt"/>
            <?php
            $statement = $db->prepare("SELECT username, location, email FROM participant where id = :userid");
            $statement->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
            $statement->execute();
            // Go through each result
            $account = $statement->fetch(PDO::FETCH_ASSOC);
            echo '<div class="activity-card">';
	          echo '<h3 class="activity-card-title">My Account Info</h3>';
            echo '<p>' . $account['username'] . '</p>';
            echo '<p>' . $account['location'] . '</p>';
            echo '<p>' . $account['email'] . '</p>';
	          echo '</div>';
            $statement = $db->prepare("SELECT id, title, location, eTime, eDate FROM event WHERE host = :userid");
            $statement->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
            $statement->execute();
            echo '<div class="activity-card">';
	          echo '<h3 class="activity-card-title">My Events</h3>';
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo '<form action="activity.php" method="GET">';
	              echo '<button class="activity-card-title">' . $row['title'] . ": " . $row['edate'] . ' - ' . $row['etime'] . '</button>';
                echo '<input name="id" type="hidden" value="'. $row['id'] .'"/>';
                echo '</form>';
            }
	          echo '</div>';
            $statement = $db->prepare("SELECT id, title, location, eTime, eDate FROM event WHERE id = (SELECT eventid FROM enrollment WHERE userid = :userid)");
            $statement->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
            $statement->execute();
            echo '<div class="activity-card">';
	          echo '<h3 class="activity-card-title">My Enrollments</h3>';
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo '<form action="activity.php" method="GET">';
	              echo '<button class="activity-card-title">' . $row['title'] . ": " . $row['edate'] . ' - ' . $row['etime'] . '</button>';
                echo '<input name="id" type="hidden" value="'. $row['id'] .'"/>';
                echo '</form>';
            }
	          echo '</div>';
            ?>
        </div>
    </body>
</html>
