<?php
session_start();
ob_start();
define('title','Trochę o Tobie!');
include_once 'system/config.php';
include_once 'templates/header.php';
login();


if(ctype_digit($_GET['id'])) 
{
	$info = mysql_fetch_assoc(mysql_query('SELECT * FROM `user` WHERE `id` = '.$_GET['id']));
	$last_win = mysql_fetch_assoc(mysql_query('SELECT `username` FROM `user` WHERE `id` = '.$user['last_win']));
	$last_lost = mysql_fetch_assoc(mysql_query('SELECT `username` FROM `user` WHERE `id` = '.$user['last_lost']));
?>
	
    <br>
   	<center>
   	  <table width="75%" border="0" style="border-color:#FFF;">
   	  
        <tr>
          <th colspan="8" scope="col"><? echo $info['username'] ?></th>
        </tr>
        <tr>
          <td width="51%" colspan="7" align="right">Rasa</td>
          <td width="51%" align="left"><? echo $info['race'] ?></td>
        </tr>
        <tr>
          <td width="51%" colspan="7" align="right">Klasa</td>
          <td width="51%" align="left"><? echo $info['class'] ?></td>
        </tr>
        <tr>
          <td width="51%" colspan="7" align="right">Wiek</td>
          <td width="51%" align="left"><? echo $info['age'] ?></td>
        </tr>
        </table>
        <table width="194px" style="text-align:center">
<tr style="text-align:right">
  <td colspan="8">Cechy pierwszorzędne</td></tr>
<tr>
  <td>Ww</td>
  <td>Us</td>
  <td>K</td>
  <td>Odp</td>
  <td>Zr</td>
  <td>Int</td>
  <td>Sw</td>
  <td>Ogd</td>
</tr>
<tr>
  <td><? echo $user['ww']; ?></td>
  <td><? echo $user['us']; ?></td>
  <td><? echo $user['k']; ?></td>
  <td><? echo $user['odp']; ?></td>
  <td><? echo $user['zr']; ?></td>
  <td><? echo $user['int']; ?></td>
  <td><? echo $user['sw']; ?></td>
  <td><? echo $user['ogd']; ?></td>
</tr>
</table>
<table style="text-align:center" width="194px">
<tr width="180px" style="text-align:right">
  <td colspan="6">Cechy drugorzędne</td>
</tr>
<tr>
  <td>A</td>
  <td>Żyw</td>
  <td>S</td>
  <td>Wt</td>
  <td>Sz</td>
  <td>Mag</td>
  </tr>
<tr>
  <td><? echo $user['a']; ?></td>
  <td><? echo $user['zyw']."/".$user['max_zyw']; ?></td>
  <td><? echo $user['s']; ?></td>
  <td><? echo $user['wt']; ?></td>
  <td><? echo $user['sz']; ?></td>
  <td><? echo $user['mag']; ?></td>
  </tr>
</table>
        <table width="75%" border="0" style="border-color:#FFF;">
        <?
	if ($info['username'] == $user['username'])
	{
	?>
        <tr>
          <td width="51%" colspan="7" align="right">Złoto</td>
          <td width="51%" align="left"><? echo $info['money'] ?></td>
        </tr>
  <?
	}
	?>

<tr>
  <td width="51%" colspan="7" align="right">Wygrane walki</td>
  <td width="51%" align="left"><? echo $info['battle_win'] ?></td>
</tr>
<tr>
  <td width="51%" colspan="7" align="right">Przegrane walki</td>
  <td width="51%" align="left"><? echo $info['battle'] - $info['battle_win'] ?></td>
</tr>
<tr>
  <td width="51%" colspan="7" align="right">Ostatnio zabił
    <? if ($info['username'] == $user['username']) echo "eś"; ?></td>
  <td width="51%" align="left"><? echo $last_win['username'] ?></td>
</tr>
<tr>
  <td width="51%" colspan="7" align="right">Ostatnio został
    <? if ($info['username'] == $user['username']) echo "eś"; ?>
    zabity przez</td>
  <td width="51%" align="left"><? echo $last_win['username'] ?></td>
</tr>

   	  </table>
   	  <br><br><p align="right">
	</p>
		</center>      
		<?    
    
}		
	
include_once 'templates/footer.php';
?>