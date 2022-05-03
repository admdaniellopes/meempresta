-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/11/2020 às 22:09
-- Versão do servidor: 10.4.14-MariaDB
-- Versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empresta`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `borrow`
--

CREATE TABLE `borrow` (
  `idop` mediumint(8) NOT NULL,
  `idthing` mediumint(8) NOT NULL,
  `idmbrsolic` smallint(6) NOT NULL,
  `idmbrprop` smallint(6) NOT NULL,
  `dataget` date NOT NULL,
  `datareturn` date NOT NULL,
  `dataregistro` datetime NOT NULL,
  `opstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `borrow`
--

INSERT INTO `borrow` (`idop`, `idthing`, `idmbrsolic`, `idmbrprop`, `dataget`, `datareturn`, `dataregistro`, `opstatus`) VALUES
(1, 5, 1, 2, '2020-11-26', '2020-11-27', '2020-11-25 20:16:52', 'inativo'),
(2, 4, 1, 2, '2020-11-26', '2020-11-27', '2020-11-25 20:25:41', 'ativo'),
(3, 5, 3, 2, '2020-11-26', '2020-11-28', '2020-11-25 20:28:34', 'inativo'),
(4, 6, 2, 3, '2020-11-27', '2020-11-30', '2020-11-25 20:29:27', 'ativo'),
(5, 2, 2, 1, '2020-11-19', '2020-11-23', '2020-11-25 20:29:58', 'inativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `member`
--

CREATE TABLE `member` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `telefone` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `numero` smallint(5) UNSIGNED NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  `dataregistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `member`
--

INSERT INTO `member` (`id`, `nome`, `sobrenome`, `sexo`, `telefone`, `email`, `endereco`, `numero`, `complemento`, `cidade`, `uf`, `cep`, `senha`, `dataregistro`) VALUES
(1, 'Peter', 'Parker', 'Masculino', 99988887777, 'peterparker@gmail.com', 'One St', 10, 'Ap01', 'New York', 'NY', '11.111-000', 'f394006a950cef45436163bf96ec546f', '2020-11-25 20:03:23'),
(2, 'Bruce', 'Wayne', 'Masculino', 77889911, 'brucewayne@gmail.com', 'Two St', 20, 'Ap02', 'Gothan', 'GO', '22.333-444', 'f394006a950cef45436163bf96ec546f', '2020-11-25 20:04:30'),
(3, 'Thor', 'Thundergod', 'Masculino', 123456789, 'thor@gmail.com', 'Lightnning Av', 30, 'Ap03', 'Asgard', 'AS', '44.666-000', 'f394006a950cef45436163bf96ec546f', '2020-11-25 20:06:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `memberadmin`
--

CREATE TABLE `memberadmin` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `memberadmin`
--

INSERT INTO `memberadmin` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'ADMIN', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `thing`
--

CREATE TABLE `thing` (
  `id` mediumint(8) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `disponibilidade` varchar(20) NOT NULL,
  `idademinima` tinyint(4) NOT NULL,
  `codmember` smallint(6) UNSIGNED NOT NULL,
  `dataregistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `thing`
--

INSERT INTO `thing` (`id`, `categoria`, `nome`, `descricao`, `disponibilidade`, `idademinima`, `codmember`, `dataregistro`) VALUES
(1, 'roupas', 'Spiderman', 'Red & Blue', 'disponível', 21, 1, '2020-11-25 20:12:17'),
(2, 'ferramentas', 'Web Launcher', 'White web', 'disponível', 21, 1, '2020-11-25 20:13:25'),
(3, 'roupas', 'Batman', 'Black & Gray', 'disponível', 21, 2, '2020-11-25 20:14:05'),
(4, 'livros', 'How to get Outlaws', 'Hero Education', 'indisponível', 21, 2, '2020-11-25 20:14:47'),
(5, 'acessorios', 'Batcar', 'With afterburner', 'disponível', 21, 2, '2020-11-25 20:15:58'),
(6, 'ferramentas', 'Stormbraker', 'Axe to fight', 'indisponível', 21, 3, '2020-11-25 20:26:53'),
(7, 'ferramentas', 'Mjolnir', 'hammer to smash', 'disponível', 14, 3, '2020-11-25 20:28:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`idop`);

--
-- Índices de tabela `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `memberadmin`
--
ALTER TABLE `memberadmin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `thing`
--
ALTER TABLE `thing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `borrow`
--
ALTER TABLE `borrow`
  MODIFY `idop` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `member`
--
ALTER TABLE `member`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `thing`
--
ALTER TABLE `thing`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
