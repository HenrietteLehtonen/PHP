<?php
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';

if (!empty($_GET['media_id'])){
    // filun poisto
    $fileSql = "SELECT * FROM MediaItems WHERE media_id = :media_id";
    $data = ['media_id' => $_GET['media_id']];

    try {
        $fileSTH = $DBH->prepare($fileSql);
        $fileSTH->execute($data);
        $row = $fileSTH->fetch();
        // unlink(__DIR__ . "/..uploads/" . $row['filename']);
    }  catch (PDOException $error) {
        echo "Error while deleting file from database!";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'deleteData.php - file delete - ' . $error->getMessage(), FILE_APPEND);
    }

    $sql = "DELETE FROM MediaItems WHERE media_id = :media_id";

}
try {
    $STH = $DBH->prepare($sql);
    $STH->execute($data);
    if($STH->rowCount() > 0){
        header('Location: '. $SITE_URL);
    }
} catch(PDOException $e) {
    echo "Could not delete media from the database.";
    file_put_contents('PDOErrors.txt', 'deleteData.php - database delete - ' . $e->getMessage(), FILE_APPEND);
}