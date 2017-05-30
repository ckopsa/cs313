<?PHP
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
            <h2>Accounts</h2>
            <?php
            $statement = $db->prepare("SELECT id, username, email, location FROM participant p;");
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
	              // The variable "row" now holds the complete record for that
	              // row, and we can access the different values based on their
	              // name
                echo '<form action="account.php" method="GET">';
                echo '<div class="activity-card">';
	              echo '<button class="activity-card-title">' . $row['username'] . '</button>';
                echo '<p>' . $row['email'] . '</p>';
                echo '<p>' . $row['location'] . '</p>';
	              echo '</div>';
                echo '<input name="id" type="hidden" value="'. $row['id'] .'"/>';
                echo '</form>';
            }
            ?>
        </div>
    </body>
</html>
