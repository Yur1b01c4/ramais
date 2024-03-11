-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Nov-2022 às 19:51
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intranet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ramal` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `ramal`, `email`, `area`) VALUES
(75, 'Wang Anderson', '548', 'tempor@icloud.org', 'Turkey'),
(76, 'Rebekah Michael', '716', 'hendrerit.neque.in@outlook.net', 'Australia'),
(79, 'Uma Wilson', '608', 'nec@google.org', 'Philippines'),
(83, 'Moses Strickland', '695', 'feugiat@protonmail.org', 'Germany'),
(87, 'Uriel Harris', '633', 'orci@yahoo.org', 'Costa Rica'),
(97, 'Quentin Jensen', '234', 'sit@icloud.org', 'Brazil'),
(99, 'Nigel Massey', '752', 'mauris.sagittis@aol.org', 'Canada'),
(101, 'Sawyer Stewart', '313', 'pellentesque@google.org', 'Ukraine'),
(104, 'Uta Boone', '646', 'leo.cras@google.net', 'Germany'),
(105, 'Stewart Odom', '697', 'ligula.elit@protonmail.net', 'Germany'),
(107, 'Moses Moreno', '752', 'pellentesque.ut@yahoo.ca', 'Mexico'),
(109, 'Rana Adkins', '693', 'donec.tincidunt.donec@icloud.ca', 'Turkey'),
(119, 'Zoe Phillips', '386', 'sed.leo.cras@google.org', 'Colombia'),
(127, 'Regina Luna', '536', 'nisi@icloud.ca', 'Australia'),
(130, 'Ryder Frank', '595', 'justo.eu.arcu@aol.net', 'Ireland'),
(131, 'Winifred Potter', '895', 'at.auctor@aol.net', 'Singapore'),
(132, 'Otto Williamson', '598', 'sed.dictum@google.couk', 'Costa Rica'),
(145, 'yuri', '555', 'yuri@gmail.com', 't.i'),
(146, 'alison', '444', 'alisson@gmail.com', 't.i'),
(147, 'yuri', '333', 'yuri1@gmail.com', 't.i'),
(148, 'yuri', '555', 'yuri2@gmail.com', 't.i');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `ativo` varchar(3) NOT NULL DEFAULT 'SIM',
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `ativo`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Jonas Baptista Franco', 'jonas', '$2y$10$cSj5tJNepYbHAYxIVE4g0.h1x.9fnQlqUX4eAKjpb4.aAD0BM5P26', 'SIM', '2022-11-01 00:00:00', '2022-11-01 15:02:06'),
(2, 'Telma', 'telma', '$2y$10$oUsffxHq2CbKKWtm39dj7ewqPgHeCDUdjquLPQVG5S6bIXJ7LfzXK', 'SIM', '2022-11-01 00:00:00', '0000-00-00 00:00:00');
(3, 'Yuri de Oliveira Santana', 'yuri', '$2y$10$cSj5tJNepYbHAYxIVE4g0.h1x.9fnQlqUX4eAKjpb4.aAD0BM5P26', 'SIM', '2022-11-01 00:00:00', '2022-11-01 15:02:06'),
(4, 'Eduardo Coltri Urbano', 'eduardo', '$2y$10$cSj5tJNepYbHAYxIVE4g0.h1x.9fnQlqUX4eAKjpb4.aAD0BM5P26', 'SIM', '2022-11-01 00:00:00', '2022-11-01 15:02:06'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
