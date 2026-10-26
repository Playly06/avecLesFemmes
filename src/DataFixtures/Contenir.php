<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contenir extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $campagne=new Campagne();
        $product.addCampagne($campagne);
        $membre=new Membre();
        $product.addMembre($membre);
        $manager->persist($product);

        $manager->flush();
    }
}
