-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Fev-2023 às 20:54
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia1`
--
CREATE DATABASE IF NOT EXISTS `academia1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `academia1`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `activity`
--

CREATE TABLE `activity` (
  `aid` int(11) NOT NULL,
  `nameactivity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `activity`
--

INSERT INTO `activity` (`aid`, `nameactivity`, `description`) VALUES
(1, 'Jumpp', 'atividade realizada pulando em um trampolim'),
(2, 'Spinning', 'atividade realizada em uma bicicleta com subidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `class`
--

CREATE TABLE `class` (
  `cid` int(11) NOT NULL,
  `dateclass` date NOT NULL,
  `hour` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `housenumber` smallint(6) NOT NULL,
  `complement` varchar(255) NOT NULL,
  `edate` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `employee`
--

INSERT INTO `employee` (`eid`, `name`, `email`, `cellphone`, `document`, `birth`, `zipcode`, `housenumber`, `complement`, `edate`, `photo`) VALUES
(1, 'Adolfo Lindofo', 'adolfo@lindofo.com', '(21) 999987777', '4789', '1992-09-17', '01020-345', 1560, 'Travessa Lírios', '2023-02-06 16:43:53', 'https://randomuser.me/api/portraits/men/19.jpg'),
(2, 'Wandinha Addams', 'wand@addams.com', '(21) 987654321', '1567', '2002-10-31', '12345-678', 6667, 'fundos', '2023-02-06 16:43:53', 'https://randomuser.me/api/portraits/women/18.jpg'),
(3, 'Diana Ianna', 'diana@realeza.com', '(21) 223345566', '2100', '1989-04-22', '12345-678', 120, 'Sobrado', '2023-02-06 16:43:53', 'https://randomuser.me/api/portraits/women/8.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enableteacher`
--

CREATE TABLE `enableteacher` (
  `etid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `kart`
--

CREATE TABLE `kart` (
  `productcode` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantcompra` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `productcode` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `size` char(2) NOT NULL,
  `amount` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`productcode`, `name`, `color`, `cost`, `size`, `amount`, `photo`) VALUES
(1, 'whey protein', '--', 50, '1k', 15, 'https://duxnutrition.vtexassets.com/arquivos/ids/163288/WPC_Mockup_Baunilha_SITE.jpg?v=638046527300500000'),
(2, 'creatina', '--', 90, '50', 30, 'https://io.convertiez.com.br/m/newnutrition/shop/products/images/118628/large/creatina-monohidratada-micronizada-em-po-300g_2237.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sale`
--

CREATE TABLE `sale` (
  `sid` int(11) NOT NULL,
  `date` date NOT NULL,
  `cost` double NOT NULL,
  `amount` int(11) NOT NULL,
  `productcode` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `zipcode` varchar(9) NOT NULL,
  `housenumber` smallint(6) NOT NULL,
  `complement` varchar(255) NOT NULL,
  `sdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `student`
--

INSERT INTO `student` (`sid`, `name`, `email`, `password`, `cellphone`, `cpf`, `rg`, `birth`, `sex`, `zipcode`, `housenumber`, `complement`, `sdate`, `photo`) VALUES
(1, 'Nina Norevalga', 'nina@nininha.com', '123', '(21) 123456789', '2299', '88945612', '1997-07-14', 'F', '01020-345', 3, 'apto 144', '2023-02-06 16:43:53', 'https://randomuser.me/api/portraits/women/17.jpg'),
(2, 'Lula Molusco', 'fenda@dobiquine.com', '456', '(21) 987654321', '7259', '62134985', '2001-01-29', 'M', '12345-678', 1476, 'fundos', '2023-02-06 16:43:53', 'https://randomuser.me/api/portraits/men/3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `studentclass`
--

CREATE TABLE `studentclass` (
  `tlclass` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `eid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `teacher`
--

INSERT INTO `teacher` (`tid`, `availability`, `eid`) VALUES
(1, 'segunda e sexta o dia todo', 3),
(2, 'terca, quarta e quinta somente a tarde', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`aid`);

--
-- Índices para tabela `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `aid` (`aid`);

--
-- Índices para tabela `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Índices para tabela `enableteacher`
--
ALTER TABLE `enableteacher`
  ADD PRIMARY KEY (`etid`),
  ADD KEY `aid` (`aid`),
  ADD KEY `tid` (`tid`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productcode`);

--
-- Índices para tabela `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `productcode` (`productcode`),
  ADD KEY `eid` (`eid`);

--
-- Índices para tabela `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Índices para tabela `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`tlclass`),
  ADD KEY `sid` (`sid`),
  ADD KEY `aid` (`aid`);

--
-- Índices para tabela `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `eid` (`eid`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activity`
--
ALTER TABLE `activity`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `class`
--
ALTER TABLE `class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `enableteacher`
--
ALTER TABLE `enableteacher`
  MODIFY `etid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `productcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sale`
--
ALTER TABLE `sale`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `tlclass` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `activity` (`aid`);

--
-- Limitadores para a tabela `enableteacher`
--
ALTER TABLE `enableteacher`
  ADD CONSTRAINT `enableteacher_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `activity` (`aid`),
  ADD CONSTRAINT `enableteacher_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`);

--
-- Limitadores para a tabela `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`productcode`) REFERENCES `product` (`productcode`),
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Limitadores para a tabela `studentclass`
--
ALTER TABLE `studentclass`
  ADD CONSTRAINT `studentclass_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`),
  ADD CONSTRAINT `studentclass_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `activity` (`aid`);

--
-- Limitadores para a tabela `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
