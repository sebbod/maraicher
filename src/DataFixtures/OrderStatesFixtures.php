<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrderStatesFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $sql = '
            INSERT INTO `order_states` (`id`, `name`, `description`) VALUES 
                (1, \'En création\', \'Vous avez commencé la commande mais pas elle n’est pas finalisée.\'),
                (2, \'Validée\', \'Vous avez décidé d’honorer la commande.\'),
                (3, \'En préparation\', \'Vous avez commencé à préparer la commande.\'),
                (4, \'Préparée\', \'La commande est prête mais n’a pas encore été envoyée.\'),
                (5, \'En livraison\', \'Vous avez envoyé l’intégralité de la commande au client.\'),
                (6, \'Livrée\', \'La livraison a été effectuée.\'),
                (7, \'Facturée (partiellement)\', \'Vous avez partiellement facturé le client.\'),
                (8, \'Facturée\', \'Vous avez facturé votre client.\'),
                (9, \'Payée (partiellement)\', \'Le client a réglé une partie de la facture.\'),
                (10, \'Payée\', \'Le client a réglé la facture.\'),
                (11, \'Retournée\', \'Le client a retourné la commande.\'),
                (12, \'Fermée\', \'La commande a été finalisée et doit être archivée.\'),
                (13, \'Archivée\', \'Archivée\'),
                (14, \'En attente\', \'Le traitement de la commande est actuellement interrompu.\'),
                (15, \'Annulée\', \'Vous avez rejeté la commande. Le niveau de stock des produits concernés est automatiquement ajusté.\');
';
             $manager->getConnection()->exec($sql);

        $manager->flush();
    }
}
