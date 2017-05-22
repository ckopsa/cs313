<?PHP
require "dbConnect.php";
$db = get_db();
?>
<!doctype html>
<html>
    <head>
        <title>Colton's Homepage</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="./style.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
         $(document).ready(function(){
             $("h1").click(function(){
                 $(".main-page").slideToggle();
             });
         });
        </script>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li><a>Colton Kopsa</a></li>
                <li><a href="../index.html">About Me</a></li>
                <li><a href="../assignments.html">Assignments</a></li>
                <li><a id="active-link" href="./pug/events.html">PUG</a></li>
                <form>
                    <input id="search-button" type="button" value="Search"/>
                    <input id="search-box" name="search" type="text" placeholder="Search..."/>
                </form>
            </ul>
        </div>
        <h1>PUG</h1>
        <div class="main-page">
            <h2>Activity Feed</h2>
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
                echo '<p>' . $row['host'] . '</p>';
	              echo '</div>';
                echo '<input name="id" type="hidden" value="'. $row['id'] .'"/>';
                echo '</form>';
            }
            ?>
        </div>
    </body>
</html>
