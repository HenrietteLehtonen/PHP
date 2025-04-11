<?php

nameSpace MediaProject;

// tuodaan mediaItem luokka
require_once __DIR__ . '/MediaItem.class.php';

class MediaItemDBops {
    // tietokanta handleri
    private \PDO $DBH;

    public function __construct($DBH) {
        $this->DBH = $DBH;
    }

    // getteri media itemeille
    public function getMediaItems():array{
        $sql = "SELECT MediaItems.*, Users.username FROM MediaItems JOIN Users ON Users.user_id = MediaItems.user_id";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(\PDO::FETCH_ASSOC);
        // media itemi taulukon alustus
        $mediaItems = [];
        while ($row = $STH->fetch()){
            // uus mediaItem objekti seuraavaan tyhjään indeksiin
            $mediaItems[] = new MediaItem($row);
        }
        return $mediaItems;
    }
}