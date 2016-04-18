<?php
if (!empty($_GET['weapon-equip'])) $_GET['weapon-equip'] = (int) $_GET['weapon-equip'];
if (!empty($_GET['weapon-unequip'])) $_GET['weapon-unequip'] = (int) $_GET['weapon-unequip'];
if (is_int($_GET['weapon-equip']))
{
	$weapon = mysql_fetch_assoc(mysql_query('SELECT * FROM `equipment` WHERE `id` = '.$_GET['weapon-equip'].' LIMIT 1'));
	if ($weapon['user'] != $user['id'])
	{
		echo 'Nie możesz tego założyć!';
		move("?");	
	}
	elseif ($weapon['on'] == 1)
	{
		echo 'Ta broń jest już założona!';
		move("?");	
	}
	elseif (mysql_num_rows(mysql_query('SELECT `id` FROM `equipment` WHERE `on`=1 AND `user`='.$user['id']))) 
	{
		echo 'Masz już coś założonego, musisz to ściągnąć, aby założyć coś innego!';
		move("?");	
	}
	else
	{
		mysql_query("UPDATE `equipment` SET `on` = 1 WHERE type = 'weapon' AND `id`=".$_GET['weapon-equip']." AND `user`=".$user['id']." LIMIT 1");
		echo 'Założono';
		move("?");	
	}
}
elseif (is_int($_GET['weapon-unequip']))
{
	$weapon = mysql_fetch_assoc(mysql_query('SELECT * FROM `equipment` WHERE `id`='.$_GET['weapon-unequip'].' '));
	if ($weapon['user'] != $user['id']) 
	{
		echo 'To nie jest twoja broń!';
		move("?");	
	}
	elseif ($weapon['on']==0)
	{
		echo 'Ta broń nie jest założona!';
		move("?");	
	}
	else
	{
		mysql_query('UPDATE `equipment` SET `on`=0 WHERE `id`='.$_GET['weapon-unequip']);
		echo 'Ściągnięto';
		move("?");	
	}
}
else
{	
	if (isset($_GET['weapon-all']))
	{
		$q=mysql_query('SELECT * FROM `equipment`, `weapon`  WHERE equipment.user = '.$user['id'].' AND equipment.itemid=weapon.itemid');
	}
	else
	{
		$q=mysql_query('SELECT * FROM `equipment`, `weapon`  WHERE equipment.user = '.$user['id'].' AND equipment.itemid=weapon.itemid LIMIT 6');
	}
	if(!mysql_num_rows($q)) 
	{
		echo 'Nie posiadasz nic w ekwipunku!';
	}	
	else
	{	
		echo '<center><table border="1px"><tr valign="bottom" align="center" height="110px">';
		$repeat = 0;
		$repeat1 = 1;
		while($list = mysql_fetch_assoc($q))$show[] = $list;
		foreach ($show as $row) 
		{	
			$repeat = $repeat + 1;			
			if ($repeat > 3 * $repeat1 && $repeat <= 3 * $repeat1 + 1)
			{
				echo '</tr><tr valign="bottom" align="center" height="110px">';
				$repeat1 = $repeat1 + 1;
			}
			if ($row['on']==0)
			{
				echo '<td align="bottom" width="110px"><img src="equipment/images/weapons/'.$row['itemid'].'.png"><br>'.$row['name'].' <a href="?weapon-equip='.$row['id'].'">Załóż</a></td>';
			}
			else
			{
				echo '<td width="110px">'.$row['name'].' <a style="color:yellow"  href="?weapon-unequip='.$row['id'].'" >Ściągnij</a></td>';
			}
		}
		echo '</tr></table><a style="text-align:right" href="?weapon-all">Pokaż wszystkie bronie</a></center>';
	}
}


?>