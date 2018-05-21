-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2018 às 13:02
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificadosemitidos`
--

CREATE TABLE `certificadosemitidos` (
  `idCertificado` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `cargaHoraria` int(11) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `fkPessoa_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
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
-- Estrutura da tabela `compraproduto`
--

CREATE TABLE `compraproduto` (
  `fkCompra` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `iddespesa` int(11) NOT NULL,
  `nomeDespesa` varchar(255) NOT NULL,
  `valorDespesa` varchar(45) NOT NULL,
  `orcamento_idOrcamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idEstoque` int(11) NOT NULL,
  `quantidadeReposicaoEstoque` int(11) NOT NULL,
  `quatidadeMinimaEstoque` int(11) NOT NULL,
  `quantidadeAtualEstoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `dataEvento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dataBloqueioFornecedor` date DEFAULT NULL,
  `inscricaoEstadual` varchar(45) NOT NULL,
  `fkEndereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
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
-- Estrutura da tabela `pedidoproduto`
--

CREATE TABLE `pedidoproduto` (
  `fkPedido` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `peso` decimal(4,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valorVenda` decimal(10,2) NOT NULL,
  `valorComprado` decimal(10,2) NOT NULL,
  `dataValidade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `fkPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`idProduto`);

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
  MODIFY `idCertificado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `idFornecedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `certificadosemitidos`
--
ALTER TABLE `certificadosemitidos`
  ADD CONSTRAINT `fk_certificadosEmitidos_pessoa1` FOREIGN KEY (`fkPessoa_aluno`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `compraproduto`
--
ALTER TABLE `compraproduto`
  ADD CONSTRAINT `fk_compra_has_produto_compra1` FOREIGN KEY (`fkCompra`) REFERENCES `compra` (`idCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_has_produto_produto1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fk_fornecedor_endereco1` FOREIGN KEY (`fkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_evento1` FOREIGN KEY (`fkEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidoproduto`
--
ALTER TABLE `pedidoproduto`
  ADD CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`fkPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_pessoa_endereco1` FOREIGN KEY (`fkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
