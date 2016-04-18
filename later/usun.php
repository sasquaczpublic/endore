<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	if ($_GET['act'] == 'ok')
	{
		mysql_query('DELETE `user` WHERE `id` = '.$user['id'].' ');
		echo ('Potwierdzono');
	}
	
	else{
	
		echo ("Tutaj możesz dokonać kasacji swojej postaci.<br>
<br><a href='?act=ok'>potwierdź</a>");
	
	}
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>