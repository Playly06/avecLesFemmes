<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Campagne extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product.setNom("exemple");
        $product.setDateDebut(new \DateTime());
        $product.setDateFin(new \DateTime('2026-11-2'));
        $product.setMontant(10000);
        $product.setCreatedAt(new \DateTime());
        $product.setUpdatedAt(new \DateTime());
        $groupement= new Groupement();
        $product.setGroupement($groupement);
        $type=new Type();
        $product.setType($type);
        $contenir =new Contenir();
        $product.addContenir($contenir);
        $manager->persist($product);
        $manager->flush();
    }
}
