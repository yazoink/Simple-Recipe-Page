<?php
require "dynamic/print_pages.php";
require "dynamic/utils.php";
require "dynamic/colors.php";

$URL_PREFIX = "index.php";
$CATEGORIES = array(
                    "Sweet",
                    "Savory",
                    "Grill",
                    "Microwave",
                    "Oven",
                    "Stove",
                    "Breakfast",
                    "Lunch",
                    "Dinner",
                    "Snack"
);
$THEMES = array(
                "Catppuccin-Mocha" => "Catppuccin Mocha",
                "Gruvbox-Dark" => "Gruvbox Dark",
                "Rose-Pine-Moon" => "Rosé Pine Moon",
                "Dracula" => "Dracula"
);

if (!array_key_exists($_COOKIE['theme'], $THEMES)) {
    $url = current_url();
    setcookie('theme', 'Gruvbox-Dark', time() + (86400 * 30), "/");
    header("Location:". $url);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link type='text/css' rel='stylesheet' href='css/style.css' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Simple Recipe Page</title>
    <?php print_theme_css(); ?>
</head>
