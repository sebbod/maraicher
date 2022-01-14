INSERT INTO `units` (`id`, `name`, `symbol`) VALUES (1, 'Kilogramme', 'Kg');
INSERT INTO `units` (`id`, `name`, `symbol`) VALUES (2, 'Piéce', 'Pc');
INSERT INTO `units` (`id`, `name`, `symbol`) VALUES (3, 'Barquette', 'Bq');
INSERT INTO `units` (`id`, `name`, `symbol`) VALUES (4, 'Cagette', 'Cg');


INSERT INTO `addressType` (`id`, `name`) VALUES (1, 'Principale');
INSERT INTO `addressType` (`id`, `name`) VALUES (2, 'Facturation');
INSERT INTO `addressType` (`id`, `name`) VALUES (3, 'Livraison');



INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (1, 'En création', 'Vous avez commencé la commande mais pas elle n’est pas finalisée.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (2, 'Validée', 'Vous avez décidé d’honorer la commande.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (3, 'En préparation', 'Vous avez commencé à préparer la commande.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (4, 'Préparée', 'La commande est prête mais n’a pas encore été envoyée.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (5, 'En livraison', 'Vous avez envoyé l’intégralité de la commande au client.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (6, 'Livrée', 'La livraison a été effectuée.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (7, 'Facturée (partiellement)', 'Vous avez partiellement facturé le client.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (8, 'Facturée', '	Vous avez facturé votre client.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (9, 'Payée (partiellement)', 'Le client a réglé une partie de la facture.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (10, 'Payée', 'Le client a réglé la facture.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (11, 'Retournée', 'Le client a retourné la commande.');

INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (12, 'Fermée', '	La commande a été finalisée et doit être archivée.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (13, 'Archivée', 'Archivée');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (14, 'En attente', 'Le traitement de la commande est actuellement interrompu.');
INSERT INTO `order_states` (`id`, `name`, `description`) VALUES (15, 'Annulée', 'Vous avez rejeté la commande. Le niveau de stock des produits concernés est automatiquement ajusté.');
