<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	
		$q = mysql_query('SELECT * FROM '.$co.' WHERE '.$user['lvl'].' > lvl AND `public` = 1');
		if(@!mysql_num_rows($q)) echo 'Nie ma żadnych ogłoszeń.';
						
		else
		{						
			echo('<table width="100%" border="0"><tr><td>Nazwa</td><td>Wytrzymałość</td><td>Bonus</td><td>Cena</td><td>&nbsp;</td></tr>');
			while($ilosc = mysql_fetch_assoc($q))$rows[] = $ilosc;
			foreach ($rows as $row) 
			{
							
				echo '<tr><td>'.$row['nazwa'].'</td><td>'.$row['sila'].'</td><td>'.$row['itemid'].'</td><td>'.$row['cena'].' <td/><td><strong><a href="?rodzaj='.$co.'&item='.$row['itemid'].'">kup</a></strong></td></tr><br>';
			}
			echo('</table>');	
	
}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>