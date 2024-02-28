<?php
function theme_selected($name) {
    if ($_COOKIE['theme'] == $name) {
        return true;
    } else {
        return false;
    }
}

function current_url () {
    $url_protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? "https" : "http";
    $dom_name = $_SERVER['HTTP_HOST'];
    $source_uri = $_SERVER['REQUEST_URI'];
    $url_address = $url_protocol . "://" . $dom_name . $source_uri;
    return $url_address;
}
?>
