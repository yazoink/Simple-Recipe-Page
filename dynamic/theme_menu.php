<?php
$url = current_url();
?>
<form action='dynamic/set_theme.php' method='post'>
    <label for="theme">Theme selection:</label>
    <select name="theme" id="Themes">
        <?php
        foreach ($THEMES as $file => $name) {
            if (theme_selected($file)) {
                echo "<option value ='" . $file . "' selected>" . $name . "</option>";
            } else {
                echo "<option value ='" . $file . "'>" . $name . "</option>";
            }
        }
        ?>
        <input type='hidden' name="url" value="<?php echo $url; ?>" />
        <input class='button' type='submit' name='change_theme' value='Refresh'/>
    </select>
</form>
