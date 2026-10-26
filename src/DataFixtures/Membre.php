<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Membre extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product.setLogin("membre1");
        $product.setPassword("passer1234");
        $role=new Role();
        $product.setRole($role);
        $groupement=new Groupement();
        $product.setGroupement($groupement);

        $manager->persist($product);

        $manager->flush();
    }
}
