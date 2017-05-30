<?php
require "dbConnect.php";
$db = get_db();

/*** begin our session ***/
session_start();
/*** set a form token ***/
$form_token = md5( uniqid('auth', true) );

/*** set the session form token ***/
$_SESSION['form_token'] = $form_token;
?>
<!doctype html>
<html>
    <?php require "header.php"; ?>
    <body>
        <?php require "navbar.php"; ?>
        <h1>PUG</h1>
        <div class="main-page">
            <h2>Signup Page</h2>
            <?php
            // Go through each result
            ?>
            <div class="login-box">
                <form onsubmit="addEvent(
document.getElementById('title').value,
document.getElementById('location').value,
document.getElementById('time').value,
document.getElementById('date').value,
)">
                    <input id ="title" name="title" type="text" placeholder="Event Title" required/>
                    <br/>
                    <input id ="location" name="location" type="text" placeholder="Location" required/>
                    <br/>
                    <input id ="time" name="time" type="text" placeholder="Time (ex: 12:00 AM)" required/>
                    <br/>
                    <input id="date" name="eDate" type="text" placeholder="Date (ex: 2017-5-25)" required/>
                    <br/>
                    <input name="" type="submit" value="Create Event"/>
                </form>
            </div>
        </div>
    </body>
</html>
