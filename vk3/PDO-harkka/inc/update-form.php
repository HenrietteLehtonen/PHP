<section id="update-media-item">
    <h2>Update Media Item</h2>

    <!--suppress HtmlUnknownTarget -->
    <form action="./operations/updateData.php" method="post">
        <div class="form-control">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title"/>
        </div>
        <div class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="2"></textarea>
        </div>
        <input type="hidden" name="media_id" value="<?php echo $_GET['media_id']; ?>">
        <button type="submit">Update file</button>
    </form>

</section>
