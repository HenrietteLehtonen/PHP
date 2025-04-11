<?php
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';
?>

<section id="register">
    <h2>Register</h2>
    <form action="<?php echo $SITE_URL;?>/operations/insertUser.php" method="post">
        <div class="form-control">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"
        </div>
        <div class="form-control">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"
        </div>
        <div class="form-control">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"
        </div>
        <button type="submit">Register</button>
    </form>
</section>
