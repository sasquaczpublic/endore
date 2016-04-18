<?php
ob_start();
session_start();
define('title','Witaj w królestwie');
include_once 'system/config.php';
include_once 'templates/header.php';
login();


echo ('Jeżeli już tutaj jesteś, dziękujemy bardzo że zarejestrowałeś się i zalogowałeś. Możesz pomóc w rozwijaniu projektu, lub poprostu sobie grać chociaż gra narazie ma bardzo mało funkcji, ale cały czas jest rozbudowywana. Po testach PRE-ALFA nowa funkcja zostaje dodana na serwer, i możesz ją już testować.<br><br>Wszystkie propozycje dotyczące nowych miejsc, nowych rzeczy które można by robić w grze, oraz także fabuły możesz kierować na maila tomek.sasquacz@gmail.com<br><br> Ekipa prowadząca projekt $_ENDOR');

include_once 'templates/footer.php';
?>