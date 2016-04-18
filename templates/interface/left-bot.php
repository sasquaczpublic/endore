<?
$online = mysql_query('SELECT username, online FROM `user` WHERE `online` > '. time() .' - 600 ');
echo('Ostatnio widziani:<br>');
while($kto = mysql_fetch_assoc($online))$rows[] = $kto;
foreach ($rows as $row) 
{
	if(time() - $row['online'] < 60)
	{
		echo $row['username'].' jest <font color="green">online</font><br/>';
	}
	else
	{
		echo $row['username'].' był '. round(($time - $row['online']) /60) .' minut temu<br/>';
	}
}
?>