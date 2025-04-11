<?php

session_start();

global $DBH;
global $SITE_URL;

require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../MediaProject/userDBops.class.php';

use MediaProject\UserDBops;


if (! empty ($_POST['username']) && ! empty($_POST['password'])) {
    $userOps = new UserDBops($DBH);
    $user = $userOps->login($_POST['username'], $_POST['password']);
    if($user){
        $_SESSION['user'] = $user->getUser();
        header('Location: ' . $SITE_URL);
        exit;
    }else {
        echo 'Invalid username or password';
    }
}