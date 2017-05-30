<div class="navbar">
    <ul>
        <?php
        $filename = basename($_SERVER['SCRIPT_FILENAME']);
        echo '<li><a ';
        if ($filename == "events.php") {
            echo 'id="active-link" ';
        }
        echo 'href="./events.php">PUG</a></li>';
        echo '<li><a ';
        if ($filename == "accounts.php") {
            echo 'id="active-link" ';
        }
        echo 'href="./accounts.php">Accounts</a></li>';
        if(!isset($_SESSION['user_id'])) {
            echo '<li style="float: right;"><a href="./login.php">Login</a></li';
        } else {
            echo '<li style="float: right;"><a href="./logout.php">Logout</a></li';
        }
        ?>
        <form action="searchAccount.php" method="GET">
            <input id="search-button" type="button" value="Search"/>
            <input id="search-box" name="search" type="text" placeholder="Search..."/>
        </form>
    </ul>
</div>
