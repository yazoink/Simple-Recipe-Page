<?php 
require "dynamic/globals.php";
require "dynamic/utils.php";
require "dynamic/print_pages.php";

$json_str = file_get_contents('json/recipes.json');
$json = json_decode($json_str, true);

if (array_key_exists('l', $_GET) && $_GET['l'] == "Random Recipe") {
    $recipe = find_random_recipe($json);
}

require "dynamic/header.php";
?>
<div class='container'>
    <div class='title'>
    <a href='index.php'><h1>Simple Recipe Page</h1></a>
    </div>
    <div class='navbar'>
        <h2>Navigation</h2><br />
        <h3>Links</h3>
        <ul>
        <li><a href='index.php'>Home</a></li>
        <li><a href='<?php echo $_SERVER['PHP_SELF']; ?>?l=All+Recipes'>All Recipes</a></li>
        <li><a href='<?php echo $_SERVER['PHP_SELF']; ?>?l=Random+Recipe'>Random Recipe</a></li>
        <li><a href='<?php echo $_SERVER['PHP_SELF']; ?>?l=Credits'>Credits</a></li>
        </ul>
        <h3>Featured</h3>
        <ul>
            <?php
            foreach ($json as $elem) {
                if ($elem['featured'] == true) {
                    $url = $_SERVER['PHP_SELF'] . "?r=" . str_replace(' ', '+', $elem['title']);
                    echo "<li><a href='" . $url . "'>" . $elem['title'] . "</a></li>";
                }
            }
            ?>
        </ul>
        <h3>Categories</h3>
        <ul>
            <?php
            foreach ($CATEGORIES as $category) {
                echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?c=" . $category . "'>" . $category . "</a></li>";
            }
            ?>
        </ul>
    <?php require "dynamic/theme_menu.php"; ?>
    </div>
    <div class='content'>
    <?php
    if (array_key_exists('l', $_GET)) {
        if ($_GET['l'] == 'All Recipes') {
            print_all_recipes($json);
        } elseif ($_GET['l'] == 'Random Recipe') {
            print_recipe($recipe);
        } elseif ($_GET['l'] == 'Credits') {
            require "static/credits.html";
        } else {
            echo "<p>Page not found :(</p>";
        }
    } elseif (array_key_exists('c', $_GET)) {
        print_category($json, $_GET['c']);
    } elseif (array_key_exists('r', $_GET)) {
        $title = str_replace('+', ' ', $_GET['r']);
        $recipe = find_recipe($json, $title);
        print_recipe($recipe);
    } else {
        require "static/home.html";
    }
    ?>
    </div>
    <div class='foot'>
        <p>Created by <a href='https://yazo.ink'>yazoink</a>.</p>
    </div>
</div>
</html>
