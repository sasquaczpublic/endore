<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	if ($_GET['act'] == 'ok')
	{
	
mysql_query('UPDATE `user` SET `hp` = `max_hp`, `energia` = `max_energia`, `wiek` = `wiek` + 1, `ostatni` = 0, `kasa` = `kasa` + `kasa` * 0.02');
	
	
	echo ('Potwierdzono');
	
	}
	
	else{
	
	echo ("Tutaj możesz dokonać \"resetu\" czyli ominąć dzień, pozwoli to na zregenerowanie punktów wytrzymałości, energi.<br>
<br><a href='?act=ok'>potwierdź</a>");
	}
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>