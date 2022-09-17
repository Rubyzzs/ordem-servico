-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Ago-2022 às 02:24
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
  `telCLI` bigint(20) NOT NULL,
  `emailCLI` varchar(105) NOT NULL,
  `cpfCLI` bigint(20) NOT NULL,
  `cnpjCLI` bigint(20) NOT NULL,
  `InsEstCLI` bigint(20) NOT NULL,
  `IDFUN_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `cnpjFUN` bigint(20) NOT NULL,
  `telFUN` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itenservico`
--

CREATE TABLE `itenservico` (
  `IDIS` int(11) NOT NULL,
  `qtdeIS` bigint(20) NOT NULL,
  `valorUnitIS` bigint(20) NOT NULL,
  `valorTotaLIS` bigint(20) NOT NULL,
  `IDOS_FK` int(11) NOT NULL,
  `IDSER_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensproduto`
--

CREATE TABLE `itensproduto` (
  `IDIP` int(11) NOT NULL,
  `QtdeIP` bigint(20) NOT NULL,
  `valorUnitIP` bigint(20) NOT NULL,
  `valorTotalIP` bigint(20) NOT NULL,
  `IDOS` int(11) NOT NULL,
  `IDPRO_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordemdeservico`
--

CREATE TABLE `ordemdeservico` (
  `IDOS` int(11) NOT NULL,
  `dataOS` date NOT NULL,
  `horarioOS` bigint(20) NOT NULL,
  `valorTotaOSl` bigint(20) NOT NULL,
  `IDEMP_FK` int(11) NOT NULL,
  `IDFUN_FK` int(11) NOT NULL,
  `IDCLI_FK` int(11) NOT NULL,
  `IDIP_FK` int(11) NOT NULL,
  `IDIS_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `IDPRO` int(11) NOT NULL,
  `nomePRO` varchar(105) NOT NULL,
  `valorPRO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `IDSER` int(11) NOT NULL,
  `descSER` varchar(105) NOT NULL,
  `valorSER` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(105) NOT NULL,
  `email` varchar(105) NOT NULL,
  `telefone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCLI`),
  ADD KEY `IDFUN_FK` (`IDFUN_FK`);

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
-- Índices para tabela `itenservico`
--
ALTER TABLE `itenservico`
  ADD PRIMARY KEY (`IDIS`),
  ADD KEY `IDOS_FK` (`IDOS_FK`),
  ADD KEY `IDSER_FK` (`IDSER_FK`);

--
-- Índices para tabela `itensproduto`
--
ALTER TABLE `itensproduto`
  ADD PRIMARY KEY (`IDIP`),
  ADD KEY `IDOS` (`IDOS`),
  ADD KEY `IDPRO_FK` (`IDPRO_FK`);

--
-- Índices para tabela `ordemdeservico`
--
ALTER TABLE `ordemdeservico`
  ADD PRIMARY KEY (`IDOS`),
  ADD KEY `IDEMP_FK` (`IDEMP_FK`),
  ADD KEY `IDFUN_FK` (`IDFUN_FK`),
  ADD KEY `IDCLI_FK` (`IDCLI_FK`),
  ADD KEY `IDIP_FK` (`IDIP_FK`),
  ADD KEY `IDIS_FK` (`IDIS_FK`);

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
  MODIFY `IDCLI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IDEMP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `IDFUN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itenservico`
--
ALTER TABLE `itenservico`
  MODIFY `IDIS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itensproduto`
--
ALTER TABLE `itensproduto`
  MODIFY `IDIP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordemdeservico`
--
ALTER TABLE `ordemdeservico`
  MODIFY `IDOS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `IDPRO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `IDSER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IDFUN_FK`) REFERENCES `funcionario` (`IDFUN`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`IDOS_FK`) REFERENCES `ordemdeservico` (`IDOS`);

--
-- Limitadores para a tabela `itenservico`
--
ALTER TABLE `itenservico`
  ADD CONSTRAINT `itenservico_ibfk_1` FOREIGN KEY (`IDOS_FK`) REFERENCES `ordemdeservico` (`IDOS`),
  ADD CONSTRAINT `itenservico_ibfk_2` FOREIGN KEY (`IDSER_FK`) REFERENCES `servico` (`IDSER`);

--
-- Limitadores para a tabela `itensproduto`
--
ALTER TABLE `itensproduto`
  ADD CONSTRAINT `itensproduto_ibfk_1` FOREIGN KEY (`IDOS`) REFERENCES `ordemdeservico` (`IDOS`),
  ADD CONSTRAINT `itensproduto_ibfk_2` FOREIGN KEY (`IDPRO_FK`) REFERENCES `produto` (`IDPRO`);

--
-- Limitadores para a tabela `ordemdeservico`
--
ALTER TABLE `ordemdeservico`
  ADD CONSTRAINT `ordemdeservico_ibfk_1` FOREIGN KEY (`IDEMP_FK`) REFERENCES `empresa` (`IDEMP`),
  ADD CONSTRAINT `ordemdeservico_ibfk_2` FOREIGN KEY (`IDFUN_FK`) REFERENCES `funcionario` (`IDFUN`),
  ADD CONSTRAINT `ordemdeservico_ibfk_3` FOREIGN KEY (`IDCLI_FK`) REFERENCES `cliente` (`IDCLI`),
  ADD CONSTRAINT `ordemdeservico_ibfk_4` FOREIGN KEY (`IDIP_FK`) REFERENCES `itensproduto` (`IDIP`),
  ADD CONSTRAINT `ordemdeservico_ibfk_5` FOREIGN KEY (`IDIS_FK`) REFERENCES `itenservico` (`IDIS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
