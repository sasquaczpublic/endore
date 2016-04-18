-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 13 Mar 2011, 19:37
-- Wersja serwera: 5.0.45
-- Wersja PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `endor`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `walka`
--

CREATE TABLE `walka` (
  `id` tinyint(100) NOT NULL auto_increment,
  `username` varchar(100) collate utf8_polish_ci NOT NULL,
  `kasa` int(100) NOT NULL default '100',
  `hp` int(100) NOT NULL default '10',
  `max_hp` int(100) NOT NULL default '10',
  `sila` int(100) NOT NULL default '1',
  `zrecznosc` int(100) NOT NULL default '1',
  `szybkosc` int(100) NOT NULL default '1',
  `kondycja` int(100) NOT NULL default '1',
  `wytrzymalosc` int(100) NOT NULL default '1',
  `energia` int(100) NOT NULL default '10',
  `max_energia` int(100) NOT NULL default '10',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `walka`
--

INSERT INTO `walka` (`id`, `username`, `kasa`, `hp`, `max_hp`, `sila`, `zrecznosc`, `szybkosc`, `kondycja`, `wytrzymalosc`, `energia`, `max_energia`) VALUES
(1, 'easy', 100, 10, 10, 1, 1, 1, 1, 1, 10, 10),
(2, 'hard', 1000, 100, 100, 10, 10, 10, 10, 10, 100, 100),
(3, 'nowy', 10000, 1000, 1000, 100, 100, 100, 100, 100, 10, 10),
(4, 'Kolejny', 100000, 10000, 10000, 1000, 1000, 1000, 1000, 1000, 10, 10),
(5, 'extreme', 1000000, 100000, 100000, 10000, 10000, 10000, 10000, 10000, 10, 10),
(6, 'Wacław', 500000, 50000, 50000, 5000, 5000, 5000, 5000, 5000, 10, 10),
(7, 'mortal brutal shot', 50000, 5000, 5000, 500, 500, 500, 500, 500, 10, 10);
