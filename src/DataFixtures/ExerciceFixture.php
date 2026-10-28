<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Exercice;
use App\Entity\Groupement;
class ExerciceFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $exercice = new Exercice();
        $exercice->setDateDebut(new \DateTime('2026-10-28 21:07:00'));
        $exercice->setDateLimitePret(new \DateTime('2026-11-28 21:07:00'));
        $exercice->setDateRetribution(new \DateTime('2026-11-30 21:07:00'));
        $exercice->setStatut("En cour");
        $groupement = $this->getReference(GroupementFixture::GROUPEMENT_REFERENCE,Groupement::class);
        $exercice->setGroupement($groupement);
        $manager->persist($exercice);
        $manager->flush();
    }

     public function getDependencies():array{
        return[
            GroupementFixture::class
        ];
    }
}
