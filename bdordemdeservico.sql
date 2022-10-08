-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Out-2022 às 03:04
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdordemdeservico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `IDCLI` int(11) NOT NULL,
  `nomeCLI` varchar(105) NOT NULL,
  `endCLI` varchar(105) NOT NULL,
  `telCLI` varchar(20) NOT NULL,
  `emailCLI` varchar(105) NOT NULL,
  `cpfCLI` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`IDCLI`, `nomeCLI`, `endCLI`, `telCLI`, `emailCLI`, `cpfCLI`) VALUES
(1, 'Jonathan Sousa Pires', 'Felipe Garcia Aldana ; 382', '3627-1128', 'jonathan@hotmail.com', '753.698.123-79');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `IDEMP` int(11) NOT NULL,
  `nomeEMP` varchar(105) NOT NULL,
  `endEMP` varchar(105) NOT NULL,
  `telEMP` bigint(20) NOT NULL,
  `emailEMP` varchar(105) NOT NULL,
  `cnpjEMP` bigint(20) NOT NULL,
  `InsEstEMP` bigint(20) NOT NULL,
  `IDOS_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `IDFUN` int(11) NOT NULL,
  `nomeFUN` varchar(105) NOT NULL,
  `emailFUN` varchar(105) NOT NULL,
  `cnpjFUN` varchar(25) NOT NULL,
  `telFUN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`IDFUN`, `nomeFUN`, `emailFUN`, `cnpjFUN`, `telFUN`) VALUES
(1, 'Patrícia Pires', 'patricia@hotmail.com', '789.456.954-78', '3745-1520'),
(2, 'Carol', 'carol@hotmail.com', '745.985.123-12', '3254-7895');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemproduto`
--

CREATE TABLE `itemproduto` (
  `IDIP` int(11) NOT NULL,
  `qtde` bigint(20) NOT NULL,
  `valorUnit` decimal(20,0) NOT NULL,
  `valorTotal` decimal(20,0) NOT NULL,
  `observacao` varchar(225) NOT NULL,
  `IDOS_FK` int(11) NOT NULL,
  `IDPRO_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemservico`
--

CREATE TABLE `itemservico` (
  `IDIS` int(11) NOT NULL,
  `qtde` bigint(20) NOT NULL,
  `valorUnit` decimal(20,0) NOT NULL,
  `valorTotal` decimal(20,0) NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `IDOS_FK` int(11) NOT NULL,
  `IDSER_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itemservico`
--

INSERT INTO `itemservico` (`IDIS`, `qtde`, `valorUnit`, `valorTotal`, `observacao`, `IDOS_FK`, `IDSER_FK`) VALUES
(1, 10, '10', '0', '101', 3, 1),
(2, 10, '20', '200', 'sim', 3, 1),
(3, 1, '250', '250', 'Conserto da maquina x', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordemdeservico`
--

CREATE TABLE `ordemdeservico` (
  `IDOS` int(11) NOT NULL,
  `nomeCLI` varchar(225) NOT NULL,
  `dataOS` date NOT NULL,
  `horarioOS` time NOT NULL,
  `valorTotalOS` bigint(20) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `obs` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ordemdeservico`
--

INSERT INTO `ordemdeservico` (`IDOS`, `nomeCLI`, `dataOS`, `horarioOS`, `valorTotalOS`, `cliente_id`, `funcionario_id`, `obs`) VALUES
(3, '', '2022-09-17', '13:59:00', 350, 1, 0, 'jkhkhkh'),
(4, '', '2022-09-17', '13:59:00', 350, 1, 0, 'Reparo na placa mãe'),
(5, '', '2022-09-10', '15:00:00', 250, 2, 0, 'T4s'),
(6, '', '2022-10-12', '11:00:00', 1000, 1, 2, 'TEste'),
(7, '', '2022-10-12', '11:00:00', 1000, 1, 1, 'TEste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `IDPRO` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`IDPRO`, `nome`, `valor`, `descricao`) VALUES
(1, 'Placa de vídeo', '1000.00', ' gtx 1060'),
(2, 'Placa de vídeo', '1000.00', 'Placa amd 570'),
(3, 'Placa de mãe', '1500.00', 'placa da marca azus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `IDSER` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(105) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`IDSER`, `nome`, `descricao`, `valor`) VALUES
(1, 'Manutenção', 'SIM', '50.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(105) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `tipo_usuario`, `id_usuario`) VALUES
(1, 'jonatha@email.com', '123123123', 'cliente', 1),
(2, 'lucas@email.com', '123123123', 'funcionario', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCLI`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IDEMP`),
  ADD KEY `IDOS_FK` (`IDOS_FK`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`IDFUN`);

--
-- Índices para tabela `itemproduto`
--
ALTER TABLE `itemproduto`
  ADD PRIMARY KEY (`IDIP`),
  ADD KEY `IDOS` (`IDOS_FK`),
  ADD KEY `IDPRO_FK` (`IDPRO_FK`);

--
-- Índices para tabela `itemservico`
--
ALTER TABLE `itemservico`
  ADD PRIMARY KEY (`IDIS`),
  ADD KEY `IDOS_FK` (`IDOS_FK`),
  ADD KEY `IDSER_FK` (`IDSER_FK`);

--
-- Índices para tabela `ordemdeservico`
--
ALTER TABLE `ordemdeservico`
  ADD PRIMARY KEY (`IDOS`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`IDPRO`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`IDSER`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IDEMP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IDFUN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `itemproduto`
--
ALTER TABLE `itemproduto`
  MODIFY `IDIP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itemservico`
--
ALTER TABLE `itemservico`
  MODIFY `IDIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ordemdeservico`
--
ALTER TABLE `ordemdeservico`
  MODIFY `IDOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `IDPRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `IDSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`IDOS_FK`) REFERENCES `ordemdeservico` (`IDOS`);

--
-- Limitadores para a tabela `itemproduto`
--
ALTER TABLE `itemproduto`
  ADD CONSTRAINT `itemproduto_ibfk_1` FOREIGN KEY (`IDOS_FK`) REFERENCES `ordemdeservico` (`IDOS`),
  ADD CONSTRAINT `itemproduto_ibfk_2` FOREIGN KEY (`IDPRO_FK`) REFERENCES `produto` (`IDPRO`);

--
-- Limitadores para a tabela `itemservico`
--
ALTER TABLE `itemservico`
  ADD CONSTRAINT `itemservico_ibfk_1` FOREIGN KEY (`IDOS_FK`) REFERENCES `ordemdeservico` (`IDOS`),
  ADD CONSTRAINT `itemservico_ibfk_2` FOREIGN KEY (`IDSER_FK`) REFERENCES `servico` (`IDSER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;