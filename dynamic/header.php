<?php
require "dynamic/print_pages.php";
require "dynamic/utils.php";
require "dynamic/globals.php";

if (!array_key_exists('theme', $_COOKIE) || !array_key_exists($_COOKIE['theme'], $THEMES)) {
    $url = current_url();
    setcookie('theme', $DEFAULT_THEME, time() + (86400 * 30), "/");
    header("Location:". $url);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link type='text/css' rel='stylesheet' href='css/style.css' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
    <title>Simple Recipe Page</title>
    <?php print_theme_css(); ?>
</head>
