-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Abr-2017 às 01:52
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eleicao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`id_candidato`, `nome`, `idade`, `id_partido`) VALUES
(1, 'LuÃ­s InÃ¡cio Lula da Silva', 71, 1),
(2, 'Michel Miguel Elias Temer Lulia', 76, 3),
(3, 'Germano AntÃ´nio Rigotto', 67, 2),
(17, 'lucasa', 18, 2),
(18, 'Lucao', 20, 3),
(19, 'Candidato', 20, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor`
--

CREATE TABLE `eleitor` (
  `id_eleitor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `titulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eleitor`
--

INSERT INTO `eleitor` (`id_eleitor`, `nome`, `idade`, `titulo`) VALUES
(1, 'Lucas de Lima Silva', 18, 1),
(2, 'Eleitor', 18, 10),
(3, 'Lucas Lima', 15, 15),
(4, 'Lucas', 151, 12),
(5, 'Lucas', 14, 11),
(6, 'asdas', 0, 515),
(9, 'lansj', 515, 15151),
(10, 'jansd', 18, 13),
(14, 'Candidato', 18, 177);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partido`
--

CREATE TABLE `partido` (
  `id_partido` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `partido`
--

INSERT INTO `partido` (`id_partido`, `nome`, `numero`) VALUES
(1, 'PT', 13),
(2, 'PSDB', 45),
(3, 'PMDB', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `voto`
--

CREATE TABLE `voto` (
  `id_candidato` int(11) NOT NULL,
  `votos` int(11) NOT NULL,
  `titulos` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `voto`
--

INSERT INTO `voto` (`id_candidato`, `votos`, `titulos`) VALUES
(1, 2, '/1/10'),
(2, 2, '/15/12'),
(3, 0, ''),
(17, 0, ''),
(18, 1, '/177'),
(19, 1, '/13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Indexes for table `eleitor`
--
ALTER TABLE `eleitor`
  ADD PRIMARY KEY (`id_eleitor`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indexes for table `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id_partido`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `eleitor`
--
ALTER TABLE `eleitor`
  MODIFY `id_eleitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `partido`
--
ALTER TABLE `partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
