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
            $statement = $db->prepare("SELECT id, title, (SELECT username from participant WHERE id = e.host) as \"host\", location, etime, edate FROM event e WHERE id = " . $_GET['id'] . ";");
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="activity-card">';
	              echo '<h3 class="activity-card-title">' . $row['title'] . '</h3>';
                echo '<p>' . $row['host'] . '</p>';
                echo '<p>' . $row['location'] . '</p>';
                echo '<p>' . $row['etime'] . '</p>';
                echo '<p>' . $row['edate'] . '</p>';
	              echo '</div>';
            }
            ?>
            <div class="enrollment-list">
                <h3>Who's Going?</h3>
                <?php
                echo '<input onclick="createEnrollment(' . $_GET['id'] . ')" type="button" value="Join"/>';
                $statement = $db->prepare("SELECT id, (SELECT username from participant WHERE id = e.userid) as user FROM enrollment e WHERE eventid = " . $_GET['id'] . ";");
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
