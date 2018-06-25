-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2018 at 10:03 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SVEP`
--
CREATE DATABASE IF NOT EXISTS `SVEP` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `SVEP`;

-- --------------------------------------------------------

--
-- Table structure for table `certificadosemitidos`
--

CREATE TABLE `certificadosemitidos` (
  `idCertificado` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `cargaHoraria` int(11) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `fkPessoa_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificadosemitidos`
--

INSERT INTO `certificadosemitidos` (`idCertificado`, `dataInicio`, `dataFim`, `cargaHoraria`, `responsavel`, `fkPessoa_aluno`) VALUES
(1, '2010-02-10', '2010-02-23', 12, 'teste', 23),
(2, '2018-04-01', '2018-07-17', 30, 'Alexandre da Silva', 27),
(3, '2018-06-05', '2018-06-12', 11, 'teste', 28);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `dataCompra` date NOT NULL,
  `qtdCompra` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dataAtendimento` date NOT NULL,
  `tipoPagamento` varchar(45) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  `statusCompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `compraproduto`
--

CREATE TABLE `compraproduto` (
  `fkCompra` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `despesa`
--

CREATE TABLE `despesa` (
  `iddespesa` int(11) NOT NULL,
  `nomeDespesa` varchar(255) NOT NULL,
  `valorDespesa` varchar(45) NOT NULL,
  `orcamento_idOrcamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(90) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(10) NOT NULL,
  `logradouro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `cep`, `endereco`, `complemento`, `numero`, `bairro`, `cidade`, `uf`, `logradouro`) VALUES
(1, '98389-292', 'Setor H Conjunto 3 Lote 1', 'Nenhum', '23', 'Taguatinga ', 'Taguatinga', 'DF', 'Nenhum'),
(2, '12093-812', 'Q. 123 CJ 02', 'Nenhum', '123 A3', 'CeilÃ¢ndia', 'CeilÃ¢ndia', 'DF', ''),
(3, '12938-132', 'Teste', 'Teste', '123', 'Teste', 'Teste', 'AC', 'Teste'),
(4, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(5, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(6, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(7, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(8, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(9, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(10, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(11, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(12, '12301-039', 'teste', 'teste', '123', 'teste', 'teste', 'teste', 'teste'),
(13, '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', ''),
(16, '12031-802', 'Quadra 106 Conjunto 2', 'Nenhum', '32', 'Taguatinga', 'Taguatinga', 'DF', 'Vazio'),
(17, '12039-102', 'Fake', 'Fake', '2', 'Fake', 'Fake', 'DF', 'Fake');

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `idEstoque` int(11) NOT NULL,
  `quantidadeReposicaoEstoque` int(11) NOT NULL,
  `quatidadeMinimaEstoque` int(11) NOT NULL,
  `quantidadeAtualEstoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `dataEvento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dataBloqueioFornecedor` date DEFAULT NULL,
  `inscricaoEstadual` varchar(45) NOT NULL,
  `fkEndereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fornecedor`
--

INSERT INTO `fornecedor` (`idFornecedor`, `nome`, `telefone`, `email`, `razaoSocial`, `status`, `dataBloqueioFornecedor`, `inscricaoEstadual`, `fkEndereco`) VALUES
(1, 'ALS CalÃ§ados', '(61) 3399-3393', 'alscalcados.2@mail.com', 'ALS CalÃ§ados', 0, '1920-01-01', '1092381029381023', 1),
(2, 'Mob Festas', '(61) 3333-3333', 'mob@mail.com', 'Mob Festas e CIA', 0, '1920-01-01', '120932201', 2),
(3, 'Teste', '(12) 3091-8013', 'teste@mail.com', '1209313', 0, '1920-01-01', '012938123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `valorPedido` decimal(10,2) NOT NULL,
  `dataPedido` datetime NOT NULL,
  `dataAtendimentoPedido` datetime NOT NULL,
  `fkEvento` int(11) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  `statusPedido` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pedidoproduto`
--

CREATE TABLE `pedidoproduto` (
  `fkPedido` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `telefoneContato` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fkEndereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nome`, `cpf`, `rg`, `telefoneContato`, `email`, `fkEndereco`) VALUES
(1, 'wesllen.sousa', '0323094414', '3971735', '618755', 'wesllenalves@gmail.com', 1),
(2, 'wesllen.sousa', '0323094414', '3971735', '618755', 'wesllenalves@gmail.com', 2),
(3, 'wesllen alves teste de cadastro', '03230944143', '2971735', '61981745695', 'wesllenalves@gmail.com', 3),
(4, 'Gustavo', '09123801923', '120931293', '120939239', 'gustavohks2@gmail.com', 5),
(5, '', '', '', '', '', 6),
(6, '', '', '', '', '', 7),
(7, '', '', '', '', '', 8),
(8, '', '', '', '', '', 9),
(9, '', '', '', '', '', 10),
(10, '', '', '', '', '', 11),
(11, '', '', '', '', '', 12),
(12, '', '', '', '', '', 13),
(13, '', '', '', '', '', 14),
(14, 'Gustavo ', '120.381.029-89', '109381023', '(10) 2938-1029', 'gustavohks2@gmail.com', 15),
(15, '', '', '', '', '', 16),
(16, 'teste', '129.381.02', '10239', '(12) 0938', 'gus@mail.com', 17),
(17, 'Allana Karolina de Melo Lopes', '102.983.129-30', '019380123', '(10) 3810-9329', 'allana@mail.com', 18),
(18, '', '', '', '', '', 40),
(19, 'teste', '102.381.023-89', '10912093', '(10) 2938-1029', 'teste@mail.com', 4),
(20, 'teste', '102.381.023-89', '10912093', '(10) 2938-1029', 'teste@mail.com', 9),
(21, 'teste', '102.381.023-89', '10912093', '(10) 2938-1029', 'teste@mail.com', 10),
(22, 'teste', '102.381.023-89', '10912093', '(10) 2938-1029', 'teste@mail.com', 11),
(23, 'Gustavo Henrique Ribeiro Bomfim de Jesus', '102.381.023-89', '10912093', '(10) 2938-1029', 'teste@mail.com', 12),
(24, '', '', '', '', '', 13),
(25, '', '', '', '', '', 14),
(26, '', '', '', '', '', 15),
(27, 'Allana Karolina De Melo Lopes', '129.381.029-38', '1092318223', '(61) 2932-8392', 'allana@mail.com', 16),
(28, 'Marcio Gomes de Sousa', '102.310.293-98', '1093810293', '(10) 3981-0293', 'mail@mail.com', 17);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `peso` decimal(4,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valorVenda` decimal(10,2) NOT NULL,
  `valorComprado` decimal(10,2) NOT NULL,
  `dataValidade` date NOT NULL,
  `tipoVisibilidade` int(11) NOT NULL,
  `imagem` varchar(30) DEFAULT NULL,
  `fkFornecedor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `fabricante`, `peso`, `descricao`, `valorVenda`, `valorComprado`, `dataValidade`, `tipoVisibilidade`, `imagem`, `fkFornecedor`) VALUES
(1, 'Bolo', '-', '1.00', 'Nenhum', '1.00', '1.00', '2019-07-25', 0, '5b303ee3d6ffd9.31671600.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `fkPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `login`, `senha`, `nivel`, `fkPessoa`) VALUES
(1, 'wesllenalves', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1),
(2, 'wesllenalves', 'cb7e8bbed60ae4f8eb6280585fec071f', 1, 2),
(14, 'gustavo', '202cb962ac59075b964b07152d234b70', 2, 11),
(15, 'gustavo', '202cb962ac59075b964b07152d234b70', 1, 14),
(16, '', 'd41d8cd98f00b204e9800998ecf8427e', 1, 15),
(17, 'teste', '698dc19d489c4e4db73e28a713eab07b', 1, 16),
(18, 'Allana', '202cb962ac59075b964b07152d234b70', 1, 17),
(19, '', 'd41d8cd98f00b204e9800998ecf8427e', 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificadosemitidos`
--
ALTER TABLE `certificadosemitidos`
  ADD PRIMARY KEY (`idCertificado`),
  ADD KEY `fk_certificadosEmitidos_pessoa1_idx` (`fkPessoa_aluno`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_compra_pessoa1_idx` (`fkPessoa`);

--
-- Indexes for table `compraproduto`
--
ALTER TABLE `compraproduto`
  ADD PRIMARY KEY (`fkCompra`,`fkProduto`),
  ADD KEY `fk_compra_has_produto_produto1_idx` (`fkProduto`),
  ADD KEY `fk_compra_has_produto_compra1_idx` (`fkCompra`);

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`iddespesa`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`idEstoque`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornecedor`),
  ADD KEY `fk_fornecedor_endereco1_idx` (`fkEndereco`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedido_evento1_idx` (`fkEvento`),
  ADD KEY `fk_pedido_pessoa1_idx` (`fkPessoa`);

--
-- Indexes for table `pedidoproduto`
--
ALTER TABLE `pedidoproduto`
  ADD PRIMARY KEY (`fkPedido`,`fkProduto`),
  ADD KEY `fk_pedido_has_produto_produto1_idx` (`fkProduto`),
  ADD KEY `fk_pedido_has_produto_pedido1_idx` (`fkPedido`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `fk_pessoa_endereco1_idx` (`fkEndereco`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `fkFornecedor_1` (`fkFornecedor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_pessoa1_idx` (`fkPessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificadosemitidos`
--
ALTER TABLE `certificadosemitidos`
  MODIFY `idCertificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornecedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificadosemitidos`
--
ALTER TABLE `certificadosemitidos`
  ADD CONSTRAINT `fk_certificadosEmitidos_pessoa1` FOREIGN KEY (`fkPessoa_aluno`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compraproduto`
--
ALTER TABLE `compraproduto`
  ADD CONSTRAINT `fk_compra_has_produto_compra1` FOREIGN KEY (`fkCompra`) REFERENCES `compra` (`idCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_has_produto_produto1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fk_fornecedor_endereco1` FOREIGN KEY (`fkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_evento1` FOREIGN KEY (`fkEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pedidoproduto`
--
ALTER TABLE `pedidoproduto`
  ADD CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`fkPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_pessoa_endereco1` FOREIGN KEY (`fkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fkFornecedor_1` FOREIGN KEY (`fkFornecedor`) REFERENCES `fornecedor` (`idFornecedor`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
