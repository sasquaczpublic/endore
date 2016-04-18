<?php
if (!empty($_GET['head-equip'])) $_GET['head-equip'] = (int) $_GET['head-equip'];
if (!empty($_GET['head-unequip'])) $_GET['head-unequip'] = (int) $_GET['head-unequip'];
if (is_int($_GET['head-equip']))
{
	$head = mysql_fetch_assoc(mysql_query('SELECT * FROM `equipment` WHERE `id` = '.$_GET['head-equip'].' LIMIT 1'));
	if ($head['user'] != $user['id'])
	{
		echo 'Nie możesz tego założyć!';
		move("?");	
	}
	elseif ($head['on'] == 1)
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
		mysql_query("UPDATE `equipment` SET `on` = 1 WHERE type = 'head' AND `id`=".$_GET['head-equip']." AND `user`=".$user['id']." LIMIT 1");
		echo 'Założono';
		move("?");	
	}
}
elseif (is_int($_GET['head-unequip']))
{
	$head = mysql_fetch_assoc(mysql_query('SELECT * FROM `equipment` WHERE `id`='.$_GET['head-unequip'].' '));
	if ($head['user'] != $user['id']) 
	{
		echo 'To nie jest twoja broń!';
		move("?");	
	}
	elseif ($head['on']==0)
	{
		echo 'Ta broń nie jest założona!';
		move("?");	
	}
	else
	{
		mysql_query('UPDATE `equipment` SET `on`=0 WHERE `id`='.$_GET['head-unequip']);
		echo 'Ściągnięto';
		move("?");	
	}
}
else
{
	$q=mysql_query('SELECT * FROM `equipment`, `head`  WHERE equipment.user = '.$user['id'].' AND equipment.itemid=head.itemid LIMIT 6');
	if(!mysql_num_rows($q)) 
	{
		echo 'Nie posiadasz nic w ekwipunku!';
	}	
	else
	{
		while($list = mysql_fetch_assoc($q))$show[] = $list;
		foreach ($show as $row) 
		{
			
			if ($row['on']==0)
			{
				echo $row['name'].' <a href="?head-equip='.$row['id'].'">Załóż</a><br>';
			}
			else
			{
				echo $row['name'].' <a style="color:yellow"  href="?head-unequip='.$row['id'].'" >Ściągnij</a><br>';
			}
		}
	}
}

?>