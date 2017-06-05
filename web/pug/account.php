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
            $statement = $db->prepare("SELECT username, location FROM participant where id = :userid");
            $statement->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
            $statement->execute();
            // Go through each result
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            echo '<div class="activity-card">';
	          echo '<h3 class="activity-card-title">' . $row['username'] . '</h3>';
            echo '<p>' . $row['location'] . '</p>';
	          echo '</div>';
            ?>
        </div>
    </body>
</html>
