-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Fev-2021 às 22:11
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel_livro`
--

CREATE TABLE `aluguel_livro` (
  `id_aluguel` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_aluguel` datetime NOT NULL,
  `data_vencimento` datetime NOT NULL,
  `confirmado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluguel_livro`
--

INSERT INTO `aluguel_livro` (`id_aluguel`, `id_aluno`, `id_livro`, `data_aluguel`, `data_vencimento`, `confirmado`) VALUES
(12, 8, 6, '2021-02-06 22:04:27', '2021-02-13 22:04:27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `nome_livro` varchar(150) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `isbn`, `nome_livro`, `autor`, `categoria`) VALUES
(6, '123', 'qwe', 'qwe', 'qwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `funcao` varchar(150) NOT NULL,
  `sexo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `funcao`, `sexo`) VALUES
(7, 'Alexandre Nascimento', 'alexandreti123456@gmail.com', '123', 'bibliotecario', 'm'),
(8, 'Alexandre Nascimento', 'alexandre.nascimentoti@gmail.com', '123', 'aluno', 'm'),
(9, 'lolzeiro', 'alexandre.nascimento@persyos.com.br', '123', 'bibliotecario', 'm'),
(10, 'Sabrina Elisama', 'sabrina@gmail.com', '123', 'bibliotecario', 'f'),
(11, 'Flávio Neves', 'flavio@gmail.com', '123', 'bibliotecario', 'm'),
(12, 'Alexandre Nascimento', 'lolzeirorecife@gmail.com', '123', 'aluno', 'm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguel_livro`
--
ALTER TABLE `aluguel_livro`
  ADD PRIMARY KEY (`id_aluguel`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel_livro`
--
ALTER TABLE `aluguel_livro`
  MODIFY `id_aluguel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
