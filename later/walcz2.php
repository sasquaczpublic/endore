<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	if ($user['hp'] <= 0){
		echo('Jesteś martwy');
		}
			
	elseif ($user['energia'] < 1){
		echo('Nie masz siły na walkę, poczekaj do jutra');
		}
	
	elseif(ctype_digit($_GET['id'])) 
{
	
	
	
	
$query = mysql_query('SELECT * FROM `user` WHERE `id` = '.$_GET['id']);
	if( mysql_num_rows($query) == 0 ) echo 'Nie znasz tej osoby.';
	
	else
	{
	$enemy = mysql_fetch_assoc($query);
	if($enemy['hp'] == 0) echo 'On jest martwy, zostaw go w spokoju!';
	elseif($user['ostatni'] == $enemy['id']) echo 'Chcesz dobić umierającego?!';
	elseif($user['id'] == $_GET['id']) echo 'Głupcze!';
	else
		{
	
	$limitrund = 0;

	while(1)
	{	
	
	$limitrund = $limitrund++;
	
	$userd = round(rand(1, 10) + ($user['sila'] * ($user['hp'] / $user['max_hp'])));
	$enemyd = round(rand(1, 10)+ ($enemy['sila'] * ($enemy['hp'] / $enemy['max_hp'])));
	
	
		if ($user['szybkosc'] + rand(1, 50) > $enemy['szybkosc'] + rand(1, 50)) {
		
		echo("<img src='obrazki/w.gif'/>".$user['username']." atakuje pierwszy swojego przeciwnika<br>");
		
		if ($user['zrecznosc'] + rand (1, 60) > $enemy['zrecznosc'] + rand (1, 60)) {
		
		echo("<img src='obrazki/w.gif'/>".$user['username'].' trafia przeciwnika<br>');
		
		
		echo("<img src='obrazki/w.gif'/>".$user['username'].' zadaje '."$userd".' obrażeń<br>');
		
		$enemy['hp'] = $enemy['hp'] - $userd;
		
		if($user['hp']  <= 0)
		{
			$kasa = round($user['kasa'] / rand(1, 100));
			echo '<br>Zostałeś zabity! Zabrano Ci '.$kasa. ' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `energia`=`energia`-1, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		if($enemy['hp']  <= 0)
		{
			$kasa = round($enemy['kasa'] / rand(1, 100));
			echo '<br>Przeciwnik został zabity! Zabierasz mu '.$kasa.' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `energia`=`energia`-1, `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
		}
		
		
	else {
		echo("<img src='obrazki/w.gif'/>".$user['username'].' nie trafia przeciwnika<br>');
			
		}

	if ($enemy['zrecznosc'] + rand (1, 60)>$user['zrecznosc'] + rand (1, 60)) {
		
		echo("<img src='obrazki/o.gif'/>".$enemy['username'].' trafia Cię<br>');
		
		echo("<img src='obrazki/o.gif'/>".$enemy['username'].' zadaje Ci '."$enemyd".' obrażeń<br>');
		
		$user['hp'] = $user['hp'] - $enemyd;
		
		if($user['hp']  <= 0)
		{
			$kasa = round($user['kasa'] / rand(1, 100));
			echo '<br>Zostałeś zabity! Zabrano Ci '.$kasa. ' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `energia`=`energia`-1, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		if($enemy['hp']  <= 0)
		{
			$kasa = round($enemy['kasa'] / rand(1, 100));
			echo '<br>Przeciwnik został zabity! Zabierasz mu '.$kasa.' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `energia`=`energia`-1, `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
	}
	
	else {
		echo("<img src='obrazki/o.gif'/>".$enemy['username'].' nie trafia przeciwnika<br>');
	
	}
	
		}
		
		elseif ($enemy['szybkosc'] + rand(1, 50) > $user['szybkosc'] + rand(1, 50))
	
	{
	
	echo("<img src='obrazki/o.gif'/>".$enemy['username']." atakuje Cie jako pierwszy<br>");
	
	if ($enemy['zrecznosc'] + rand (1, 60)>$user['zrecznosc'] + rand (1, 60)) {
		
		echo("<img src='obrazki/o.gif'/>".$enemy['username'].' trafia Cię<br>');
		
		echo("<img src='obrazki/o.gif'/>".$enemy['username'].' zadaje Ci '."$enemyd".' obrażeń<br>');
		
		$user['hp'] = $user['hp'] - $enemyd;
		
		if($user['hp']  <= 0)
		{
			$kasa = round($user['kasa'] / rand(1, 100));
			echo '<br>Zostałeś zabity! Zabrano Ci '.$kasa. ' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `energia`=`energia`-1, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		if($enemy['hp']  <= 0)
		{
			$kasa = round($enemy['kasa'] / rand(1, 100));
			echo '<br>Przeciwnik został zabity! Zabierasz mu '.$kasa.' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `energia`=`energia`-1, `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
	}
		
	else {
		echo("<img src='obrazki/o.gif'/>".$enemy['username'].' nie trafia przeciwnika<br>');
	
	}
	

	
	if ($user['szybkosc'] + rand(1, 50) > $enemy['szybkosc'] + rand(1, 50)) {
		
		echo("<img src='obrazki/w.gif'/>".$user['username']." atakuje pierwszy swojego przeciwnika<br>");
		
		if ($user['zrecznosc'] + rand (1, 60) > $enemy['zrecznosc'] + rand (1, 60)) {
		
		echo("<img src='obrazki/w.gif'/>".$user['username'].' trafia przeciwnika<br>');
		
		
		echo("<img src='obrazki/w.gif'/>".$user['username'].' zadaje '."$userd".' obrażeń<br>');
		
		$enemy['hp'] = $enemy['hp'] - $userd;
		
		if($user['hp']  <= 0)
		{
			$kasa = round($user['kasa'] / rand(1, 100));
			echo '<br>Zostałeś zabity! Zabrano Ci '.$kasa. ' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `energia`=`energia`-1, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		if($enemy['hp']  <= 0)
		{
			$kasa = round($enemy['kasa'] / rand(1, 100));
			echo '<br>Przeciwnik został zabity! Zabierasz mu '.$kasa.' sztuk złota<br>';
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `energia`=`energia`-1, `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
		}
		
		
	else {
		echo("<img src='obrazki/w.gif'/>".$user['username'].' nie trafia przeciwnika<br>');
			
		}
		
		
	}
	
		else {
	echo("<img src='obrazki/o.gif'/>"."<img src='obrazki/w.gif'/>".' Nikt nie odważył się zaatakować jako pierwszy<br>');
}

if ($limitrund > 100) break;
	
	}


	}
		}
		
		
	}
}
else
{

echo('W tym miejscu możesz walczyć ze wszystkimi graczami którzy znajdują się w tej samej lokacji co Ty.<br><br>');
	
$q = mysql_query('SELECT * FROM `user` WHERE `id` <> '.$user['id'].' AND `id` <> '.$user['ostatni'].' AND `hp` <> 0 ORDER BY RAND() LIMIT 4');
if(!mysql_num_rows($q)) echo 'Brak sugerowanych graczy!';
else
{
while($r = mysql_fetch_assoc($q))$rows[] = $r;
foreach ($rows as $row) 
{
echo $row['username'].' ma przy sobie '.$row['kasa'].' sztuk złota. <strong><a href="?id='.$row['id'].'">Atak</a></strong> <br/>';
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