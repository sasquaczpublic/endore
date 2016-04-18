<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	if ($user['hp'] <= 0){
		echo('Jesteś martwy');
		}
		
	elseif ($user['hp'] > 0)
		{
	
	if(ctype_digit($_GET['id'])) 
{
	$query = mysql_query('SELECT * FROM `user` WHERE `id` = '.$_GET['id']);
	if( mysql_num_rows($query) == 0 ) echo 'Taki ktoś nie istnieje.';
	else
	{
	$enemy = mysql_fetch_assoc($query);
	if($enemy['hp'] == 0) echo 'Ta osoba jest nie żywa!';
	elseif($user['ostatni'] == $enemy['id']) echo 'Tą osobe ostatnio zaatakowałeś, musisz poczekać do resetu, lub jak ktoś inny ją zaatakuje!';
	elseif($user['id'] == $_GET['id']) echo 'Głupcze!';
	else
		{
	$user['xdmg'] = $user['sila'] + ($user['zrecznosc'] / 2) * $user['szybkosc'];
	$enemy['xdmg'] = $enemy['sila'] + ($enemy['zrecznosc'] / 2) * $enemy['szybkosc'];;
	while(1)
	{
		$userd = $user['xdmg'] + (rand(1,10) + ($user['zrecznosc'] / 2));
		$enemyd = $enemy['xdmg'] + (rand(1,10) + ($enemy['zrecznosc'] / 2));
		echo 'Gracz <font color=green>'.$user['username'].'</font> zadał '.$userd.' obrażeń graczowi '.$enemy['username'].'<br>';
		$enemy['hp'] = $enemy['hp'] - $userd;
		if($user['hp']  <= 0)
		{
			$kasa = $user['kasa'] / rand(1, 100);
			echo 'Zostałeś zabity! Tracisz '.$rk. ' Dolarów oraz '.$rx. 'Expa!';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		if($enemy['hp']  <= 0)
		{
			$kasa = $enemy['kasa'] / rand(1, 100);
			echo 'Przeciwnik został zabity! Dostajesz '.$rk.' Dolarów, oraz '.$rx.' Expa! <br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
		echo 'Gracz <font color=green>'.$enemy['username'].'</font> zadał '.$enemyd.' obrażeń graczowi '.$user['username'].'<br>';
		$user['hp'] = $user['hp'] - $enemyd;
		if($user['hp']  <= 0)
		{
			$kasa = $user['kasa'] / rand(1, 100);
			echo 'Zostałeś zabity! Tracisz '.$rk. ' Dolarów oraz '.$rx. 'Expa!';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		if($enemy['hp']  <= 0)
		{
			$kasa = $enemy['kasa'] / rand(1, 100);
			echo 'Przeciwnik został zabity! Dostajesz '.$rk.' Dolarów, oraz '.$rx.' Expa! <br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
	}
		}
	}
}
else
{

	
$q = mysql_query('SELECT * FROM `user` WHERE `id` <> '.$user['id'].' AND `id` <> '.$user['ostatni'].' AND `hp` <> 0 ORDER BY RAND() LIMIT 4');
if(!mysql_num_rows($q)) echo 'Brak sugerowanych graczy!';
else
{
while($r = mysql_fetch_assoc($q))$rows[] = $r;
foreach ($rows as $row) 
{
echo $row['username'].' Level: '.$row['kasa'].' <strong><a href="?id='.$row['id'].'">Atak</a></strong> <br/>';
}
}
}

		}


}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>