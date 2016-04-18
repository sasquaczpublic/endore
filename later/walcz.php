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
	
	
	
	$dystans = rand(1, ($user['szybkosc'] + $enemy['szybkosc']));
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
	
	$cdmgu = $user['sila'];
	$cdmge = $enemy['sila'];
	

	
	include_once 'system.php';

}
	}
		}
else
{

echo('W tym miejscu możesz walczyć ze wszystkimi graczami którzy znajdują się w tej samej lokacji co Ty.<br><br>');
	
$q = mysql_query('SELECT * FROM `user` WHERE `id` <> '.$user['id'].' AND `id` <> '.$user['ostatni'].' AND `hp` <> 0 AND `ostatni` <> '.$user['id'].' ORDER BY RAND() LIMIT 4');
if(!mysql_num_rows($q)) echo 'Brak sugerowanych graczy!';
else
{
while($ilosc = mysql_fetch_assoc($q))$rows[] = $ilosc;
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