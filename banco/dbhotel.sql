-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2023 às 00:12
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbmotel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbadm`
--

DROP TABLE IF EXISTS `tbadm`;
CREATE TABLE IF NOT EXISTS `tbadm` (
  `codAdm` int NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(60) DEFAULT NULL,
  `emailAdm` varchar(100) NOT NULL,
  `senhaAdm` varchar(50) DEFAULT NULL,
  `tokenAdm` varchar(100) NOT NULL,
  PRIMARY KEY (`codAdm`),
  UNIQUE KEY `tokenAdm` (`tokenAdm`),
  UNIQUE KEY `emailAdm` (`emailAdm`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tbadm`
--

INSERT INTO `tbadm` (`codAdm`, `nomeAdm`, `emailAdm`, `senhaAdm`, `tokenAdm`) VALUES
(21, 'Hugo', 'carvalhohugo425@gmail.com', '123', 'asdjasnfjkasbdkjfbk');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoriaquarto`
--

DROP TABLE IF EXISTS `tbcategoriaquarto`;
CREATE TABLE IF NOT EXISTS `tbcategoriaquarto` (
  `codCategoriaQuarto` int NOT NULL AUTO_INCREMENT,
  `nomeCategoriaQuarto` varchar(60) NOT NULL,
  `itensCategoriaQuarto` varchar(255) NOT NULL,
  `valorHoraCategoriaQuarto` float NOT NULL,
  PRIMARY KEY (`codCategoriaQuarto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tbcategoriaquarto`
--

INSERT INTO `tbcategoriaquarto` (`codCategoriaQuarto`, `nomeCategoriaQuarto`, `itensCategoriaQuarto`, `valorHoraCategoriaQuarto`) VALUES
(7, 'Basica', 'TvSmart', 33.75),
(8, 'Presidencial', '#Hidromassagem#ArCondicionado#TvSmart', 98.95),
(9, 'Intermediária', '#ArCondicionado#TvSmart', 43.75);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
CREATE TABLE IF NOT EXISTS `tbclientes` (
  `codCliente` int NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(60) DEFAULT NULL,
  `emailCliente` varchar(255) DEFAULT NULL,
  `senhaCliente` varchar(50) DEFAULT NULL,
  `cpfCliente` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fotoDocumentoCLiente` varchar(80) DEFAULT NULL,
  `statusCliente` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tbclientes`
--

INSERT INTO `tbclientes` (`codCliente`, `nomeCliente`, `emailCliente`, `senhaCliente`, `cpfCliente`, `fotoDocumentoCLiente`, `statusCliente`) VALUES
(5, 'Fernando', 'fernando@gmail.com', '123', '111.111.111-11', '22205c99d7e1a652ddfacdd24d71f653.jpg', 'Aprovado'),
(6, 'Hugo', 'carvalhohugo425@gmail.com', '123', '222.222.222-22', '479d63fbfbb08f1bdb48f0f0115528dd.jpg', 'Analise'),
(7, 'Miguel', 'miguel@gmail.com', '1234', '333.333.333-33', 'c030db2c4dd8645ba0fc81dc663025c8.jpg', 'Analise'),
(8, 'Zuleica', 'zuleica@gmail.com', '123', '444.444.444-44', 'cd52c8311d245b684a7c4345fbecb2e7.jpg', 'Reprovado'),
(9, 'Luciano', 'luci@gmail.com', '123', '777.777.777-77', 'e0e145a1780df1321001aa607e625241.jpg', 'Reprovado'),
(10, 'Juneca', 'jun@gmail.com', '123', '999.999.999-99', '147dbe26477073f43e6ba4d8cced2421.jpg', 'Reprovado'),
(11, 'Clodoaldo', 'clodo@gmail.com', '123', '909.090.909-09', '63529a6a4f4f58fd1fb2c95b044aaf0c.jpg', 'Reprovado'),
(12, 'Clodoaldo2', 'clodo2@gmail.com', '123', '231.231.231-23', '5c90285c3cd4c12dfa6c0fef01674b29.jpg', 'Reprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbquarto`
--

DROP TABLE IF EXISTS `tbquarto`;
CREATE TABLE IF NOT EXISTS `tbquarto` (
  `codQuarto` int NOT NULL AUTO_INCREMENT,
  `nomeQuarto` varchar(70) NOT NULL,
  `fotoQuarto` varchar(100) NOT NULL,
  `descQuarto` varchar(255) NOT NULL,
  `codCategoriaQuarto` int NOT NULL,
  PRIMARY KEY (`codQuarto`),
  KEY `codCategoriaQuarto` (`codCategoriaQuarto`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tbquarto`
--

INSERT INTO `tbquarto` (`codQuarto`, `nomeQuarto`, `fotoQuarto`, `descQuarto`, `codCategoriaQuarto`) VALUES
(10, 'Suíte Zeus', '38d0d8ddaca4d4f6b7670fcb8b9f888b.jpg', 'Suíte do deus mais forte de todo o Olimpo', 8),
(11, 'Suíte Ares', 'e8335d0831b7a0f26e21a6af79eaa042.jpg', 'O lugar do deus da guerra', 9),
(12, 'Suíte Hera', '3ec49a748a16e5b59171f20382cf67dd.jpg', 'O quarto da deusa das mulheres', 9),
(13, 'Suíte Kratos', 'a5191a3f79bc97b9524754f10aeaca89.jpg', 'I will have my revenge', 8),
(14, 'Suíte Mortal', '38e38df0cfab174ec0cbe7ab02403271.jpg', 'Para uma noite mais em conta', 7),
(15, 'Suíte Poseidon', '174124247a7e8362b307cb95e53172fb.jpg', 'O deus dos mares, promete muitas surpresas', 7),
(16, 'Suíte Hermes', 'b9177fd8da0f577c6f3dfcc5ccf0ab1a.jpg', 'Hermes é um deus paradisíaco', 8),
(17, 'Suíte Athena', 'dac7e81ea3c7b726b5fef4218e92e330.jpg', 'Athena', 7),
(18, 'Suíte Medusa', '3a8f516f7cda8c3f3159eaf533ad3db7.jpg', 'O quarto congelante', 8),
(19, 'Suíte ClodoCiano ', 'a2960ceefc40738b5a493f9f6dc4456d.jpg', 'ai não jovem', 7),
(20, 'Suíte Hélio', '4fed40b9b1ff15acb18499eef6146933.jpg', 'Gas', 7),
(21, 'Suíte Especial', '5e998c36dc280664728a670f218eb010.jpg', 'Para uma aventura jovem', 7),
(22, 'Suíte Hercules', '73dfe471b939cf9d7a211dc5fac0ebac.jpg', 'hercules', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreserva`
--

DROP TABLE IF EXISTS `tbreserva`;
CREATE TABLE IF NOT EXISTS `tbreserva` (
  `codReserva` int NOT NULL AUTO_INCREMENT,
  `qtdHorasReserva` time NOT NULL,
  `dataHoraReserva` datetime NOT NULL,
  `valorTotalReserva` float NOT NULL,
  `statusReserva` varchar(30) NOT NULL,
  `codQuarto` int NOT NULL,
  `codCliente` int NOT NULL,
  PRIMARY KEY (`codReserva`),
  KEY `codQuarto` (`codQuarto`),
  KEY `codCliente` (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tbreserva`
--

INSERT INTO `tbreserva` (`codReserva`, `qtdHorasReserva`, `dataHoraReserva`, `valorTotalReserva`, `statusReserva`, `codQuarto`, `codCliente`) VALUES
(22, '02:00:00', '2023-12-11 23:00:00', 197.9, 'Paga', 10, 5),
(23, '01:00:00', '2023-12-11 23:00:00', 98.95, 'Paga', 13, 5),
(24, '02:00:00', '2023-12-11 23:00:00', 197.9, 'Disponivel', 16, 5),
(25, '02:00:00', '2023-12-28 13:00:00', 123, 'Paga', 19, 5),
(26, '12:00:00', '2023-12-05 09:09:00', 1187.4, 'Disponivel', 10, 5);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbquarto`
--
ALTER TABLE `tbquarto`
  ADD CONSTRAINT `tbquarto_ibfk_1` FOREIGN KEY (`codCategoriaQuarto`) REFERENCES `tbcategoriaquarto` (`codCategoriaQuarto`);

--
-- Limitadores para a tabela `tbreserva`
--
ALTER TABLE `tbreserva`
  ADD CONSTRAINT `tbreserva_ibfk_1` FOREIGN KEY (`codQuarto`) REFERENCES `tbquarto` (`codQuarto`),
  ADD CONSTRAINT `tbreserva_ibfk_2` FOREIGN KEY (`codCliente`) REFERENCES `tbclientes` (`codCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
