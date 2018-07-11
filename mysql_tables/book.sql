-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jul-2018 às 03:18
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nasc` date NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `rg`, `cpf`, `tel`, `email`, `nasc`, `endereco`, `cep`, `cidade`, `uf`, `created_at`, `updated_at`) VALUES
(11, 'Jonas Oliveira Duarte', '46.702.818-7', '395.728.068-07', '1146484851', 'joliver546777@gmail.com', '1990-06-17', 'Rua Piauí nº 117, Vila Miranda', '08572-510', 'Itaquaquecetuba', 'SP', '2018-06-25 20:28:40', '2018-06-28 02:24:09'),
(12, 'Zenón Barriga y Pesado', '12.293.874-6', '223.243.542-35', '1146572354', 'seubarriga@uol.com', '1970-12-28', 'Rua Cachalote nº 100, Vila dos Elefantes', '17263-445', 'São Paulo', 'SP', '2018-06-25 20:52:26', '2018-06-28 15:36:35'),
(13, 'Maria de Fátima dos Prazeres', '48.674.646-4', '395.847.565-34', '11978675768', 'fatinha@gmail.com', '1993-03-28', 'Av. Brasil Nº 00', '84764-987', 'Rio de Janeiro', 'RJ', '2018-06-28 15:27:42', '2018-06-28 15:27:42'),
(14, 'Ramon Valdez', '12.887.366-5', '354.736.554-83', '1136647465', 'seumadruga@live.com', '1970-09-02', 'Vila do Chaves, nº 72, Centro', '26374-849', 'São Paulo', 'SP', '2018-06-28 15:29:37', '2018-06-28 15:29:37'),
(15, 'Febronio Barriga Gordurríchua', '45.355.534-3', '323.232.325-33', '1137464244', 'nhonho@gmail.com', '2000-06-08', 'Rua Cachalote nº 100, Vila dos Elefantes', '12323-232', 'São Paulo', 'SP', '2018-06-28 17:20:36', '2018-06-28 17:20:36'),
(16, 'Frederico Bardón de la Reguera', '46.465.753-5', '242.536.466-46', '1134563745', 'quico@gmail.com', '2009-06-01', 'Vila do Chaves nº 14, Centro', '11333-253', 'São Paulo', 'SP', '2018-06-28 17:27:39', '2018-06-29 14:38:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastos`
--

CREATE TABLE `gastos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_registro` date NOT NULL,
  `qtde` int(11) NOT NULL,
  `valor` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `gastos`
--

INSERT INTO `gastos` (`id`, `descricao`, `tipo`, `data_registro`, `qtde`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'Pacote c/ 500 Folhas de Sulfite Report', 'Material', '2018-07-04', 1, 30.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicos`
--

CREATE TABLE `historicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_livro` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_locacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `historicos`
--

INSERT INTO `historicos` (`id`, `id_cliente`, `id_livro`, `created_at`, `updated_at`, `id_locacao`) VALUES
(1, 14, 4, '2018-07-04 17:00:39', '2018-07-04 17:00:39', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localizacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtde` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `genero`, `autor`, `editora`, `localizacao`, `qtde`, `created_at`, `updated_at`) VALUES
(1, 'O Senhor dos Anéis - A Sociedade do Anél', 'Aventura', 'J. R. R. Tolkien', 'Saraiva', 'O-S', 4, NULL, '2018-07-03 00:25:03'),
(2, 'O Senhor dos Anéis - As Duas Torres', 'Aventura', 'J. R. R. Tolkien', 'Saraiva', 'O-S', 5, NULL, NULL),
(3, 'O Senhor dos Anéis - O Retorno do Rei', 'Aventura', 'J. R. R. Tolkien', 'Saraiva', 'O-S', 5, NULL, NULL),
(4, 'O Hobbit', 'Aventura', 'J. R. R. Tolkien', 'Saraiva', 'O-H', 7, NULL, '2018-07-04 17:00:39'),
(5, 'O Silmarillon', 'Aventura', 'J. R. R. Tolkien', 'Saraiva', 'O-S', 6, NULL, NULL),
(6, 'Assassin´s Creed - A Cruzada Secreta', 'Aventura', 'Oliver Bowden', 'Galera', 'As', 5, NULL, NULL),
(7, 'Assassin´s Creed - Renascença', 'Aventura', 'Oliver Bowden', 'Galera', 'As', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacaos`
--

CREATE TABLE `locacaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_livro` int(10) UNSIGNED NOT NULL,
  `retirada` date NOT NULL,
  `devolucao` date NOT NULL,
  `valor` double(8,2) NOT NULL,
  `atraso` int(11) DEFAULT NULL,
  `multa` double(8,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `locacaos`
--

INSERT INTO `locacaos` (`id`, `id_cliente`, `id_livro`, `retirada`, `devolucao`, `valor`, `atraso`, `multa`, `status`, `created_at`, `updated_at`) VALUES
(11, 11, 1, '2018-07-02', '2018-07-17', 10.00, NULL, NULL, 'Aberto', NULL, '2018-07-04 14:13:58'),
(12, 14, 4, '2018-07-03', '2018-07-10', 5.00, 0, 0.00, 'Fechado', NULL, '2018-07-04 17:00:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_06_21_112422_create_clientes_table', 1),
(3, '2018_06_21_113145_create_livros_table', 1),
(4, '2018_06_21_113231_create_historicos_table', 1),
(5, '2018_06_21_113626_create_locacaos_table', 1),
(6, '2018_07_04_153609_create_gastos_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 2, '$2y$10$HLM2jgSf18iIlvvf1GOKeuG32uhJ.4b1nFJhLIMctG.F7IYYGJhYe', 'MQV14rUx5I4a4dcNixF1K3l5uQY0ej517ezeXvNMMz5hFztAB482vODUQG8S', '2018-07-09 14:55:32', '2018-07-09 15:48:30'),
(2, 'Teste', 'teste@teste.com', 1, '$2y$10$fxlB5HFqJF/SwKm3fc3B9uaeMjtxsrca3jEt6KYDKwL4hI4JlSMWG', 'CnzJlq8LRVr8b4p2YsokeDWlxz59Fsi1F9JhhkBhy5zTwLmDPOXaQUpjj9y5', '2018-07-09 14:56:29', '2018-07-09 14:56:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historico_id_cliente_foreign` (`id_cliente`),
  ADD KEY `historico_id_livro_foreign` (`id_livro`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locacaos`
--
ALTER TABLE `locacaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locacao_id_cliente_foreign` (`id_cliente`),
  ADD KEY `locacao_id_livro_foreign` (`id_livro`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locacaos`
--
ALTER TABLE `locacaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historicos`
--
ALTER TABLE `historicos`
  ADD CONSTRAINT `historico_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `historico_id_livro_foreign` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id`);

--
-- Limitadores para a tabela `locacaos`
--
ALTER TABLE `locacaos`
  ADD CONSTRAINT `locacao_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `locacao_id_livro_foreign` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
