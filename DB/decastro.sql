-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Abr-2024 às 18:42
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `decastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `img1_product` varchar(255) NOT NULL,
  `img2_product` varchar(255) NOT NULL,
  `nome_product` varchar(255) NOT NULL,
  `genero_product` varchar(255) NOT NULL,
  `fk_type_product` int(11) NOT NULL,
  `preco_product` decimal(10,2) NOT NULL,
  `preco_desc_product` decimal(10,2) NOT NULL DEFAULT 0.00,
  `novo_product` tinyint(1) NOT NULL DEFAULT 0,
  `cliques_product` int(11) NOT NULL DEFAULT 0,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id_product`, `img1_product`, `img2_product`, `nome_product`, `genero_product`, `fk_type_product`, `preco_product`, `preco_desc_product`, `novo_product`, `cliques_product`, `fk_user`) VALUES
(1, 'vapormaxevo1.jpg', 'vapormaxevo2.jpg', 'Nike Air VaporMax Evo', 'Man', 3, 225.00, 0.00, 1, 4, 1),
(2, 'vapormaxevo3.jpg', 'vapormaxevo4.jpg', 'Nike Air VaporMax Evo', 'Man', 3, 225.00, 0.00, 1, 0, 1),
(3, 'vapormaxplus1.jpg', 'vapormaxplus2.jpg', 'Nike Air VaporMax Plus', 'Man', 3, 230.00, 0.00, 0, 0, 1),
(4, 'vapormaxplus3.png', 'vapormaxplus4.png', 'Nike Air VaporMax Plus', 'Man', 3, 230.00, 0.00, 0, 5, 1),
(5, 'vapormax1.jpg', 'vapormax2.jpg', 'Nike Air VaporMax 2021', 'Man', 3, 220.00, 0.00, 0, 5, 1),
(6, 'vapormax7.jpg', 'vapormax8.jpg', 'Nike Air VaporMax 2021', 'Man', 3, 220.00, 0.00, 0, 9, 1),
(7, 'vapormax9.jpg', 'vapormax10.jpg', 'Nike Air VaporMax 2021 para Mulher', 'Woman', 3, 220.00, 0.00, 0, 0, 1),
(8, 'vapormax5.jpg', 'vapormax6.jpg', 'Nike Air VaporMax 2021 para Mulher', 'Woman', 3, 220.00, 0.00, 0, 0, 1),
(9, 'vapormax3.jpg', 'vapormax4.jpg', 'Nike Air VaporMax 2021', 'Man', 3, 220.00, 0.00, 0, 0, 1),
(10, 'northfacenuptse1.jpg', 'northfacenuptse2.jpg', 'The North Face Casaco 1996 Retro Nuptse', 'Man', 1, 300.00, 0.00, 0, 10, 1),
(11, 'casaconorth1.jpg', 'casaconorth2.jpg', 'The North Face Casaco Dome Logo Puffa', 'Woman', 1, 230.00, 0.00, 0, 22, 1),
(12, 'lacoste1.jpg', 'lacoste2.jpg', 'Lacoste Pólo Alligator', 'Man', 1, 75.00, 0.00, 0, 4, 1),
(13, 'airforce1white.png', 'airforce1white2.png', 'Nike Air Force 1 Low', 'Man', 3, 110.00, 0.00, 0, 2, 1),
(14, 'airforce2.jpg', 'airforce1.jpg', 'Nike Air Force 1 Low', 'Man', 3, 130.00, 0.00, 1, 100, 1),
(15, 'airforce3.jpg', 'airforce4.jpg', 'Nike Air Force 1 Low', 'Man', 3, 130.00, 0.00, 1, 0, 1),
(16, 'milan1.jpg', 'milan2.jpg', 'PUMA Camisola Principal AC Milan 2021/22', 'Man', 1, 90.00, 0.00, 0, 10, 1),
(17, 'nikehuarache1.jpg', 'nikehuarache2.jpg', 'Nike Air Huarache', 'Man', 3, 125.00, 0.00, 0, 3, 1),
(18, 'airmax951.jpg', 'airmax952.jpg', 'Nike Air Max 95 Essential de Mulher', 'Woman', 3, 170.00, 0.00, 0, 32, 1),
(19, 'airmax971.jpg', 'airmax972.jpg', 'Nike Air Max 97', 'Man', 3, 180.00, 0.00, 0, 2, 1),
(20, 'airmax21_1.jpg', 'airmax21_2.jpg', 'Nike Air Max 2021 de Mulher', 'Woman', 3, 160.00, 0.00, 0, 2, 1),
(21, 'nmdr1_1.jpg', 'nmdr1_2.jpg', 'Adidas Originals NMD_R1', 'Man', 3, 150.00, 0.00, 0, 6, 1),
(22, 'nmd r1 v2_2.jpg', 'nmd r1 v2_1.jpg', 'Adidas Originals NMD_R1 V2 para Júnior', 'Junior', 3, 120.00, 90.00, 0, 6, 1),
(23, 'airmaxplus1.jpg', 'airmaxplus2.jpg', 'Nike Air Max Plus', 'Man', 3, 170.00, 0.00, 1, 1, 1),
(24, 'realm2.jpg', 'realm1.jpg', 'Adidas Camisola Principal Real Madrid 2021/22', 'Man', 1, 90.00, 0.00, 0, 0, 1),
(25, 'nikecalcawoven1.jpg', 'nikecalcawoven2.jpg', 'Nike Calças de Fato de Treino Dri-FIT Academy Woven', 'Man', 2, 40.00, 30.00, 0, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase`
--

CREATE TABLE `purchase` (
  `id_purchase` int(11) NOT NULL,
  `preco_total_purchase` decimal(10,2) NOT NULL,
  `data_purchase` datetime NOT NULL,
  `fk_status_purchase` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase_product`
--

CREATE TABLE `purchase_product` (
  `fk_purchase` int(11) NOT NULL,
  `fk_product` int(11) NOT NULL,
  `fk_size_product` varchar(255) DEFAULT NULL,
  `quantidade_purchase_product` int(11) NOT NULL,
  `data_atualizada_purchase_product` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `size_product`
--

CREATE TABLE `size_product` (
  `id_size_product` varchar(255) NOT NULL,
  `order_size_product` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `size_product`
--

INSERT INTO `size_product` (`id_size_product`, `order_size_product`) VALUES
('32', '2023-01-29 13:25:16'),
('34', '2023-01-29 13:25:17'),
('36', '2023-01-29 13:25:39'),
('38', '2023-01-29 13:25:40'),
('40', '2023-01-29 13:26:14'),
('42', '2023-01-29 13:26:15'),
('44', '2023-01-29 13:26:31'),
('46', '2023-01-29 13:26:32'),
('L', '2023-01-29 13:27:07'),
('M', '2023-01-29 13:27:06'),
('S', '2023-01-29 13:26:53'),
('XL', '2023-01-29 13:27:26'),
('XS', '2023-01-29 13:26:52'),
('XXL', '2023-01-29 13:27:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_purchase`
--

CREATE TABLE `status_purchase` (
  `id_status` int(11) NOT NULL,
  `nome_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status_purchase`
--

INSERT INTO `status_purchase` (`id_status`, `nome_user`) VALUES
(1, 'Pending'),
(2, 'Finished'),
(3, 'Canceled');

-- --------------------------------------------------------

--
-- Estrutura da tabela `type_product`
--

CREATE TABLE `type_product` (
  `id_type_product` int(11) NOT NULL,
  `nome_type_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `type_product`
--

INSERT INTO `type_product` (`id_type_product`, `nome_type_product`) VALUES
(1, 'Tops'),
(2, 'Pants'),
(3, 'Shoes'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(50) NOT NULL,
  `email_user` varchar(300) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `imagem_user` varchar(255) NOT NULL DEFAULT 'unknown_user.jpg',
  `cargo_user` tinyint(1) NOT NULL DEFAULT 0,
  `estado_user` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `nome_user`, `email_user`, `pass_user`, `imagem_user`, `cargo_user`, `estado_user`) VALUES
(1, 'Admin', 'admindecastro@gmail.com', '60de2f3696d45ef34215fe58653bf586608dd894', 'unknown_user.jpg', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_user` (`fk_user`);

--
-- Índices para tabela `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_status_purchase` (`fk_status_purchase`);

--
-- Índices para tabela `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`fk_purchase`,`fk_product`),
  ADD KEY `fk_product` (`fk_product`),
  ADD KEY `fk_size_product` (`fk_size_product`);

--
-- Índices para tabela `size_product`
--
ALTER TABLE `size_product`
  ADD PRIMARY KEY (`id_size_product`);

--
-- Índices para tabela `status_purchase`
--
ALTER TABLE `status_purchase`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type_product`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `status_purchase`
--
ALTER TABLE `status_purchase`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`fk_status_purchase`) REFERENCES `status_purchase` (`id_status`);

--
-- Limitadores para a tabela `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD CONSTRAINT `purchase_product_ibfk_1` FOREIGN KEY (`fk_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `purchase_product_ibfk_2` FOREIGN KEY (`fk_purchase`) REFERENCES `purchase` (`id_purchase`),
  ADD CONSTRAINT `purchase_product_ibfk_3` FOREIGN KEY (`fk_size_product`) REFERENCES `size_product` (`id_size_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
