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
            <?php
            $statement = $db->prepare("SELECT username, location FROM participant");
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
                echo '<p>' . $row['host'] . '</p>';
                echo '</div>';
                echo '<input name="id" type="hidden" value="'. $row['id'] .'"/>';
                echo '</form>';
            }
            ?>
        </div>
    </body>
</html>
