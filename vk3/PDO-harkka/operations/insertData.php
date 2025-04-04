<?php
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';

// tsekataan ettei title oo tyhjä ja filussa ei erroreita( käytä formeissa !empty issetin sijasta)
if (!empty($_POST['title']) && !empty($_POST['user_id']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

    // assos. taulu
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $destination = __DIR__ . '/../uploads/' . $filename;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_POST['user_id'];

    // hyväksy vain kuvat ja videot
    $allowed_types = array('image/jpeg', 'image/png', 'image/webp', 'image/gif',
        'video/mp4', 'video/webm', 'video/ogg', 'video/mov');
    if (!in_array($filetype, $allowed_types)) {
        exit("Invalid file type!");
    }


    // tsekataan toimiiko filun siirtäminen temppikansiosta
    if (move_uploaded_file($tmp_name, $destination)) {
        echo "File uploaded successfully";
    } else {
        echo "Error uploading file";
    }

    // kun filun siirtäminen onnistunut lisätään data tietokantaan
    $sql = "INSERT INTO MediaItems (user_id, filename, filesize, media_type, title, description) 
            VALUES (:user_id, :filename, :filesize, :media_type, :title, :description)";
    $data = [
        'user_id' => $user_id,
        'filename' => $filename,
        'filesize' => $filesize,
        'media_type' => $filetype,
        'title' => $title,
        'description' => $description
    ];

    // try - catch
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        if($STH->rowCount() > 0){
            header('Location: '. $SITE_URL);
        }

    } catch (PDOException $error) {
        echo "Error while inserting data into database!";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'insertData.php - ' . $error->getMessage(), FILE_APPEND);
    }

} else{
    echo "post title: " .  $_POST['title'] . "<br>";
    echo "post desc: " .  $_POST['description'] . "<br>";
    echo "post user id: " .  $_POST['user_id'] . "<br>";
    exit("No file uploaded"); // die() vähän vanhempi :)
}
