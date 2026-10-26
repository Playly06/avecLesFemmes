<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Type extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product.setNom();
        $campagne=new Campagne();
        $product.addCampagne($campagne);
        $manager->persist($product);

        $manager->flush();
    }
}
