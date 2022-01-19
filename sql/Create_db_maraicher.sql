-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 jan. 2022 à 18:24
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maraicher`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
                                         `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `firstname` varchar(45) DEFAULT NULL,
    `lastname` varchar(45) DEFAULT NULL,
    `adr1` varchar(45) DEFAULT NULL,
    `adr2` varchar(45) DEFAULT NULL,
    `zcode` varchar(8) DEFAULT NULL,
    `town` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `addresstype`
--

DROP TABLE IF EXISTS `addresstype`;
CREATE TABLE IF NOT EXISTS `addresstype` (
                                             `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                             `name` varchar(45) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `addresstype`
--

INSERT INTO `addresstype` (`id`, `name`) VALUES
                                             (1, 'Principale'),
                                             (2, 'Facturation'),
                                             (3, 'Livraison');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
                                           `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                           `name` varchar(45) NOT NULL,
    `phone` varchar(12) DEFAULT NULL,
    `mobile` varchar(12) DEFAULT NULL,
    `email` varchar(120) NOT NULL,
    `siret` char(14) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name_UNIQUE` (`name`),
    UNIQUE KEY `email_UNIQUE` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `mobile`, `email`, `siret`) VALUES
                                                                                (2, 'seb', NULL, NULL, 'bod@gmail.com', '45215485'),
                                                                                (4, 'dede2', NULL, NULL, 'dd2@dd.dd', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customers_has_address`
--

DROP TABLE IF EXISTS `customers_has_address`;
CREATE TABLE IF NOT EXISTS `customers_has_address` (
                                                       `customers_id` int UNSIGNED NOT NULL,
                                                       `address_id` int UNSIGNED NOT NULL,
                                                       `addressType_id` int UNSIGNED NOT NULL,
                                                       PRIMARY KEY (`address_id`,`addressType_id`,`customers_id`),
    KEY `fk_customers_has_address_addressType_id` (`addressType_id`),
    KEY `fk_customers_has_address_customers_id` (`customers_id`),
    KEY `fk_customers_has_address_address_id` (`address_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
    `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `executed_at` datetime DEFAULT NULL,
    `execution_time` int DEFAULT NULL,
    PRIMARY KEY (`version`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
                                                    `id` bigint NOT NULL AUTO_INCREMENT,
                                                    `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                                    `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
                                                    `queue_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` datetime NOT NULL,
    `available_at` datetime NOT NULL,
    `delivered_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
                                        `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                        `customers_id` int UNSIGNED NOT NULL,
                                        `dateCreate` datetime NOT NULL,
                                        `states_id` int UNSIGNED NOT NULL,
                                        PRIMARY KEY (`id`),
    KEY `fk_orders_customers_id` (`customers_id`),
    KEY `fk_orders_states_id` (`states_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `dateCreate`, `states_id`) VALUES
                                                                           (6, 2, '2022-01-19 16:37:31', 1),
                                                                           (7, 2, '2022-01-19 18:02:31', 1),
                                                                           (8, 2, '2022-01-19 18:02:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders_has_stocks`
--

DROP TABLE IF EXISTS `orders_has_stocks`;
CREATE TABLE IF NOT EXISTS `orders_has_stocks` (
                                                   `orders_id` int UNSIGNED NOT NULL,
                                                   `stocks_id` int UNSIGNED NOT NULL,
                                                   `price` decimal(6,2) NOT NULL COMMENT 'prix de vente de ce produit pour cette commande',
    PRIMARY KEY (`stocks_id`,`orders_id`),
    KEY `fk_orders_has_stocks_orders_id` (`orders_id`),
    KEY `fk_orders_has_stocks_stocks_id` (`stocks_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_states`
--

DROP TABLE IF EXISTS `order_states`;
CREATE TABLE IF NOT EXISTS `order_states` (
                                              `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                              `name` varchar(25) NOT NULL,
    `description` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `order_states`
--

INSERT INTO `order_states` (`id`, `name`, `description`) VALUES
                                                             (1, 'En création', 'Vous avez commencé la commande mais pas elle n’est pas finalisée.'),
                                                             (2, 'Validée', 'Vous avez décidé d’honorer la commande.'),
                                                             (3, 'En préparation', 'Vous avez commencé à préparer la commande.'),
                                                             (4, 'Préparée', 'La commande est prête mais n’a pas encore été envoyée.'),
                                                             (5, 'En livraison', 'Vous avez envoyé l’intégralité de la commande au client.'),
                                                             (6, 'Livrée', 'La livraison a été effectuée.'),
                                                             (7, 'Facturée (partiellement)', 'Vous avez partiellement facturé le client.'),
                                                             (8, 'Facturée', 'Vous avez facturé votre client.'),
                                                             (9, 'Payée (partiellement)', 'Le client a réglé une partie de la facture.'),
                                                             (10, 'Payée', 'Le client a réglé la facture.'),
                                                             (11, 'Retournée', 'Le client a retourné la commande.'),
                                                             (12, 'Fermée', 'La commande a été finalisée et doit être archivée.'),
                                                             (13, 'Archivée', 'Archivée'),
                                                             (14, 'En attente', 'Le traitement de la commande est actuellement interrompu.'),
                                                             (15, 'Annulée', 'Vous avez rejeté la commande. Le niveau de stock des produits concernés est automatiquement ajusté.');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
                                          `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                          `name` varchar(45) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
    ) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`) VALUES
                                          (31, 'Aubergine'),
                                          (32, 'Courgette'),
                                          (33, 'Pomme de terre'),
                                          (36, 'Potimarron'),
                                          (35, 'Salade, Laitue'),
                                          (34, 'Salade, Mâche');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
                                        `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                        `products_id` int UNSIGNED NOT NULL,
                                        `units_id` int UNSIGNED NOT NULL,
                                        `qty` int(10) UNSIGNED ZEROFILL NOT NULL,
    `price` decimal(6,2) NOT NULL COMMENT 'prix par defaut du produit pour son unités de vente',
    PRIMARY KEY (`id`),
    UNIQUE KEY `product_unit_UNIQUE` (`products_id`,`units_id`),
    KEY `fk_stocks_units_id` (`units_id`),
    KEY `fk_stocks_products_id` (`products_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `products_id`, `units_id`, `qty`, `price`) VALUES
                                                                           (1, 31, 1, 0000000001, '6.00'),
                                                                           (2, 31, 4, 0000000001, '25.50');

-- --------------------------------------------------------

--
-- Structure de la table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
                                       `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                       `name` varchar(45) NOT NULL,
    `symbol` char(2) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `units`
--

INSERT INTO `units` (`id`, `name`, `symbol`) VALUES
                                                 (1, 'Kilogramme', 'Kg'),
                                                 (2, 'Piéce', 'Pc'),
                                                 (3, 'Barquette', 'Bq'),
                                                 (4, 'Cagette', 'Cg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customers_has_address`
--
ALTER TABLE `customers_has_address`
    ADD CONSTRAINT `fk_customers_has_address_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `fk_customers_has_address_addressType1` FOREIGN KEY (`addressType_id`) REFERENCES `addresstype` (`id`),
  ADD CONSTRAINT `fk_customers_has_address_customers` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `fk_orders_customers_id` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_orders_states_id` FOREIGN KEY (`states_id`) REFERENCES `order_states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `orders_has_stocks`
--
ALTER TABLE `orders_has_stocks`
    ADD CONSTRAINT `fk_orders_has_stocks_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_orders_has_stocks_stocks1` FOREIGN KEY (`stocks_id`) REFERENCES `stocks` (`id`);

--
-- Contraintes pour la table `stocks`
--
ALTER TABLE `stocks`
    ADD CONSTRAINT `fk_stocks_products_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_stocks_units_id` FOREIGN KEY (`units_id`) REFERENCES `units` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
