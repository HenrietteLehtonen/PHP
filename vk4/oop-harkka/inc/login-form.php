<?php
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';
?>

<section id="login">
    <h2>Login</h2>
    <form action="<?php echo $SITE_URL;?>/operations/login.php" method="post">
        <div class="form-control">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"
        </div>
        <div class="form-control">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"
        </div>
        <button type="submit">Login</button>
    </form>
</section><?php
