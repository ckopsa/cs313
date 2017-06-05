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
            <h2>Login Page</h2>
            <?php
            // Go through each result
            ?>
            <div class="login-box">
                <input id ="email" name="email" type="text" placeholder="Email"/>
                <br/>
                <input id="password" name="password" type="password" placeholder="Password"/>
                <br/>
                <input name="" onclick="login(document.getElementById('email').value, document.getElementById('password').value)" type="button" value="Login"/>
                <input name="signup" value="Signup" type="button" onclick="location.href='signup.php'"/>
            </div>
        </div>
    </body>
</html>
