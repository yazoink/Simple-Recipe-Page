<?php
function print_all_recipes($json) {
    echo "<a href='" . $URL_PREFIX . "?l=All+Recipes'><h2>All Recipes</h2></a>";
    echo "<hr />";
    echo "<p>This page contains every recipe on this website in alphabetical order.</p>";
    echo "<ul>";
    foreach($json as $elem)  {
        $url = $URL_PREFIX . "?r=" . str_replace(' ', '+', $elem['title']);
        echo "<li><a href='". $url . "'>" . $elem['title'] . "</a></li>";
    }
    echo "</ul>";
}

function print_category($json, $category) {
    $results_found = false;
    $url = $URL_PREFIX . "?c=" . str_replace(' ', '+', $category);
    echo "<a href='" . $url . "'><h2>" . $category . "</h2></a>";
    echo "<hr />";
    echo "<ul>";
    foreach($json as $elem) {
        $categories = $elem['categories'];
        if (in_array($category, $categories)) {
            $results_found = true;
            $url = $URL_PREFIX . "?r=" . str_replace(' ', '+', $elem['title']);
            echo "<li><a href='". $url . "'>" . $elem['title'] . "</a></li>";
        }
    }
    echo "</ul>";
    if (!$results_found) {
        echo "<p>No results found :(</p>";
    }
}

function print_recipe($recipe) {
    $description = $recipe['description'];
    $ingredients = $recipe['ingredients'];
    $directions = $recipe['directions'];
    $categories = $recipe['categories'];
    $url = $URL_PREFIX . "?r=" . str_replace(' ', '+', $recipe['title']);
    echo "<a href='". $url . "'><h2>" . $recipe['title'] . "</h2></a>";
    echo "<hr />";
    if (!empty($description)) {
        echo "<p>" . $description . "</p>";
    }
    echo "<h3>Ingredients</h3>";
    echo "<ul>";
    foreach ($ingredients as $elem) {
        echo "<li>" . $elem . "</li>";
    }
    echo "</ul>";
    echo "<h3>Directions</h3>";
    echo "<ol>";
    foreach ($directions as $elem) {
        echo "<li>" . $elem . "</li>";
    }
    echo "</ol>";
    echo "<hr />";
    echo "<h3>Categories</h3>";
    echo "<ul>";
    foreach($categories as $elem) {
        $url = $URL_PREFIX . "?c=" . str_replace(' ', '+', $elem);
        echo "<li><a href='". $url . "'>" . $elem . "</a></li>";
    }
    echo "</ul>";
}

function find_recipe ($json, $title) {
    $recipe = null;
    foreach ($json as $recipe) {
        if ($recipe['title'] == $title) {
            return $recipe;
        }
    }
    if ($recipe == null) {
        echo "<p>Page not found :(</p>";
        return;
    }
}

function find_random_recipe ($json) {
    $max = count($json) - 1;
    $index = rand(0, $max);
    $recipe = $json[$index];
    return $recipe;
}


?>
