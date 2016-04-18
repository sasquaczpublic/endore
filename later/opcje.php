<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	$query = mysql_query('SELECT `username` FROM `user` WHERE `id` = '.$user['ostatni'].' ');
	$kto = mysql_fetch_assoc($query);	
	?>
	
	<br>

<a href="reset.php">Zresetuj postać </a>
<a href="usun.php">Usuń postać </a>

</center>
		
	<?
		
	
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>