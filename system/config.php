<?php
ob_start();
session_start();
mysql_connect('localhost','root',''); //£±czymy siê
mysql_select_db('endor'); //Wybieramy baze
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	define('login',true);
	
	$user = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id=".$_SESSION[user_id].""));	
	$weapon = mysql_fetch_array(mysql_query("SELECT * FROM equipment WHERE user=".$user['id']." AND type = 'bron'"));	
	$time = time();	
	mysql_query('UPDATE `user` SET `online` = '.$time.' WHERE `id` = '.$user['id'].' ');	
	$equipment = mysql_fetch_array(mysql_query("SELECT * FROM `equipment` WHERE `user`=".$user['id'].""));	
	mysql_query('DELETE * FROM equipment WHERE wt < 1');
	
	
	function live($user)
	{
		if($user <= 0)
		{
			header('location: hospital.php');
		}
	}
	function localization($user,$localization)
	{
		if($user !== $localization)
		{
			header('location: !!error!!');
		}
	}
}

else
{
	define('login',false);
}

function move($destiny, $destiny_time = 2)
{
	echo "<meta http-equiv='Refresh' content='".$destiny_time."; url=".$destiny."' />";
}
function login($login="yes")
{
	if(login==false && $login=="yes")
	{
		header('location: index.php');
	}
	if(login==true && $login=="no")
	{
		header('location: home.php');
	}
}

?>