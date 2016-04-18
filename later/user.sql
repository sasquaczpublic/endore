-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 12 Mar 2011, 19:46
-- Wersja serwera: 5.0.45
-- Wersja PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `endor`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user`
--

CREATE TABLE `user` (
  `id` tinyint(100) NOT NULL,
  `username` varchar(100) collate utf8_polish_ci NOT NULL,
  `password` varchar(100) collate utf8_polish_ci NOT NULL,
  `rasa` varchar(100) collate utf8_polish_ci NOT NULL,
  `klasa` varchar(100) collate utf8_polish_ci NOT NULL,
  `wiek` smallint(100) NOT NULL default '0',
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
  `ostatni` tinyint(100) NOT NULL default '0',
  `wygrane` int(100) NOT NULL,
  `przegrane` int(100) NOT NULL,
  `online` int(12) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

