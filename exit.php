<?php
    setcookie('verify', $uss['login'], time() - 360 * 2, "/");
    header('Location: index.php');
?>
