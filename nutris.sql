-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Out-2023 às 17:51
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nutris`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `especializacao` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`id`, `nome`, `especializacao`, `email`, `telefone`, `senha`) VALUES
(1, 'Carlos ', 'nutrição', NULL, '8288888', '12345'),
(2, 'felipe', 'gordura', NULL, NULL, NULL),
(3, 'Nome do MÃ©dico', 'Cardiologista', 'medico@email.com', '987654321', 'senha456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `idade` int(20) NOT NULL,
  `genero` char(1) NOT NULL COMMENT 'F,M ou T',
  `historico` text,
  `objetivo` text NOT NULL,
  `statusSaude` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `idade`, `genero`, `historico`, `objetivo`, `statusSaude`, `email`, `telefone`, `senha`) VALUES
(1, 'Francisco', 30, 'M', 'Novo histÃ³rico', 'Novo objetivo', 'Bom', 'novoemail@example.com', '123456789', 'novasenha'),
(2, 'gustavo', 18, 'F', 'muito bom ', 'ficar forte', 'bom', NULL, NULL, NULL),
(3, 'Nome do Paciente', 25, 'M', 'HistÃ³rico do Paciente', 'Objetivo do Paciente', 'Bom', 'paciente@email.com', '123456789', 'senha123'),
(4, 'JosÃ©', 25, 'M', 'HistÃ³rico do Paciente', 'Objetivo do Paciente', 'Bom', 'paciente@email.com', '123456789', 'senha123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

DROP TABLE IF EXISTS `receita`;
CREATE TABLE IF NOT EXISTS `receita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `id_paciente` varchar(200) NOT NULL,
  `id_medico` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id`, `descricao`, `data`, `id_paciente`, `id_medico`) VALUES
(1, 'cretina', '2023-10-20', '2', '2'),
(2, 'teste', '2023-10-09', '1', '1'),
(3, 'DescriÃ§Ã£o da Receita', '2023-10-11', '1', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
