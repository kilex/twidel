-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 19 2012 г., 22:39
-- Версия сервера: 5.1.61
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u763822110_td`
--

-- --------------------------------------------------------

--
-- Структура таблицы `td_access`
--

DROP TABLE IF EXISTS `td_access`;
CREATE TABLE IF NOT EXISTS `td_access` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `accessto` int(10) NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq` (`userid`,`accessto`),
  KEY `accessto` (`accessto`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=68 ;

-- --------------------------------------------------------

--
-- Структура таблицы `td_log`
--

DROP TABLE IF EXISTS `td_log`;
CREATE TABLE IF NOT EXISTS `td_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dt` datetime NOT NULL,
  `text` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `td_tokens`
--

DROP TABLE IF EXISTS `td_tokens`;
CREATE TABLE IF NOT EXISTS `td_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Структура таблицы `td_usernames`
--

DROP TABLE IF EXISTS `td_usernames`;
CREATE TABLE IF NOT EXISTS `td_usernames` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `username` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `dt` datetime NOT NULL,
  `avatar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;
