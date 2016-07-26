-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jul-2016 às 15:15
-- Versão do servidor: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdeitv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticias`
--

CREATE TABLE IF NOT EXISTS `tb_noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(50) NOT NULL,
  `resumo` varchar(50) NOT NULL,
  `texto_noticia` text NOT NULL,
  `data_noticia` datetime NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_utilizadores`
--

CREATE TABLE IF NOT EXISTS `tb_utilizadores` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `num_funcionario` int(11) NOT NULL,
  `nome_utilizador` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `nivel_utilizador` int(1) NOT NULL,
  `email_funcionario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_utilizadores`
--

INSERT INTO `tb_utilizadores` (`id_user`, `num_funcionario`, `nome_utilizador`, `user_pass`, `nivel_utilizador`, `email_funcionario`) VALUES
(1, 1, 'admin', '$2y$10$C5B88Ap6UxSlnl/OKvYEy.ywgAiyb8.Gamyk37mI4k3jQZgl/cjY2', 0, 'admin@exemplo.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_videos`
--

CREATE TABLE IF NOT EXISTS `tb_videos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `caminho_video` text NOT NULL,
  `titulo_video` varchar(50) DEFAULT NULL,
  `tamanho` text NOT NULL,
  `data_inserido` datetime NOT NULL,
  `inserido_por` text NOT NULL,
  `aceite` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `tb_videos`
--

INSERT INTO `tb_videos` (`id_video`, `caminho_video`, `titulo_video`, `tamanho`, `data_inserido`, `inserido_por`, `aceite`) VALUES
(8, 'Sword_Art_Online_II_Episode_07.mp4', 'Video 25', '75.10 MB', '2016-07-21 14:57:14', 'admin', 1),
(10, 'Sword_Art_Online_II_Episode_01.mp4', 'Video 1', '87.72 MB', '2016-07-20 11:04:21', 'pedro', 1),
(11, 'Sword_Art_Online_II_Episode_16.mp4', 'Video 24', '78.45 MB', '2016-06-30 14:26:35', 'pedro', 1),
(12, '09.mp4', 'Video 9', '71.61 MB', '2016-07-20 11:04:24', 'admin', 1),
(14, '25.mp4', 'Video 25', '82.20 MB', '2016-07-01 11:10:15', 'GonÃƒÂ§alo Ferreia', 1),
(15, 'Sword_Art_Online_II_Episode_23.mp4', '23', '83.49 MB', '2016-07-01 13:28:09', 'admin', 1),
(16, 'Sword_Art_Online_II_Episode_24.mp4', '24', '84.19 MB', '2016-07-01 16:54:54', 'admin', 1),
(20, '18.mp4', 'Video 18', '78.99 MB', '2016-07-08 17:37:18', 'JoÃƒÂ£o Ferreira', 1),
(21, 'small.ogv', 'video ogv', '428.00 KB', '2016-07-11 11:58:06', 'admin', 1),
(32, '18.mp4', 'Video 18', '78.99 MB', '2016-07-12 11:26:07', 'JoÃƒÂ£o Ferreira', 1),
(34, 'SampleVideo_1280x720_5mb.flv', 'Video flv', '5.00 MB', '2016-07-12 11:34:11', 'admin', 1),
(40, 'Sword_Art_Online_II_Episode_01.mp4', '434242', '87.72 MB', '2016-07-21 14:57:19', 'admin', 1),
(41, 'Sword_Art_Online_II_Episode_08.mp4', 'Video 08', '75.01 MB', '2016-07-21 15:33:38', 'admin', 1),
(42, 'Sword_Art_Online_II_Episode_09.mp4', 'Video 09', '78.49 MB', '2016-07-21 16:01:25', 'admin', 1),
(43, 'Sword_Art_Online_II_Episode_10.mp4', 'Video 10', '78.37 MB', '2016-07-21 16:51:02', 'admin', 1),
(44, 'Sword_Art_Online_II_Episode_11.mp4', 'Video 11', '78.50 MB', '2016-07-21 17:06:31', 'admin', 1),
(45, 'Sword_Art_Online_II_Episode_12.mp4', 'Video 12', '78.42 MB', '2016-07-21 17:06:45', 'admin', 1),
(46, '05.mp4', '', '78.14 MB', '2016-07-21 18:02:06', 'admin', 1),
(47, '07.mp4', '', '90.53 MB', '2016-07-21 18:02:17', 'admin', 1),
(48, '23.mp4', '', '85.23 MB', '2016-07-21 18:02:38', 'admin', 1),
(49, '20.mp4', '', '82.41 MB', '2016-07-21 18:03:11', 'admin', 1),
(50, '21.mp4', '', '79.67 MB', '2016-07-21 18:03:23', 'admin', 1),
(51, '24.mp4', '', '82.39 MB', '2016-07-21 18:03:36', 'admin', 1),
(52, '17.mp4', '', '77.93 MB', '2016-07-21 18:03:43', 'admin', 1),
(53, '06.mp4', '', '80.41 MB', '2016-07-21 18:04:05', 'admin', 1),
(54, '08.mp4', '', '77.79 MB', '2016-07-21 18:04:12', 'admin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
