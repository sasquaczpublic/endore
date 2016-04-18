<?php
ob_start();
session_start();
define('title','<-!PAGENAME!->');
include_once 'system/config.php';
include_once 'templates/header.php';
login();
live($user['zyw']);


$co = $_GET['rodzaj'];
if (isset($_GET['item']))
{
	 if (ereg("^[0-9]*$", $_GET['item']) && !empty($_GET['item']))
	 {
		 $weapon = mysql_fetch_array(mysql_query('SELECT * FROM '.$co.' WHERE `itemid`='.$_GET['item']));
		 if ($weapon == true)
		 {
			if ($weapon['price'] <= $user['money'])
			{
					 mysql_query('INSERT into equipment (itemid, user, type, wt, max_wt) VALUES ('.$weapon['itemid'].','.$user['id'].', "weapon", '.$weapon['wt'].','.$weapon['wt'].') ');
					 mysql_query('UPDATE `user` SET `money`=`money` - '.$weapon['price'].' WHERE `id`= '.$user['id'].' ');
				    echo 'Kupiono '.$weapon['name'].'<meta http-equiv="Refresh" content="2; url=?rodzaj='.$co.'" />';
			}
			else echo '<font style="color:red;">Nie stać Cię!</font>';
		 }
		 else echo '<font style="color:red;">Nie ma takiego przedmiotu w sklepie!</font>';
	 }
	 else echo '<font style="color:red;">Nie ma takiego przedmiotu w sklepie!</font>';

}

elseif (isset($co))
{		

	$q = mysql_query('SELECT * FROM '.$co.' WHERE `public` = 1');
	if(@!mysql_num_rows($q)) echo 'Nie możesz nic tutaj kupić.';
					
	else
	{						
		echo('<table width="100%" border="0"><tr><td>Nazwa</td><td>Wytrzymałość</td><td>Bonus</td><td>Cena</td><td>&nbsp;</td></tr>');
		while($list = mysql_fetch_assoc($q))$show[] = $list;
		foreach ($show as $row)  
		{
			echo '<tr><td>'.$row['name'].'</td><td>'.$row['power'].'</td><td>'.$row['itemid'].'</td><td>'.$row['price'].' <td/><td><strong><a href="?rodzaj='.$co.'&item='.$row['itemid'].'">kup</a></strong></td></tr><br>';
		}
		echo('</table>');	
	}	
	
}
	
	
else
{
echo ('<a href="?rodzaj=weapon">weapon</a>');	
}


include_once 'templates/footer.php';
?>