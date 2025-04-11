<?php
session_start();

global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';


if (isset($_POST['username']) && isset($_POST['password'])) {
    $sql = "SELECT * FROM Users WHERE username = :username";
    $data = [
        'username' => $_POST['username'],
    ];

    try{
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        $user = $STH->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        echo "Could not fetch user from the database.";
        file_put_contents('PDOErrors.txt', 'login.php - database fetch - ' . $e->getMessage(), FILE_APPEND);
    }


    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        // redirect to secret page ??
        header('Location: ' . $SITE_URL);
        exit;
    } else {
        echo 'Invalid username or password';
    }
}