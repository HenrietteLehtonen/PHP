<?php
if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../tietokanta/dbConnect.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../MediaProject/MediaItemDBops.class.php';

use MediaProject\MediaItemDBops;

//if (!isset($_SESSION['user'])) {
//    header('Location: ' . $SITE_URL . '/user.php');
//    exit;
//}

$mediaItemDBops = new MediaItemDBops($DBH);
$mediaItems = $mediaItemDBops->getMediaItems();

// taulukon läpikäynti
foreach ($mediaItems as $mediaItem):
    $row = $mediaItem->getMediaItem();
    ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo date_format(date_create($row['created_at']), 'd.m.Y H:i'); ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><img src=<?php echo $SITE_URL; ?>/uploads/<?php echo $row['filename']; ?>
                     alt="<?php echo $row['title']; ?>"></td>
        <td>
            <?php
            // jos median omistaja näytä delete
            if ($_SESSION['user']['user_id'] == $row['user_id']
                // tai jos aadmin
                || $_SESSION['user']['user_level_id'] == '1'):
                ?>
                <button data-media_id="<?php echo $row['media_id']; ?>" class="btn btn-edit">Edit</button>
                <a href="<?php echo $SITE_URL; ?>/operations/deleteData.php?media_id=<?php echo $row['media_id']; ?>" class="btn btn-danger">Delete</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php
endforeach;