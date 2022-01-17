<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddressTypeFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $sql = '
            INSERT INTO `addressType` (`id`, `name`) VALUES
                (1, \'Principale\'),
                (2, \'Facturation\'),
                (3, \'Livraison\');
        ';

        $manager->getConnection()->exec($sql);

        $manager->flush();
    }
}
