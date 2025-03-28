<?php
require_once __DIR__ . '/inc/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    if(!isset($_POST['color']) || !isset($_POST['style']) || !isset($_POST['size'])){
        die();
}
    // värit
    $color = $_POST['color'];
    // koko
    $size = $_POST['size'];
    //fontti tyyli
    $style = $_POST['style'];
    // alustetaan style string
    $style_string = '';

    $style_string .= "color: $color;";
    $style_string .= "font-size: $size;";
    if(in_array('bold', $style)){
        $style_string .= "font-weight: bold";
    }
    if(in_array('italic', $style)){
        $style_string .= "font-style: italic";
    }



?>
    <p style="<?php echo $style_string; ?>">Lorem ipsum rtaaltal tekstia lajsoasjsfs</p>
<?php
endif;
?>

<h1>Tehtävä 1</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

        <div class="card">
            <label for="red">Red</label>
            <input type="radio" name="color" id="red" value="red"><br>
            <label for="blue">Blue</label>
            <input type="radio" name="color" id="blue" value="blue"><br>
            <label for="green">Green</label>
            <input type="radio" name="color" id="green" value="green"><br>
        </div>

        <div>
            <label for="size">Choose size:</label>
            <select name="size" id="size">
                <option value="small">small</option>
                <option value="medium">medium</option>
                <option value="large">large</option>
            </select>
        </div>

        <div>
            <label for="bold">Bold</label>
            <input type="checkbox" id="bold" value="bold" name="style[]"><br>
            <label for="italic">Italic</label>
            <input type="checkbox" id="italic" value="italic" name="style[]">
        </div>

        <input type="submit" />
    </form>

<?php
require_once __DIR__ . '/inc/footer.php';
