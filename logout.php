<?php
ob_start();
session_start();
define('title','Opuszczanie królestwa');
include_once 'system/config.php';
include_once 'templates/header2.php';
login();
	

session_unset();	
session_destroy();	
echo ('Jesteś wylogowywany...');
move("index.php");

include_once 'templates/footer2.php';
?>