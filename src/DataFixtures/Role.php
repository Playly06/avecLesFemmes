<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Role extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product.setNom("manager");
        $membre=new Membre();
        $product.addMembre($membre);
        $manager->persist($product);

        $manager->flush();
    }
}
