<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UnitsFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $sql = '
            INSERT INTO `units` (`id`, `name`, `symbol`) VALUES
                (1, \'Kilogramme\', \'Kg\'),
                (2, \'Piéce\', \'Pc\'),
                (3, \'Barquette\', \'Bq\'),
                (4, \'Cagette\', \'Cg\');
        ';

        $manager->getConnection()->exec($sql);

        $manager->flush();
    }
}
