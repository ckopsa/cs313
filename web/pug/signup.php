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
                <input id ="username" name="username" type="text" placeholder="Username" required/>
                <br/>
                <input id ="email" name="email" type="text" placeholder="Email" required/>
                <br/>
                <input id ="location" name="location" type="text" placeholder="Location" required/>
                <br/>
                <input id="password" name="password" type="password" placeholder="Password" required/>
                <br/>
                <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="Password Confirm" required/>
                <br/>
                <input name="" type="button" onclick="signup()" value="Create Account"/>
            </div>
        </div>
    </body>
    <script type="text/javascript">
     function signup() {
         createUser(
             document.getElementById('username').value,
             document.getElementById('email').value,
             document.getElementById('location').value,
             document.getElementById('password').value,
             document.getElementById('passwordConfirm').value,
             window.location = "login.php"
         );
     }
    </script>
</html>
