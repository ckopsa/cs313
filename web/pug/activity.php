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
                <li><a id="active-link" href="./pug/index.html">PUG</a></li>
                <form>
                    <input id="search-button" type="button" value="Search"/>
                    <input id="search-box" name="search" type="text" placeholder="Search..."/>
                </form>
            </ul>
        </div>
        <h1>PUG</h1>
        <div class="main-page">
<?php
$statement = $db->prepare("SELECT id, title, (SELECT username from participant WHERE id = e.host) as \"host\", location, eTime, eDate FROM event e WHERE id = " . $_GET['id'] . ";");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    echo '<div class="activity-card">';
	  echo '<h3 class="activity-card-title">' . $row['title'] . '</h3>';
    echo '<p>' . $row['host'] . '</p>';
    echo '<p>' . $row['location'] . '</p>';
    echo '<p>' . $row['eTime'] . '</p>';
    echo '<p>' . $row['eDate'] . '</p>';
	  echo '</div>';
}
?>
        </div>
    </body>
</html>
