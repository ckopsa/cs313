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
            <?php
            $statement = $db->prepare("SELECT id, host, title, (SELECT username from participant WHERE id = e.host) as hostname, location, etime, edate FROM event e WHERE id = " . $_GET['id'] . ";");
            $statement->execute();
            // Go through each result
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row['host'] == $_SESSION['user_id']) {
                echo '<input onclick="deleteEvent(' . $_GET['id'] . ')" type="button" value="Delete Event"/>';
            }
            echo '<div class="activity-card">';
	          echo '<h3 class="activity-card-title">' . $row['title'] . '</h3>';
            echo '<p>' . $row['hostname'] . '</p>';
            echo '<p>' . $row['location'] . '</p>';
            echo '<p>' . $row['etime'] . '</p>';
            echo '<p>' . $row['edate'] . '</p>';
	          echo '</div>';
            ?>
            <div class="enrollment-list">
                <h3>Who's Going?</h3>
                <?php
                $statement = $db->prepare("SELECT id FROM enrollment WHERE userid = :userid AND eventid = :eventid");
                $statement->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
                $statement->bindParam(':eventid', $_GET['id'], PDO::PARAM_INT);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                if (isset($row['id'])) {
                    echo '<input onclick="deleteEnrollment(' . $_GET['id'] . ')" type="button" value="Leave"/>';
                } else {
                    echo '<input onclick="createEnrollment(' . $_GET['id'] . ')" type="button" value="Join"/>';
                }
                $statement = $db->prepare("SELECT id, (SELECT username from participant WHERE id = e.userid) as user FROM enrollment e WHERE eventid = :eventid");
                $statement->bindParam(':eventid', $_GET['id'], PDO::PARAM_INT);
                $statement->execute();
                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<p>' . $row['user'] . '</p>';
                }
                ?>
            </div>
        </div>
    </body>
</html>
