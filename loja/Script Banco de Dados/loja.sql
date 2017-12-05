-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2017 às 19:37
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'esporte'),
(2, 'escolar'),
(3, 'mobilidade'),
(4, 'doce');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT '0',
  `fk_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_fk1` (`fk_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`, `usado`, `fk_user`) VALUES
(2, 'Barco', '5000.00', 'Descricao deste produto', 1, 0, 1),
(3, 'Caneta', '2.00', 'Descricao deste produto', 2, 0, 1),
(18, 'Motocicleta', '10000.00', 'Descricao deste produto', 3, 0, 1),
(21, 'Bola', '90.00', 'Descricao deste produto', 1, 0, 1),
(22, 'Bolo', '40.00', 'Descricao deste produto', 4, 0, 1),
(26, 'Chocolate', '15.00', 'Chocolate', 4, 0, 1),
(27, 'Motocicleta', '5000.00', 'Motin', 1, 0, NULL),
(29, 'Tenis', '200.00', 'Tenis de corrida', 1, 0, 1),
(30, 'Bike', '2001.00', 'Bike monstra', 1, 0, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nm_user` varchar(255) DEFAULT NULL,
  `cd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nm_login_user` varchar(255) DEFAULT NULL,
  `cd_password_user` varchar(255) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`nm_user`, `cd_user`, `nm_login_user`, `cd_password_user`, `foto`) VALUES
('Administrador', 1, 'admin', '1234', '15123564955a24ba8f4a924.jpg'),
('vinicius', 9, 'vini', '1234', 'NULL');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produto_fk1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`cd_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
