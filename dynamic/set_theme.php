<?php
setcookie('theme', $_POST['theme'], time() + (86400 * 30), "/");
header("Location:" . $_POST['url']);
?>
