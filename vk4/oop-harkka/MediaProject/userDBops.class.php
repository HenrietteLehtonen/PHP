<?php
namespace MediaProject;

// tuodaan user luokka
use PDO;

require_once __DIR__ . '/user.class.php';

class UserDBops {
    private \PDO $DBH;

    public function __construct($DBH) {
        $this->DBH = $DBH;
    }

    // kirjautuminen
    public function login($username, $password): User | null
    {
        $sql = "SELECT * FROM Users WHERE username = :username";
        $data = [
            'username' => $_POST['username'],
        ];
        $STH = $this->DBH->prepare($sql);
        $STH->execute($data);
        $user = $STH->fetch(\PDO::FETCH_ASSOC);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            return new User($user);
        }
        return null;
    }

    // getteri user by id
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $STH = $this->DBH->prepare($sql);
        $STH->execute(array(':id' => $id));
        $STH->setFetchMode(\PDO::FETCH_ASSOC);
        $row = $STH->fetch();
        return new User($row['id'], $row['name']);
    }
}