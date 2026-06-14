-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/06/2026 às 02:26
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bibliotec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rm` int(10) NOT NULL,
  `turma` varchar(100) NOT NULL,
  `tel` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` int(8) NOT NULL,
  `logra` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `periodo`, `nome`, `rm`, `turma`, `tel`, `email`, `cep`, `logra`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(9, 'Manhã', 'Aluno 01', 0, 'Aluno 01', 1190898778, 'nura@1', 0, 'Aluno 01', 'Aluno 01', 'Aluno 01', 'Aluno 01', 'Aluno 01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_emprestimos` int(10) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id_emprestimos`, `id_aluno`, `id_livro`, `data_emprestimo`, `data_vencimento`, `status`) VALUES
(4, 9, 12, '2010-10-10', '2026-06-01', 'Devolvido'),
(5, 9, 13, '5555-05-08', '5555-04-04', 'Vencido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `quantidade` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `autor`, `genero`, `quantidade`) VALUES
(3, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(5, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(6, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(7, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(8, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(9, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(10, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(11, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(12, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(13, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(14, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(15, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(16, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(17, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(18, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(19, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(20, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(21, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(22, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(23, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(24, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(25, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(26, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(27, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(28, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(29, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(30, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(31, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(32, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(33, 'A Quarta Asa', 'Rebecca Arcos', 'Fantasia', 13),
(34, 'mj', 'h', 'Comédia', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id_emprestimos`),
  ADD KEY `fk_livro` (`id_livro`),
  ADD KEY `fk_aluno` (`id_aluno`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emprestimos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `fk_livro` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id_livro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
