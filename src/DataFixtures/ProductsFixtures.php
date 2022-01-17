<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductsFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $names = ["Aubergine", "Courgette", "Pomme de terre", "Salade, Mâche", "Salade, Laitue"];

        foreach($names as $name){
            $product = new Products();
            $product->setName($name);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
