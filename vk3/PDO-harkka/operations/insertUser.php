<?php
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){

    $sql = "INSERT INTO Users (username, password, email, user_level_id) VALUES (:username, :password, :email, 2)";

    $data = [
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'email' => $_POST['email']
    ];

    try{
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        if($STH->rowCount() > 0){
            header('Location: '. $SITE_URL . '/user.php?message=User created successfully!');

        }
    }catch(PDOException $e) {
        echo "Could not create user in the database.";
        file_put_contents('PDOErrors.txt', 'insertUser.php - database insert - ' . $e->getMessage(), FILE_APPEND);
    }
} else {
    exit("Something went wrong while creating user!");
};