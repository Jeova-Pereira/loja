-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2025 às 03:20
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
-- Banco de dados: `cegonha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome_categoria`) VALUES
(1, 'Roupas Bebê'),
(2, 'Jaquetas e Casacos'),
(3, 'Suéteres'),
(4, 'Acessórios'),
(5, 'Roupas Bebê'),
(6, 'Roupas Infantil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem_produto` varchar(255) DEFAULT NULL,
  `categoria_idcategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `nome_produto`, `preco`, `imagem_produto`, `categoria_idcategoria`) VALUES
(1, 'Vestido bebê menina coelhinho Brandili Baby', 50.00, 'roupa1.png.webp', 5),
(2, 'Conjunto Bebê Menina De Borboleta Brandili Baby', 60.00, 'roupa2.png.webp', 5),
(3, 'Conjunto Bebê Menino Trator Brandili Camel', 65.00, 'roupa3.png.webp', 5),
(4, 'Jaqueta Infantil Menino Homem Aranha', 90.00, 'roupa4.png.webp', 2),
(5, 'Jaqueta infantil menino sarja Brandili - Brandili', 85.00, 'roupa5.png.webp', 2),
(6, 'Body Bebê Menina Bichinhos Kyly', 40.00, 'roupa6.png.webp', 5),
(7, 'Vestido Infantil Menina Bordado Kyly', 70.00, 'roupa7.png.webp', 6),
(8, 'Conjunto Infantil Menina Estampa Kyly', 75.00, 'roupa8.png.webp', 6),
(9, 'Camiseta Infantil Menino Astronauta Kyly', 30.00, 'roupa9.png.webp', 6),
(10, 'Conjunto Infantil Menino Dinossauro Kyly', 80.00, 'roupa10.png.webp', 6),
(11, 'Conjunto Infantil Menino Lettering Kyly', 72.00, 'roupa11.png.webp', 6),
(12, 'Conjunto Infantil Menino Estampa Kyly', 68.00, 'roupa12.png.webp', 6),
(13, 'Pijama Infantil Kyly Menino Blusa Calça Meia Malha', 58.00, 'roupa13.png.webp', 6),
(14, 'Camisa Infantil Menino Xadrez Kyly', 55.00, 'roupa14.png.webp', 6),
(15, 'Casaco Infantil Menina Bordado Kyly', 87.00, 'roupa15.png.webp', 2),
(16, 'Jaqueta Brandili Dinossauro Verde', 93.00, 'roupa16.png.webp', 2),
(17, 'Suéter Tricô Infantil Menina Mundi', 77.00, 'roupa17.png.webp', 3),
(18, 'Jaqueta Mundi Puffer Menina Rosa', 95.00, 'roupa18.png.webp', 2),
(19, 'Jaqueta Microfibra Infantil Menina Mundi', 91.00, 'roupa19.png.webp', 2),
(20, 'Jaqueta Moletom Infantil Menina Brandili', 83.00, 'roupa20.png.webp', 2),
(21, 'Jaqueta College TMX', 88.00, 'roupa21.png.webp', 2),
(22, 'Tiara Infantil De Chifom Elástica', 15.00, 'roupa22.png.webp', 4),
(23, 'Par de Laços Strass e Peróla Menina Mundi', 20.00, 'roupa23.png.webp', 4),
(24, 'Par de Tic Tacs Coração Menina Brandili', 13.00, 'roupa24.png.webp', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `senha`) VALUES
(1, 'Admin', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `categoria_idcategoria` (`categoria_idcategoria`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
