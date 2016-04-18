<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	$kup = $_GET['action'];
	

	if(isset($_GET['kup-bron'])) $_GET['kup-bron'] = (int)$_GET['kup-bron'];
		if (is_int($_GET['kup-bron']))
		{
			$bron = mysql_fetch_assoc(mysql_query('SELECT * FROM `bron` WHERE `itemid` = '.$_GET['kup-bron'].' LIMIT 1'));
			if ($bron['cena'] > $user['kasa']) echo 'Nie stać Cię na to.';
			else
			{
			mysql_query('INSERT into eq (itemid, user, typ, wt, max_wt) VALUES ('.$bron['itemid'].','.$user['id'].', "bron", '.$bron['wt'].','.$bron['wt'].') ');
			echo 'Kupiono '.$bron['nazwa'].'<meta http-equiv="Refresh" content="2; url=?act=bron" />';
			}
		}
		
	else
	{
	
		switch($_GET['act'])
		{
				case 'bron':
						
						$q = mysql_query('SELECT * FROM `bron` WHERE '.$user['lvl'].' > lvl AND `public` = 1');
						if(!mysql_num_rows($q)) echo 'Nie możesz nic tutaj kupić.';
						
						else
						{						
						echo('<table width="100%" border="0"><tr><td>Nazwa</td><td>Wytrzymałość</td><td>Bonus</td><td>Cena</td><td>&nbsp;</td></tr>');
						while($ilosc = mysql_fetch_assoc($q))$rows[] = $ilosc;
						foreach ($rows as $row) 
							{
							
							echo '<tr><td>'.$row['nazwa'].'</td><td>'.$row['sila'].'</td><td>'.$row['itemid'].'</td><td>'.$row['cena'].' <td/><td><strong><a href="?kup-bron='.$row['itemid'].'">kup</a></strong></td></tr><br>';
							}
						}		
						echo('</table>');		
						break;
						
		
						
				default:
				
						echo ('<a href="?act=bron">DODAJ</a>');
		}
	}
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>