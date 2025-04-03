<?php
require_once __DIR__ . '/../tietokanta/dbConnect.php';

$sql = "SELECT MediaItems.*, Users.username FROM MediaItems JOIN Users ON Users.user_id = MediaItems.user_id";
//

try {
    $STH = $DBH->query($sql);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    while($row = $STH->fetch()):
       ?>
        <tr>
            <td><?php echo $row->title ?></td>
            <td><?php echo $row->description ?></td>
            <td><?php echo $row->created_at ?></td>
            <td><?php echo $row->username ?></td>
            <td><?php echo $row->thumbnail ?></td>
        </tr>
    <?php
    endwhile;
} catch (PDOException $error) {
    echo "Error while selecting data from database.";
    file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'selectData.php - ' . $error->getMessage(), FILE_APPEND);
}

?>


