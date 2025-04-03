<?php
// sessio startattava aina
session_start();
require_once __DIR__ . '/inc/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    // 1.
    if (isset($_POST['remember'])):
        $_SESSION['username'] = $_POST['username'];
    else:
        unset($_SESSION['username']);
    endif;
    header('Location: ' . $_SERVER['PHP_SELF']);
endif;
?>


<h1>Tehtävä 3</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

        <div>
            <label for="username">Username</label>
            <?php
            // 2.
            $value = '';
            if (isset( $_SESSION['username'])):
                $value = "value= $_SESSION[username]";
            endif;
            ?>
            <input type="text" name="username" id="username" placeholder="Username" <?php echo $value ?>> <br>

            <label for="remember">Remember me</label>
            <?php
            $checked = '';
            if (isset( $_SESSION['username'])):
                $checked = 'checked';
            endif;
            ?>
            <input type="checkbox" name="remember" id="remember" <?php echo $checked?>>

        </div>

        <input type="submit" />
    </form>

<?php
require_once __DIR__ . '/inc/footer.php';
