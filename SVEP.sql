-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: SVEP
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `certificadosemitidos`
--

DROP TABLE IF EXISTS `certificadosemitidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificadosemitidos` (
  `idCertificado` int(11) NOT NULL AUTO_INCREMENT,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `cargaHoraria` int(11) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `fkPessoa_aluno` int(11) NOT NULL,
  PRIMARY KEY (`idCertificado`),
  KEY `fk_certificadosEmitidos_pessoa1_idx` (`fkPessoa_aluno`),
  CONSTRAINT `fk_certificadosEmitidos_pessoa1` FOREIGN KEY (`fkPessoa_aluno`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificadosemitidos`
--

LOCK TABLES `certificadosemitidos` WRITE;
/*!40000 ALTER TABLE `certificadosemitidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificadosemitidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `dataCompra` date NOT NULL,
  `qtdCompra` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dataAtendimento` date NOT NULL,
  `tipoPagamento` varchar(45) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  `statusCompra` int(11) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_compra_pessoa1_idx` (`fkPessoa`),
  CONSTRAINT `fk_compra_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compraproduto`
--

DROP TABLE IF EXISTS `compraproduto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compraproduto` (
  `fkCompra` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  PRIMARY KEY (`fkCompra`,`fkProduto`),
  KEY `fk_compra_has_produto_produto1_idx` (`fkProduto`),
  KEY `fk_compra_has_produto_compra1_idx` (`fkCompra`),
  CONSTRAINT `fk_compra_has_produto_compra1` FOREIGN KEY (`fkCompra`) REFERENCES `compra` (`idCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_has_produto_produto1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compraproduto`
--

LOCK TABLES `compraproduto` WRITE;
/*!40000 ALTER TABLE `compraproduto` DISABLE KEYS */;
/*!40000 ALTER TABLE `compraproduto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despesa`
--

DROP TABLE IF EXISTS `despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesa` (
  `iddespesa` int(11) NOT NULL,
  `nomeDespesa` varchar(255) NOT NULL,
  `valorDespesa` varchar(45) NOT NULL,
  `orcamento_idOrcamento` int(11) NOT NULL,
  PRIMARY KEY (`iddespesa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesa`
--

LOCK TABLES `despesa` WRITE;
/*!40000 ALTER TABLE `despesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `despesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(90) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(10) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'70645160','SRES ','green','1614','Aguas claras','Brasilia','DF','apartamento'),(2,'70645160','SRES ','green','1614','Aguas claras','Brasilia','DF','apartamento'),(3,'70645160','SRES','green','1614','Aguas claras','Brasilia','Df','apartamento'),(4,'901380981','Q.103','Nenhum','12','Recanto das Emas','Recanto das Emas','DF','Nenhum'),(5,'10981923','Q.15','Nenhum','2','Nenhum','Recanto das Emas','DF','asdlkfj'),(6,'','','','','','','',''),(7,'','','','','','','',''),(8,'','','','','','','',''),(9,'12398-120','Gustavo','','','','','',''),(10,'','','','','','','',''),(11,'','','','','','','',''),(12,'','','','','','','',''),(13,'','','','','','','',''),(14,'','','','','','','',''),(15,'12093-810','Quadra 106 Conjunto 2','Nenhum','1123','Nenhum','Nenhuma','DF','Nne'),(16,'','','','','','','',''),(17,'12039-8','120938','1293','12309','12930','12309','123','123'),(18,'12938-109','Vazio','Vazio','1293','Recanto das Emas','Recanto das Emas','DF','Vazio'),(19,'109381023','Nenhum','Nenhum','123 AV','Rec','Rec','DF','Teste'),(20,'109381023','Nenhum','Nenhum','123 AV','Rec','Rec','DF','Teste'),(21,'','','','','','','',''),(22,'','','','','','','',''),(23,'','','','','','','',''),(24,'','','','','','','',''),(25,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(26,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(27,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(28,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(29,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(30,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(31,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(32,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(33,'102938','asdlkjSADKLFasldfkj','asdf','12','asdklfj','1293','df','asdf'),(34,'','','','','','','',''),(35,'','','','','','','',''),(36,'teste','teste','teste','teste','teste','teste','e','tes'),(37,'','','','','','','',''),(38,'','','','','','','','');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estoque` (
  `idEstoque` int(11) NOT NULL AUTO_INCREMENT,
  `quantidadeReposicaoEstoque` int(11) NOT NULL,
  `quatidadeMinimaEstoque` int(11) NOT NULL,
  `quantidadeAtualEstoque` int(11) NOT NULL,
  PRIMARY KEY (`idEstoque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque`
--

LOCK TABLES `estoque` WRITE;
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `dataEvento` date NOT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `idFornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `dataBloqueioFornecedor` date DEFAULT NULL,
  `inscricaoEstadual` varchar(45) NOT NULL,
  `fkEndereco` int(11) NOT NULL,
  PRIMARY KEY (`idFornecedor`),
  KEY `fk_fornecedor_endereco1_idx` (`fkEndereco`),
  CONSTRAINT `fk_fornecedor_endereco1` FOREIGN KEY (`fkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'asdkfjl','asdlfkj','asdlkfj','asdflkj',0,NULL,'aldkf',11),(2,'teste','2930182','gustavohks2@gmail.com','1231928',0,'1920-01-01','12093',33),(3,'','','','',0,'1920-01-01','',34),(4,'','','','',0,'1920-01-01','',35),(5,'teste','teste','teste','teste',0,'1920-01-01','teste',36),(6,'','','','',0,'1920-01-01','',37),(7,'','','','',0,'1920-01-01','',38);
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `valorPedido` decimal(10,2) NOT NULL,
  `dataPedido` datetime NOT NULL,
  `dataAtendimentoPedido` datetime NOT NULL,
  `fkEvento` int(11) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  `statusPedido` tinyint(4) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_pedido_evento1_idx` (`fkEvento`),
  KEY `fk_pedido_pessoa1_idx` (`fkPessoa`),
  CONSTRAINT `fk_pedido_evento1` FOREIGN KEY (`fkEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidoproduto`
--

DROP TABLE IF EXISTS `pedidoproduto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidoproduto` (
  `fkPedido` int(11) NOT NULL,
  `fkProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  PRIMARY KEY (`fkPedido`,`fkProduto`),
  KEY `fk_pedido_has_produto_produto1_idx` (`fkProduto`),
  KEY `fk_pedido_has_produto_pedido1_idx` (`fkPedido`),
  CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`fkPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`fkProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidoproduto`
--

LOCK TABLES `pedidoproduto` WRITE;
/*!40000 ALTER TABLE `pedidoproduto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidoproduto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `telefoneContato` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fkEndereco` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa`),
  KEY `fk_pessoa_endereco1_idx` (`fkEndereco`),
  CONSTRAINT `fk_pessoa_endereco1` FOREIGN KEY (`fkEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'wesllen.sousa','0323094414','3971735','618755','wesllenalves@gmail.com',1),(2,'wesllen.sousa','0323094414','3971735','618755','wesllenalves@gmail.com',2),(3,'wesllen alves teste de cadastro','03230944143','2971735','61981745695','wesllenalves@gmail.com',3),(4,'Gustavo','09123801923','120931293','120939239','gustavohks2@gmail.com',5),(5,'','','','','',6),(6,'','','','','',7),(7,'','','','','',8),(8,'','','','','',9),(9,'','','','','',10),(10,'','','','','',11),(11,'','','','','',12),(12,'','','','','',13),(13,'','','','','',14),(14,'Gustavo ','120.381.029-89','109381023','(10) 2938-1029','gustavohks2@gmail.com',15),(15,'','','','','',16),(16,'teste','129.381.02','10239','(12) 0938','gus@mail.com',17),(17,'Allana Karolina de Melo Lopes','102.983.129-30','019380123','(10) 3810-9329','allana@mail.com',18);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `peso` decimal(4,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valorVenda` decimal(10,2) NOT NULL,
  `valorComprado` decimal(10,2) NOT NULL,
  `dataValidade` date NOT NULL,
  `fkFornecedor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `fkFornecedor_1` (`fkFornecedor`),
  CONSTRAINT `fkFornecedor_1` FOREIGN KEY (`fkFornecedor`) REFERENCES `fornecedor` (`idFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (3,'Leite condensado','ItambÃ©',3.55,'Nenhuma',3.99,1.99,'1999-10-02',1),(4,'Leite condensado','ItambÃ©',3.55,'Nenhuma',3.99,1.99,'1999-10-02',1);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_pessoa1_idx` (`fkPessoa`),
  CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'wesllenalves','d41d8cd98f00b204e9800998ecf8427e',1,2),(2,'wesllenalves','cb7e8bbed60ae4f8eb6280585fec071f',1,2),(14,'gustavo','202cb962ac59075b964b07152d234b70',2,11),(15,'gustavo','202cb962ac59075b964b07152d234b70',1,14),(16,'','d41d8cd98f00b204e9800998ecf8427e',1,15),(17,'teste','698dc19d489c4e4db73e28a713eab07b',1,16),(18,'Allana','202cb962ac59075b964b07152d234b70',1,17);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-09 13:06:49
