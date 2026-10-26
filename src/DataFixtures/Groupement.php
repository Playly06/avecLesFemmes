<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Groupement extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product.setNom("membre1");
        $manager->persist($product);

        $manager->flush();
    }
}
