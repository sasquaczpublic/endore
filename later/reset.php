<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	if ($_GET['act'] == 'ok')
	{
	
		mysql_query('UPDATE `user` SET `wiek` = 1, `klasa` = "",`rasa` = "", `kasa` = 100, `hp` = 10, `max_hp` = 10,`sila` = 1, `zrecznosc` = 1, `szybkosc` = 1, `kondycja` = 1, `wytrzymalosc` = 1, `energia` = 10, `max_energia` = 10, `ostatni` = 0, `wygrane` = 0, `przegrane` = 0 WHERE `id` = '.$user['id'].' ');

			echo ('Potwierdzono');
	
	}
	
	else{
	
		echo ("Tutaj możesz dokonać \"resetu\" swojej postaci, przywrocic ja do stanu ktory byl po jej stworzeniu.<br>
<br><a href='?act=ok'>potwierdź</a>");
	
	}
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>