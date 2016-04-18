<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{




if (isset($_GET['item'])) echo $item.' a to '.$rodzaj;
elseif (isset($_GET['rodzaj'])) echo $rodzaj;
	

}
else
{
header('location: index.php');
}
include_once 'css/foot.php';
?>