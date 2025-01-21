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

function print_theme_css() {
    echo "<style>";
    $theme = "css/themes/" . $_COOKIE['theme'] . ".css";
    require $theme;
    echo "html { background: var(--bg2); }";
    echo ".container { color: var(--fg); background: var(--bg0); }";
    echo "a { color: var(--a); }";
    echo "a:hover { color: var(--a-hover); }";
    echo "h1 { color: var(--h1); }";
    echo "a:hover h1 { color: var(--a-h1-hover); }";
    echo "h2 { color: var(--h2); }";
    echo "a:hover h2 { color: var(--a-h2-hover); }";
    echo "h3 { color: var(--h3); }";
    echo "hr { border-top: 2px dashed var(--hr); }";
    echo ".button, select { background-color: var(--bg2); }";
    echo ".button, select { color: var(--fg); }";
    echo ".navbar, .content { background-color: var(--bg1); }";
    echo "ol>li:before, li::marker { color: var(--li-marker); }";
    echo "</style>";
}
?>
