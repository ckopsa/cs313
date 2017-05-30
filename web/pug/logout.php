<?php
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
?>
<!doctype html>
<html>
    <?php require "header.php"; ?>
    <body>
        <?php require "navbar.php"; ?>
        <h1>PUG</h1>
        <div class="main-page">
            <h2>You are logged out.</h2>
        </div>
    </body>
</html>
