<?php
session_start();
// tietokantayhteys
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';

if (!empty($_POST['media_id'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $media_id = $_POST['media_id'];

    // sql update
    $sql = "UPDATE MediaItems 
            SET title = :title, description = :description
            WHERE media_id = :media_id";

    // data
    $data = [
        'title' => $title,
        'description' => $description,
        'media_id' => $media_id
    ];

    if($_SESSION['user']['user_level_id'] !== 1){
        $sql .= " AND user_id = :user_id";
        $data['user_id'] = $_SESSION['user']['user_id'];
    }


    // try-catch
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        // hae update result
        if($STH->rowCount() > 0){
            header('Location: '. $SITE_URL);
        }


    } catch (PDOException $error) {
        echo "Error while updating data in database!";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'updateData.php - ' . $error->getMessage(), FILE_APPEND);
    }

} else{
    exit("No data to update");
}