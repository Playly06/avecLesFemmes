<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Groupement;
class GroupementFixture extends Fixture
{
    public const GROUPEMENT_REFERENCE='groupement-sérères';
    public function load(ObjectManager $manager): void
    {
        $groupement = new Groupement();
        $groupement->setNom("Les sérères");
        $groupement->setTelephone("775556677");
        $groupement->setAddresse("Ouakam Villa n'345 A");
        $manager->persist($groupement);
        $this->addReference(self::GROUPEMENT_REFERENCE,$groupement);
        $manager->flush();
    }
}
