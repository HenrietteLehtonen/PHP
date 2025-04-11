<?php
global $SITE_URL;
require_once __DIR__ . "/../config/config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Media Items taas kerran :-)</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/main.js" defer></script>
</head>
<body>

<div class="container">
    <header>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo $SITE_URL ?>/">Home</a>
                </li>
                <li>
                    <!--suppress HtmlUnknownTarget -->
                    <a href="<?php echo $SITE_URL ?>/user.php">Login/Register</a>
                </li>
            </ul>
        </nav>
    </header>