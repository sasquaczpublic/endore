<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{

	if ($user['sp'] > 0)
	{

	$ile = $user['sila'] + $user['zrecznosc'] + $user['szybkosc'] + $user['kondycja'] + $user['wytrzymalosc'];
	
	if($ile < 5)	$mnoznik = 20;
	elseif($ile < 10)	$mnoznik = 50;
	elseif($ile < 15)	$mnoznik = 100;
	elseif($ile < 20)	$mnoznik = 180;
	elseif($ile < 25)	$mnoznik = 250;
	elseif($ile < 30)	$mnoznik = 400;
	elseif($ile < 40)	$mnoznik = 750;
	elseif($ile < 50)	$mnoznik = 1000;
	elseif($ile < 60)	$mnoznik = 3600;
	elseif($ile < 70)	$mnoznik = 5000;
	elseif($ile < 80)	$mnoznik = 8500;
	elseif($ile < 90)	$mnoznik = 13000;
	elseif($ile < 100)	$mnoznik = 18000;
	elseif($ile < 110)	$mnoznik = 25000;
	elseif($ile < 120)	$mnoznik = 40000;
	elseif($ile < 130)	$mnoznik = 75000;
	elseif($ile < 140)	$mnoznik = 120000;
	elseif($ile < 150)	$mnoznik = 180000;
	elseif($ile < 160)	$mnoznik = 250000;
	elseif($ile < 170)	$mnoznik = 480000;
	elseif($ile < 180)	$mnoznik = 650000;
	elseif($ile < 190)	$mnoznik = 900000;
	elseif($ile < 200)	$mnoznik = 1200000;
	
	
	
	switch($_GET['act'])
	{
	
		case 'sila':
	
			if($user['kasa'] < $mnoznik) 
		
				echo('Nie stać Cię');
	
			elseif($user['sp'] < 0) 
	
				echo('Nie masz wystarczająco punktów statystyk');
				
			elseif($user['lvl'] * 10 * $user['msila'] <= $user['sila']) 
	
				echo('Osiągnąłeś limit statystyki na swój poziom wtajemniczenia <meta http-equiv="Refresh" content="2; url=?" />');
	
			else	
	
	{
		
				echo ('Dzięki temu że straciłeś '. $mnoznik .'  sztuk złota, i jeden punkt statystyk, zyskałeś '.$user['msila'].' punkt siły. <meta http-equiv="Refresh" content="2; url=?" />');	
			
				mysql_query('UPDATE `user` SET `kasa`=`kasa` - '. $mnoznik .', `sila`=`sila` + '. $user['msila'] * 1 .', `sp`=`sp` - 1 WHERE `id`= '.$user['id'].' ');
	}
	
	break;
	
	case 'zrecznosc':
	
			if($user['kasa'] < $mnoznik) 
		
				echo('Nie stać Cię');
	
			elseif($user['sp'] < 0) 
	
				echo('Nie masz wystarczająco punktów statystyk');
			
			elseif($user['lvl'] * 10 * $user['mzrecznosc'] <= $user['zrecznosc']) 
	
				echo('Osiągnąłeś limit statystyki na swój poziom wtajemniczenia <meta http-equiv="Refresh" content="2; url=?" />');
	
			else	
	
	{
		
				echo ('Dzięki temu że straciłeś '. $mnoznik .'  sztuk złota, i jeden punkt statystyk, zyskałeś '.$user['mzrecznosc'].' punkt zręczności. <meta http-equiv="Refresh" content="2; url=?" />');	
			
				mysql_query('UPDATE `user` SET `kasa`=`kasa` - '. $mnoznik .', `zrecznosc`=`zrecznosc` + '. $user['mzrecznosc'] * 1 .', `sp`=`sp` - 1 WHERE `id`= '.$user['id'].' ');
	}
	
	break;
	
	case 'szybkosc':
	
			if($user['kasa'] < $mnoznik) 
		
				echo('Nie stać Cię');
	
			elseif($user['sp'] < 0) 
	
				echo('Nie masz wystarczająco punktów statystyk');
				
			elseif($user['lvl'] * 10 * $user['mszybkosc'] <= $user['szybkosc']) 
	
				echo('Osiągnąłeś limit statystyki na swój poziom wtajemniczenia <meta http-equiv="Refresh" content="2; url=?" />');
	
			else	
	
	{
		
				echo ('Dzięki temu że straciłeś '. $mnoznik .'  sztuk złota, i jeden punkt statystyk, zyskałeś '.$user['mszybkosc'].' punkt szybkości. <meta http-equiv="Refresh" content="2; url=?" />');	
			
				mysql_query('UPDATE `user` SET `kasa`=`kasa` - '. $mnoznik .', `szybkosc`=`szybkosc` + '. $user['mszybkosc'] * 1 .', `sp`=`sp` - 1 WHERE `id`= '.$user['id'].' ');
	}
	
	break;
	
	case 'kondycja':
	
			if($user['kasa'] < $mnoznik) 
		
				echo('Nie stać Cię');
	
			elseif($user['sp'] < 0) 
	
				echo('Nie masz wystarczająco punktów statystyk');
				
			elseif($user['lvl'] * 10 * $user['mkondycja'] <= $user['kondycja']) 
	
				echo('Osiągnąłeś limit statystyki na swój poziom wtajemniczenia <meta http-equiv="Refresh" content="2; url=?" />');
	
			else	
	
	{
		
				echo ('Dzięki temu że straciłeś '. $mnoznik .'  sztuk złota, i jeden punkt statystyk, zyskałeś '.$user['mkondycja'].' punkt kondycji i '. $user['mkondycja'] * 10 .' punktów energi. <meta http-equiv="Refresh" content="2; url=?" />');	
			
				mysql_query('UPDATE `user` SET `kasa`=`kasa` - '. $mnoznik .', `kondycja`=`kondycja` + '. $user['mkondycja'] * 1 .', `max_energia`=`max_energia` + '. 10 * $user['mkondycja'] .', `energia`=`energia` + '. 10 * $user['mkondycja'] .', `sp`=`sp` - 1 WHERE `id`= '.$user['id'].' ');
	}
	
	break;
	
	case 'wytrzymalosc':
	
			if($user['kasa'] < $mnoznik) 
		
				echo('Nie stać Cię');
	
			elseif($user['sp'] < 0) 
	
				echo('Nie masz wystarczająco punktów statystyk');
				
			elseif($user['lvl'] * 10 * $user['mwytrzymalosc'] <= $user['wytrzymalosc']) 
	
				echo('Osiągnąłeś limit statystyki na swój poziom wtajemniczenia <meta http-equiv="Refresh" content="2; url=?" />');
	
			else	
	
	{
		
				echo ('Dzięki temu że straciłeś '. $mnoznik .'  sztuk złota, i jeden punkt statystyk, zyskałeś '.$user['mwytzrymalosc'].' punkt wytrzymałości i '. $user['mwytrzymalosc'] * 10 .' punktów życia. <meta http-equiv="Refresh" content="2; url=?" />');	
			
				mysql_query('UPDATE `user` SET `kasa`=`kasa` - '. $mnoznik .', `wytrzymalosc`=`wytrzymalosc` + '. $user['mwytrzymalosc'] .', `max_hp`=`max_hp` + '. 10 * $user['mwytrzymalosc'] .', `hp`=`hp` + '. 10 * $user['mwytrzymalosc'] .', `sp`=`sp` - 1 WHERE `id`= '.$user['id'].' ');
	}
	
	break;
	
	default:
	
		
	?>
	
	Tutaj możesz zwiększyc swoje statystyki.
	<center>
	<table width="80%" border="1">
	<tr>
		<th colspan="4" scope="col"><? echo $user['username'] ?></th>
	</tr>
	<tr>
		<td width="45%">Siła</td>
		<td width="15%"><? echo $user['sila'] ?></td>	
		<td width="40%"><a href="?act=sila">DODAJ</a></td>
	</tr>
	<tr>
		<td width="45%">Zręczność</td>
		<td width="15%"><? echo $user['zrecznosc'] ?></td>
		<td width="40%"><a href="?act=zrecznosc">DODAJ</a></td>
	</tr>
	<tr>
		<td width="45%">Szybkość</td>
		<td width="15%"><? echo $user['szybkosc'] ?></td>
		<td width="40%"><a href="?act=szybkosc">DODAJ</a></td>
	</tr>
	<tr>
		<td width="45%">Kondycja</td>
		<td width="15%"><? echo $user['kondycja'] ?></td>
		<td width="40%"><a href="?act=kondycja">DODAJ</a></td>
	</tr>
	<tr>
		<td width="45%">Wytrzymałość</td>
		<td width="15%"><? echo $user['wytrzymalosc'] ?></td>
		<td width="40%"><a href="?act=wytrzymalosc">DODAJ</a></td>
	</tr>
</table>
</center>
	<?
	echo ('<br>Posiadasz '.$user['sp'].' punktów statystyk oraz '.$user['kasa'].' sztuk złota.<br>Za podniesienie statystyki zapłacisz '.$mnoznik.' sztuk złota');
	}
	}
	else {
		echo ('Nie posiadasz punktów za które mógł byś zwiększyć statystyki');
	}
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>