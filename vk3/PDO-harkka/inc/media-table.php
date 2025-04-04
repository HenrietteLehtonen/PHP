<section id="media-items">
    <h2>Media items</h2>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Owner</th>
            <th>Thumb</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php
                // <tr> luonti selectDatassa, tuodaan tässä
                require_once __DIR__ . '/../operations/selectData.php';
            ?>
<!--        <tr>-->
<!--            <td>Nimi</td>-->
<!--            <td>Diipa daapa</td>-->
<!--            <td>1.1.2011</td>-->
<!--            <td>Meityli</td>-->
<!--            <td>Kiva kuva</td>-->
<!--        </tr>-->
        </tbody>
    </table>
</section>
