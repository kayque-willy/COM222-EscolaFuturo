-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 30/11/2016 às 20:00
-- Versão do servidor: 5.5.53-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `escola`
--
CREATE DATABASE IF NOT EXISTS `escola` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `escola`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`login`, `senha`, `nome`) VALUES
('aluno@email.com', '123', 'aluno'),
('joao@email.com', '123', 'joãozinho'),
('maria@email.com', '123', 'mariazinha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTurma` varchar(255) NOT NULL,
  `idDisciplina` varchar(255) NOT NULL,
  `loginProfessor` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `avaliacao_disciplina_fk` (`idDisciplina`),
  KEY `avaliacao_turma_fk` (`idTurma`),
  KEY `avaliacao_professor_fk` (`loginProfessor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Fazendo dump de dados para tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `idTurma`, `idDisciplina`, `loginProfessor`, `nome`) VALUES
(33, 'Turma 1', 'com220', 'admin@email.com', 'prova 1'),
(34, 'Turma 1', 'com220', 'admin@email.com', 'prova 3'),
(35, 'Turma 2', 'com220', 'admin@email.com', 'prova 1'),
(36, 'Turma 1', 'com220', 'admin@email.com', 'prova 2'),
(37, 'Turma 1', 'com222', 'admin@email.com', 'prova 1'),
(38, 'Turma 1', 'com222', 'admin@email.com', 'prova 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_questao`
--

DROP TABLE IF EXISTS `avaliacao_questao`;
CREATE TABLE IF NOT EXISTS `avaliacao_questao` (
  `idAvaliacao` int(11) NOT NULL,
  `idQuestao` int(11) NOT NULL,
  PRIMARY KEY (`idAvaliacao`,`idQuestao`),
  KEY `questao_avaliacao_questao_fk` (`idQuestao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `avaliacao_questao`
--

INSERT INTO `avaliacao_questao` (`idAvaliacao`, `idQuestao`) VALUES
(37, 1),
(38, 1),
(37, 2),
(38, 2),
(33, 4),
(34, 4),
(35, 4),
(36, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`) VALUES
('com111', 'Fundamentos de Programação'),
('com220', 'Programação Orientada a Objetos 2'),
('com222', 'Desenvolvimento de Sistemas Web');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `loginAluno` varchar(255) NOT NULL,
  `idAvaliacao` int(11) NOT NULL,
  `nota` float NOT NULL,
  PRIMARY KEY (`loginAluno`,`idAvaliacao`),
  KEY `avaliacao_nota_fk` (`idAvaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `nota`
--

INSERT INTO `nota` (`loginAluno`, `idAvaliacao`, `nota`) VALUES
('aluno@email.com', 33, 10),
('aluno@email.com', 34, 5),
('aluno@email.com', 35, 5),
('aluno@email.com', 37, 10),
('joao@email.com', 33, 5),
('joao@email.com', 34, 5),
('joao@email.com', 35, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `professor`
--

INSERT INTO `professor` (`login`, `senha`, `nome`) VALUES
('admin@email.com', '123', 'Admin'),
('girafales@email.com', '123', 'Girafales'),
('professor@email.com', '123', 'Professor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questao`
--

DROP TABLE IF EXISTS `questao`;
CREATE TABLE IF NOT EXISTS `questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDisciplina` varchar(255) NOT NULL,
  `enunciado` text NOT NULL,
  `r1` varchar(255) NOT NULL,
  `r2` varchar(255) NOT NULL,
  `r3` varchar(255) NOT NULL,
  `r4` varchar(255) NOT NULL,
  `respostaCerta` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `disciplina_questao_fk` (`idDisciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `questao`
--

INSERT INTO `questao` (`id`, `idDisciplina`, `enunciado`, `r1`, `r2`, `r3`, `r4`, `respostaCerta`) VALUES
(1, 'com222', 'Qual dessas linguagens é é utilizada pelo protocolo HTTP e executada no navegador?', 'HTML', 'Delphi', 'Assembly', 'Pascal', 'r1'),
(2, 'com222', 'Qual o componente Java é utilizado para processar as requisições ao servidor?', 'Java Servlet', 'Java Groups', 'Java Toolkit', 'JavaScript', 'r1'),
(3, 'com222', 'O que corresponde a variavel $_SESSION em PHP?', 'Variável de sessão', 'Variável local', 'Variável variante', 'Constante', 'r1'),
(4, 'com220', 'Enunciado da com220', 'Variável de sessão', 'Variável local', 'Variável variante', 'Constante', 'r1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` varchar(255) NOT NULL,
  `loginProfessor` varchar(255) NOT NULL,
  `idDisciplina` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`idDisciplina`,`loginProfessor`),
  KEY `disciplina_turma_fk` (`idDisciplina`),
  KEY `professor_turma_fk` (`loginProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `turma`
--

INSERT INTO `turma` (`id`, `loginProfessor`, `idDisciplina`) VALUES
('Turma 1', 'girafales@email.com', 'com111'),
('Turma 1', 'admin@email.com', 'com220'),
('Turma 2', 'admin@email.com', 'com220'),
('Turma 1', 'admin@email.com', 'com222');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_aluno`
--

DROP TABLE IF EXISTS `turma_aluno`;
CREATE TABLE IF NOT EXISTS `turma_aluno` (
  `loginAluno` varchar(255) NOT NULL,
  `idTurma` varchar(255) NOT NULL,
  `idDisciplina` varchar(255) NOT NULL,
  `loginProfessor` varchar(255) NOT NULL,
  PRIMARY KEY (`loginAluno`,`idTurma`,`idDisciplina`,`loginProfessor`),
  KEY `turma_turma_aluno_fk` (`idTurma`),
  KEY `idDisciplina` (`idDisciplina`),
  KEY `loginProfessor` (`loginProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `turma_aluno`
--

INSERT INTO `turma_aluno` (`loginAluno`, `idTurma`, `idDisciplina`, `loginProfessor`) VALUES
('aluno@email.com', 'Turma 1', 'com222', 'admin@email.com'),
('maria@email.com', 'Turma 1', 'com111', 'girafales@email.com'),
('aluno@email.com', 'Turma 2', 'com220', 'admin@email.com'),
('joao@email.com', 'Turma 2', 'com220', 'admin@email.com');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `turma` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao_ibfk_3` FOREIGN KEY (`loginProfessor`) REFERENCES `turma` (`loginProfessor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `avaliacao_questao`
--
ALTER TABLE `avaliacao_questao`
  ADD CONSTRAINT `avaliacao_avaliacao_questao_fk` FOREIGN KEY (`idAvaliacao`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questao_avaliacao_questao_fk` FOREIGN KEY (`idQuestao`) REFERENCES `questao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `aluno_avaliacao_fk` FOREIGN KEY (`loginAluno`) REFERENCES `aluno` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao_nota_fk` FOREIGN KEY (`idAvaliacao`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `disciplina_questao_fk` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `disciplina_turma_fk` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professor_turma_fk` FOREIGN KEY (`loginProfessor`) REFERENCES `professor` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD CONSTRAINT `aluno_turma_aluno_fk` FOREIGN KEY (`loginAluno`) REFERENCES `aluno` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplina_turma_aluno_fk` FOREIGN KEY (`idDisciplina`) REFERENCES `turma` (`idDisciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_aluno_ibfk_1` FOREIGN KEY (`loginProfessor`) REFERENCES `turma` (`loginProfessor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_turma_aluno_fk` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
