<?php
ob_start();
define('title','Portal światów');
include_once 'system/config.php';
include_once 'templates/header2.php';
login("no");


echo ('Witaj w pierwszych ALFA testach nowej gry. Możesz pomóc w jej rozwijaniu, lub poprostu sobie grać ;] Oczywiście mamy nadzieję że zaprosisz do gry kiedy się rozwinie i wejdzie w wersję BETA swoich znajomych z którymi będziesz mógł utworzyć własną gildię i próbować opanować całą krainę. Najbardziej pożądane przez nas byłoby gdybyś się zarejestrował i pomógł nam swoimi pomysłami, lub umiejętnosciami.<br><br>W pierwszej kolejności przeczytaj instrukcję, aby dowiedzieć się czegoś o grze.<br><br> Ekipa prowadząca projekt $_ENDOR');

include_once 'templates/footer2.php';
?>