<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>STUDENT MONITORING APPLICATION</h1>
            </header>
        </div>
        <div class="container">
             <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">Student's monitoring app</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li id="home"><a href="">HOME</a></li>
                        <li id="profile"><a href="">PROFILE</a></li>
                        <li id="classes"><a href="/Classes.php">CLASSSES</a></li>
                        <li id="messages"><a href="">MESSAGES</a></li>
                        <li id="student" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">STUDENT<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li id="sprofile"><a href="/StudentProfile.php">Profile</a></li>
                                <li id="reg"><a href="/RegistrationPage.php">Registration</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </body>
</html>
