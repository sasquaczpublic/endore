<?php



for($rundy = 1; $rundy < 66; $rundy++)
	{
		$dmgu = round(rand(1, 10) + ($cdmgu * ($user['hp'] / $user['max_hp'])));
		$dmge = round(rand(1, 10) + ($cdmge * ($enemy['hp'] / $enemy['max_hp'])));
		
				
		if ($rundy < 1) echo('Dzieli was odległość '.$dystans.' JEDNOSTKA<br>');
		
		if ($dmgu < 0)	
		{
			echo('Twoja broń jest zbyt słaba zaby zranić przeciwnika<br>');
			$kasa = round($user['kasa'] / rand(1, 100));
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$enemy['hp'].', `wygrane`=`wygrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `energia`=`energia`-1, `ostatni` = '.$enemy['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}
		
		if ($dmge < 0)	
		{
			echo('Jego broń jest zbyt słaba aby Ciebie zranić<br>');
			$kasa = round($enemy['kasa'] / rand(1, 100));
			$kasa = $kasa + ($kasa * $user['szczescie']);
			mysql_query('UPDATE `user` SET `kasa`=`kasa` + '.$kasa.', `hp`='.$user['hp'].', `energia`=`energia`-1, `wygrane`=`wygrane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `kasa`=`kasa` - '.$kasa.', `hp` = 0, `ostatni` = '.$user['id'].', `przegrane`=`przegrane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			break;
		}
		
		elseif (rand($user['szybkosc'], ($user['lvl'] * 10)) > rand($enemy['szybkosc'], ($enemy['lvl'] * 10)))
		
		{ echo ('Atakujesz pierwszy swojego przeciwnika<br>');
			if (rand($user['zrecznosc'], ($user['lvl'] * 10)) > rand($enemy['zrecznosc'], ($enemy['lvl'] * 10)))
			{
				if	(100 - ($enemy['zrecznosc'] / ($enemy['sila']*0.25)) < rand(0, 100))	echo('Twój wróg uniknął ciosu<br>');
				elseif (100 - ($enemy['sila'] / ($enemy['zrecznosc']*0.25)) < rand(0, 100))		echo('Twój wróg sparował cios<br>');
				else
				{
					$enemy['hp'] = $enemy['hp'] - $dmgu;
					echo('Trafiasz przeciwnika i zadajesz '.$dmgu.' obrażeń<br>');
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
			}
			else echo('Nie trafiasz przeciwnika<br>');
			
			if (rand($user['zrecznosc'], ($user['lvl'] * 10)) < rand($enemy['zrecznosc'], ($enemy['lvl'] * 10)))	
			{
				if	(100 - ($user['zrecznosc'] / ($user['sila']*0.25)) < rand(0, 100))	echo('Uniknełeś ciosu wroga<br>');
				elseif (100 - ($user['sila'] / ($user['zrecznosc']*0.25)) < rand(0, 100))	echo('Sparowałeś cios wroga<br>');
				else
				{
					$user['hp'] = $user['hp'] - $dmge;
					echo('Przeciwnik trafia Cie i zadaje  '.$dmge.' obrażeń<br>');
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
			}
			else	echo('Przeciwnik Cię nie trafia<br>');
						
		}
		
		elseif (rand($user['szybkosc'], ($user['lvl'] * 10)) < rand($enemy['szybkosc'], ($enemy['lvl'] * 10)))
		
		{	echo ('Twój przeciwnik atakuje Cie jako pierwszy<br>');
			if (rand($user['zrecznosc'], ($user['lvl'] * 10)) < rand($enemy['zrecznosc'], ($enemy['lvl'] * 10)))	
			{
				if	(100 - ($user['zrecznosc'] / ($user['sila']*0.25)) < rand(0, 100))	echo('Uniknełeś ciosu wroga<br>');
				elseif (100 - ($user['sila'] / ($user['zrecznosc']*0.25)) < rand(0, 100))		echo('Sparowałeś cios wroga<br>');
				else
				{
					$user['hp'] = $user['hp'] - $dmge;
					echo('Przeciwnik trafia Cie i zadaje  '.$dmge.' obrażeń');
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
			}
			else	echo('Przeciwnik Cię nie trafia<br>');
			
			if (rand($user['zrecznosc'], ($user['lvl'] * 10)) > rand($enemy['zrecznosc'], ($enemy['lvl'] * 10)))
			{
				if	(100 - ($enemy['zrecznosc'] / ($enemy['sila']*0.25)) < rand(0, 100))	echo('Twój wróg uniknął ciosu<br>');
				elseif (100 - ($enemy['sila'] / ($enemy['zrecznosc']*0.25)) < rand(0, 100))		echo('Twój wróg sparował cios<br>');
				else
				{
					$enemy['hp'] = $enemy['hp'] - $dmgu;
					echo('Trafiasz przeciwnika i zadajesz '.$dmgu.' obrażeń');
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
			}
		}
		
		else
		{
			echo('Nikt nie odważył się zaatakować jako pierwszy<br>');			
		}
			
		if ($rundy > 64)
		{
			echo('Walka trwała zbyt długo i nie została rozstrzygnięta.');
			mysql_query('UPDATE `user` SET `hp`='.$enemy['hp'].', `remisowane`=`ramisowane`+1 WHERE `id` = '.$enemy['id'].' LIMIT 1');
			mysql_query('UPDATE `user` SET `hp`='.$user['hp'].', `remisowane`=`ramisowane`+1 WHERE `id` = '.$user['id'].' LIMIT 1');
			break;
		}

	}


?>