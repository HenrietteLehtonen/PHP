<section id="insert-media-item">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="title">Name</label>
            <input type="text" name="title" id="title" />
        </div>
        <div class="form-control">
            <label for="file">Upload Image</label>
            <input type="file" name="file" id="file" />
        </div>
        <input type="submit" value="Upload Image" name="submit" />

    </form>
</section>
