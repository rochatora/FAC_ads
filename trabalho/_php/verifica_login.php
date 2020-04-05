<?php
if (!$_SESSION['nm_nome']) {
    header('Location: login.php');
    exit();
}
