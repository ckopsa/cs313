<?php
require "dbConnect.php";
$db = get_db();
session_start();
?>
<!doctype html>
<html>
    <?php require "header.php"; ?>
    <body>
        <?php require "navbar.php"; ?>
        <h1>PUG</h1>
        <div class="main-page">
            <h2>Activity Feed</h2>
            <input style="float: right" onclick="document.location.href='addEvent.php'" type="button" value="Create Event"/>
            <?php
            $statement = $db->prepare("SELECT id, title, (SELECT username from participant WHERE id = e.host) as \"host\", location, eTime, eDate FROM event e;");
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
	              // The variable "row" now holds the complete record for that
	              // row, and we can access the different values based on their
	              // name
                echo '<form action="activity.php" method="GET">';
                echo '<div class="activity-card">';
	              echo '<button class="activity-card-title">' . $row['title'] . '</button>';
                echo '<p>' . 'Host: ' . $row['host'] . '</p>';
                echo '<p>' . $row['edate'] . ' - ' . $row['etime'] . '</p>';
	              echo '</div>';
                echo '<input name="id" type="hidden" value="'. $row['id'] .'"/>';
                echo '</form>';
            }
            ?>
        </div>
    </body>
</html>
