-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/06/2023 às 17:11
-- Versão do servidor: 8.0.31-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_emails`
--
CREATE DATABASE IF NOT EXISTS `db_emails` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_emails`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos`
--

DROP TABLE IF EXISTS `acessos`;
CREATE TABLE IF NOT EXISTS `acessos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `matricula` int NOT NULL,
  `setor` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ativo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dta_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dt_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `acessos`
--

INSERT INTO `acessos` (`id`, `usuario`, `senha`, `matricula`, `setor`, `ativo`, `dta_criacao`) VALUES
(1, 'matheus', '$2y$10$XI7KHQ7jYKGA5/paqlLBC.QiF.23qqA1gnf70NF3CfzUwMpMQadQK', 3226, 'adm', 'Sim', '2023-06-28 09:56:36'),
(2, 'jaqueline_motta', '$2y$10$O6uMflwLM4TwBQUhn7sS/e2ouUJSZ4HPRY9Flm6ZzlBAtqH5tZAOS', 2444, 'Comercial Jaque', 'Sim', '2023-06-28 10:01:31'),
(3, 'wesley_borges', '$2y$10$QUdaxYhz6zZe6k1LJ4KOp.4LqbSt/k4GuJbzNBC4LZg/6RgkrO7Tu', 1006, 'Comercial Wesley', 'Sim', '2023-06-28 10:03:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `sophia` varchar(10) NOT NULL,
  `setor` varchar(20) NOT NULL,
  `ativo` varchar(3) NOT NULL,
  `dta_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dta_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `emails`
--

INSERT INTO `emails` (`id`, `nome`, `email`, `senha`, `sophia`, `setor`, `ativo`, `dta_criacao`) VALUES
(1, 'Alice Heidemann', 'alice_heidemann@econeteditora.com.br', 'Zhw10903', 'econet123', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(2, 'Ana Crus', 'ana_crus@econeteditora.com.br', 'Amh70298', '', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(3, 'Anderson Medeiros', 'anderson_medeiros@econeteditora.com.br', 'Qhp82691', '', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(4, 'Bruna Schulze', 'bruna_schulze@econeteditora.com.br', 'Rgj78290', '', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(5, 'Bruna Guimaraes', 'bruna_guimaraes@econeteditora.com.br', 'Ymk22116', 'econet123', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(6, 'Bruna Heloisa', 'bruna_heloisa@econeteditora.com.br', 'Nyi38645', '284317', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(7, 'Daiane Silveira', 'daiane_silveira@econeteditora.com.br', 'Mtu84868', '', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(8, 'Daniele Freitas', 'daniele_freitas@econeteditora.com.br', 'dan89785', 'dan89785', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(9, 'Jannis Fernandes', 'jannis_fernandes@econeteditora.com.br', 'Jna56400', 'jnn81245', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(10, 'Jessica Rosario', 'jessica_rosario@econeteditora.com.br', 'Gjh47097', '', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(11, 'Kaike Fuckner', 'kaike_fuckner@econeteditora.com.br', 'Cec25230', 'econet123', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(12, 'Leonardo Winter', 'leonardo_winter@econeteditora.com.br', 'Olm57871', 'Olm57871', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(13, 'Maurianny Baena', 'maurianny_baena@econeteditora.com.br', 'Cjq99715', 'Cjq123', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(14, 'Raquel Oliveira', 'raquel_oliveira@econeteditora.com.br', 'Yay39965', '', 'Comercial Jaque', 'Não', '2023-04-03 14:06:52'),
(15, 'Samara Santos', 'samara_santos1@econeteditora.com.br', 'Qbl85816', 'Samara0512', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(16, 'Simone Dias', 'simone_dias@econeteditora.com.br', 'Gip44825', 'Gip44830', 'Comercial Jaque', 'Sim', '2023-04-03 14:06:52'),
(19, 'Amanda Manasses', 'amanda_manasses@econeteditora.com.br', 'Lbx50143', '', 'Comercial Wesley', 'Não', '2023-04-03 15:19:11'),
(20, 'Dafni Correa', 'dafni_correa@econeteditora.com.br', 'Klk96981', 'Klk96981', 'Comercial Wesley', 'Sim', '2023-04-03 15:19:11'),
(21, 'Graziela Izenpon', 'graziela_izenpon@econeteditora.com.br', 'Uhr62108', 'econet123', 'Comercial Wesley', 'Sim', '2023-04-03 15:19:11'),
(22, 'Jessica Silva', 'jessica_silva1@econeteditora.com.br', 'Ihh32498', 'econet123', 'Comercial Wesley', 'Sim', '2023-04-03 15:19:11'),
(23, 'Juan Lima', 'juan_lima@econeteditora.com.br', 'Yij72395', 'econet123', 'Comercial Wesley', 'Sim', '2023-04-03 15:19:11'),
(85, 'Kailani Ribeiro', 'kailani_ribeiro@econeteditora.com.br', 'Iuw49892', 'Kte49892', 'Comercial Wesley', 'Sim', '2023-04-05 13:47:03'),
(86, 'Kemelly Silva', 'kemelly_silva@econeteditora.com.br', 'Enb99916', '', 'Comercial Wesley', 'Não', '2023-04-05 13:47:03'),
(87, 'Ketruin Rodrigues', 'ketruin_rodrigues@econeteditora.com.br', 'Uba44438', 'econet123', 'Comercial Wesley', 'Não', '2023-04-05 13:47:03'),
(88, 'Nathaly Franca', 'nathaly_franca@econeteditora.com.br', 'Bja70219', '', 'Comercial Wesley', 'Não', '2023-04-05 13:47:03'),
(89, 'Thalia Gernhard', 'thalia_gernhard@econeteditora.com.br', 'Xha78180', 'Xha220917', 'Comercial Wesley', 'Sim', '2023-04-05 13:47:05'),
(92, 'Bruna Hazure', 'bruna_hazure@econeteditora.com.br', 'Jcm81783', 'econet123', 'Comercial Jaque', 'Sim', '2023-04-18 12:16:09'),
(93, 'Cecilia Junco', 'cecilia_junco@econeteditora.com.br', 'Neo70789', 'econet123', 'Comercial Wesley', 'Sim', '2023-04-18 12:23:58'),
(117, 'Hannely Santos', 'hannely_santos@econeteditora.com.br', 'Gao70570', 'econet123', 'Comercial Wesley', 'Sim', '2023-04-18 16:58:06'),
(121, 'Helayni Silva', 'helayni_silva@econeteditora.com.br', 'Srs93087', '', 'Comercial Jaque', 'Não', '2023-04-18 17:07:51'),
(122, 'Iosef Orona', 'iosef_orona@econeteditora.com.br', 'Kfk45118', 'econet123', 'Comercial Jaque', 'Não', '2023-04-18 17:09:37'),
(123, 'Juliana Silva', 'juliana_eloiza@econeteditora.com.br', 'Dnh17400', '', 'Comercial Jaque', 'Não', '2023-04-18 17:10:59'),
(124, 'Loana Soares', 'loana_soares@econeteditora.com.br', 'Nmw14061', 'econet123', 'Comercial Wesley', 'Não', '2023-04-18 17:18:41'),
(125, 'Luiz Jorge', 'luiz_jorge@econeteditora.com.br', 'Sir22210', 'econet123', 'Comercial Wesley', 'Não', '2023-04-18 17:19:41'),
(127, 'Shirlei Santos', 'shirlei_santos@econeteditora.com.br', 'Igg35303', 'econet123', 'Comercial Jaque', 'Sim', '2023-04-18 17:22:07'),
(128, 'Vitor Spada', 'vitor_spada@econeteditora.com.br', 'Lzi84440', 'econet123', 'Comercial Jaque', 'Sim', '2023-04-18 17:23:06'),
(130, 'Sheyla Matos', 'sheyla_matos@econeteditora.com.br', 'Xrt13803', 'econet123', 'Comercial Wesley', 'Sim', '2023-04-18 17:31:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
