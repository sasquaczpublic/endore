<?php
ob_start();
session_start();
define('title','Ekwipunek');
include_once 'system/config.php';
include_once 'templates/header.php';
login();
live($user['zyw']);

include_once 'equipment/weapon.php';
//include_once 'equipment/head.php';

include_once 'templates/footer.php';
?>