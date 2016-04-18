<?php
ob_start();
session_start();
define('title','Chata znachora.');
include_once 'system/config.php';
include_once 'templates/header.php';
login();

	$do = $user['max_zyw'] - $user['zyw'];
	$ile = $_POST['ile'];
	
	if ($user['zyw'] > 3/4 * $user['max_zyw']) $koszt = 1;
	elseif($user['zyw'] > 1/2 * $user['max_zyw']) $koszt = 2;
	elseif($user['zyw'] > 1/4 * $user['max_zyw']) $koszt = 3;
	elseif($user['zyw'] <= 0) $koszt = 5;
	else $koszt = 4;
		
	if($user['zyw'] >= $user['max_zyw']) echo('Czego tu szukasz?');	
	elseif($ile > $do ) echo('Nie możesz');		
	elseif($user['money'] < $koszt * $ile) echo('Nie stać Cię');		
	elseif ($_GET['act'] == 'lecz')
	{
		if(!preg_match("/^([0-9]*)$/",$ile))
		{
			echo('Nie możesz sprzedać organów');
			move("?");
		}
		else
		{	
			mysql_query('UPDATE `user` SET `money`=`money` - '.$koszt.', `zyw`=`zyw` + '.$ile.' WHERE `id`= '.$user['id'].' ');
			echo ('Zapłaciłeś '.$koszt * $ile.' uleczyłeś '."$ile".' punktów życia');	
			move("?");
		}
	}		
	else
	{
	?>
        Tutaj zostaniesz uleczony. Za punkt życia zapłacisz <? echo("$koszt"); ?>        
        <form action="?act=lecz" method="post" style="text-align:right">
            <table align="center" border="0">
                <tr>
                    <td><strong>Ile chcesz?</strong></td>
                    <td><input name="ile" type="text" value="<? echo("$do"); ?>" /><br></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Ulecz" /><br></td>
                </tr>
            </table>
		</form>
	<?
	}

include_once 'templates/footer.php';
?>